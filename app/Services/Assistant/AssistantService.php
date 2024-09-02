<?php

namespace App\Services\Assistant;

use App\Helpers\Classes\Helper;
use App\Models\UserOpenaiChat;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Auth;

class AssistantService
{
    const BASE_URL = 'https://api.openai.com/v1/';
    const ASSISTANT_URL = 'assistants';
    const THREAD_URL = 'threads';
    const FILE_URL = 'files';
    const MESSAGE_URL = 'threads/{thread_id}/messages';
    const RUN_URL = 'threads/{thread_id}/runs';

    protected $apiKey;
    protected $client;

    public function __construct()
    {
        $this->apiKey = Helper::setOpenAiKey();
        $this->client = new Client();
    }

    /**
     * @throws GuzzleException
     * [
     * ['type' => 'code_interpreter'],
     * ['type' => 'file_search'],
     * ],
     */
    public function createAssistant($instructions, $assistantName, $model, $tools)
    {
        $response = $this->client->post(self::BASE_URL . self::ASSISTANT_URL, [
            'headers' => $this->getHeaders(),
            'json' => [
                'instructions' => $instructions,
                'name' => $assistantName,
                'tools' => $tools,
                'model' => $model,
            ],
        ]);

        return json_decode($response->getBody(), true);
    }


    /**
     * @throws GuzzleException
     */
    public function listAssistant()
    {
        try {
            $response = $this->client->get(self::BASE_URL . self::ASSISTANT_URL, [
                'headers' => $this->getHeaders(),
            ]);

            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            return [];
        }
    }

    /**
     * @throws GuzzleException
     * yeni bir konuşma başlatırken gönder. bize bir id verecek
     */
    public function createThread()
    {
        $response = $this->client->post(self::BASE_URL . self::THREAD_URL, [
            'headers' => $this->getHeaders(),
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @throws GuzzleException
     */
    public function createMessage($threadId, $message)
    {
        if (count($message) > 2 ||$message[0]["role"] == "system") {
            $message = end($message);
        }

        $message['content'] = collect($message['content'])->map(function ($item) {
            if (isset($item["type"]) && $item["type"] == 'image_url') {
                if ($item['type'] == 'image_url' && str_starts_with($item['image_url']['url'], '/uploads')) {
                    $item['image_url']['url'] = config('app.url') . $item['image_url']['url'];
                }
            }
            return $item;
        })->toArray();


        if (!isset($message["content"][0]["type"])){
            $message["content"] = $message["content"][0];
        }

        $response = $this->client->post(self::BASE_URL . str_replace('{thread_id}', $threadId, self::MESSAGE_URL), [
            'headers' => $this->getHeaders(),
            'json' => $message,
        ]);

        return json_decode($response->getBody(), true);
    }


    /**
     * @throws GuzzleException
     */
    public function createRun($chat_bot,$assistantId, $threadId,$main_message)
    {
        $total_used_tokens = 0;
        $output = '';
        $responsedText = '';

        return response()->stream(function () use ($chat_bot,$assistantId, $threadId,$main_message,&$total_used_tokens, &$output, &$responsedText) {
            $chat_id = $main_message->user_openai_chat_id;
            $chat = UserOpenaiChat::whereId($chat_id)->first();


            $stream = $this->client->post(self::BASE_URL . str_replace('{thread_id}', $threadId, self::RUN_URL), [
                'headers' => $this->getHeaders(),
                'json' => [
                    'assistant_id' => $assistantId,
                    'stream' => true,
                ],
                'stream' => true,
            ]);
            $data = $stream->getBody()->getContents();
            $events = explode("\n\n", $data);
            foreach ($events as $event) {
                if (str_contains($event, 'thread.message.delta')) {
                    $dataStart = strpos($event, '{');
                    if ($dataStart !== false) {
                        $jsonData = substr($event, $dataStart);
                        $eventData = json_decode($jsonData, true);

                        if (isset($eventData['delta']['content'])) {
                            foreach ($eventData['delta']['content'] as $content) {
                                if ($content['type'] === 'text') {
                                    if (connection_aborted()) {
                                        break 2;
                                    }
                                    $output .= $content['text']['value'];
                                    $responsedText .= $content['text']['value'];
                                    $total_used_tokens += countWords($content['text']['value']);
                                    echo PHP_EOL;
                                    echo "event: data\n";
                                    echo 'data: ' . $content['text']['value'];
                                    echo "\n\n";
                                    flush();
                                }
                            }
                        }
                    }
                }
            }
            echo "event: stop\n";
            echo 'data: [DONE]';
            echo "\n\n";
            flush();

            $main_message->response = $responsedText;
            $main_message->output = $output;
            $main_message->credits = $total_used_tokens;
            $main_message->words = $total_used_tokens;
            $main_message->save();

            $user = Auth::user();
            userCreditDecreaseForWord($user, $total_used_tokens, $chat_bot);
            $chat->total_credits += $total_used_tokens;
            $chat->save();

        }, 200, [
            'Cache-Control' => 'no-cache',
            'X-Accel-Buffering' => 'no',
            'Content-Type' => 'text/event-stream',
        ]);
    }

    private function getHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $this->apiKey,
            'OpenAI-Beta' => 'assistants=v2',
        ];
    }
}