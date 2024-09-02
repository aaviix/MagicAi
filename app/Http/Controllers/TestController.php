<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use App\Services\Youtube\YoutubeTranscriptService;
use Google\Client;
use Google\Service\YouTube;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    public function test() {
        return View('test');
    }
    public function youtubeView() {
        $apiKey = "";
        $client = new Client();
        $client->setDeveloperKey($apiKey);
        $service = new YouTube($client);

        # Example query just to make sure we can connect to the API
        $captionsList = $service->captions->listCaptions('snippet', ['id' => 'M7FIvfx5J10']);
        foreach ($captionsList->getItems() as $caption) {
            $captionId = $caption->getId();
            // Download the caption file
            $captionFile = $service->captions->download($captionId, ['tfmt' => 'srt']); // or 'vtt' for WebVTT format

            // Output the caption content
            echo $captionFile->getBody()->getContents();
        }

        return View('test');
    }
    public function connectToYouTube()
    {
        $client = new Client();
        $client->setAuthConfig(Storage::path('credentials.json'));
        $client->addScope(YouTube::YOUTUBE_FORCE_SSL);
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');

        $authUrl = $client->createAuthUrl();
        return redirect()->away($authUrl);
    }
    public function handleYouTubeCallback(Request $request)
    {
        $client = new Client();
        $client->setAuthConfig(Storage::path('client_secret.json'));
        $client->addScope(Google\Service\YouTube::YOUTUBE_FORCE_SSL);
        $client->setAccessType('offline');

        if ($request->has('code')) {
            $accessToken = $client->fetchAccessTokenWithAuthCode($request->input('code'));
            $client->setAccessToken($accessToken);

            $setting = Setting::firstOrCreate([]);
            $setting->youtube_connected = true;
            $setting->youtube_access_token = json_encode($accessToken);
            $setting->save();

            echo "<script>window.close();</script>";
            return;
        }

        return redirect()->route('settings.show')->with('error', 'Failed to connect to YouTube.');
    }
    public function collectMissingStrings()
    {
        // Get all translatable strings in the app
        $strings = collect();
        // Replace 'resources' with the actual directory containing your views and files
        $files = File::allFiles(resource_path());
        foreach ($files as $file) {
            $content = file_get_contents($file);
            preg_match_all('/__\((\'|")(.*?)(\'|")\)/', $content, $matches);

            foreach ($matches[2] as $match) {
                $strings->push($match);
            }
        }
        // Load existing translations
        $existingTranslations = json_decode(file_get_contents(base_path('lang/en.json')), true);
        // Add new strings to the translations if the keys do not exist
        foreach ($strings->unique() as $string) {
            if (! isset($existingTranslations[$string])) {
                $existingTranslations[$string] = $string;
            }
        }
        // Write updated translations to en.json
        file_put_contents(base_path('lang/en.json'), json_encode($existingTranslations, JSON_PRETTY_PRINT));
    }
}
