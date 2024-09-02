<?php

namespace App\Services\Youtube;

use Exception;

class YoutubeTranscriptService
{
    const RE_YOUTUBE = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i';
    const USER_AGENT = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.83 Safari/537.36,gzip(gfe)';
    const RE_XML_TRANSCRIPT = '/<text start="([^"]*)" dur="([^"]*)">([^<]*)<\/text>/';

    public function fetchTranscript($videoId, $config = [])
    {
        $identifier = $this->retrieveVideoId($videoId);
        $headers = [
            'User-Agent' => self::USER_AGENT
        ];
        if (isset($config['lang'])) {
            $headers['Accept-Language'] = $config['lang'];
        }

        $videoPageResponse = $this->fetchUrl("https://www.youtube.com/watch?v=$identifier", $headers);
        $splittedHTML = explode('"captions":', $videoPageResponse);

        if (count($splittedHTML) <= 1) {
            if (strpos($videoPageResponse, 'class="g-recaptcha"') !== false) {
                throw new Exception('Too many requests from this IP, captcha required.');
            }
            if (strpos($videoPageResponse, '"playabilityStatus":') === false) {
                throw new Exception("The video is no longer available ($videoId)");
            }
            throw new Exception("Transcript is disabled on this video ($videoId)");
        }

        $captions = json_decode(explode(',"videoDetails', $splittedHTML[1])[0], true)['playerCaptionsTracklistRenderer'] ?? null;

        if (!$captions) {
            throw new Exception("Transcript is disabled on this video ($videoId)");
        }

        if (!isset($captions['captionTracks'])) {
            throw new Exception("No transcripts are available for this video ($videoId)");
        }

        if (isset($config['lang']) && !in_array($config['lang'], array_column($captions['captionTracks'], 'languageCode'))) {
            $availableLangs = array_column($captions['captionTracks'], 'languageCode');
            throw new Exception("No transcripts are available in {$config['lang']} for this video ($videoId). Available languages: " . implode(', ', $availableLangs));
        }

        $transcriptURL = $config['lang']
            ? array_filter($captions['captionTracks'], fn($track) => $track['languageCode'] === $config['lang'])[0]['baseUrl']
            : $captions['captionTracks'][0]['baseUrl'];

        $transcriptResponse = $this->fetchUrl($transcriptURL, $headers);
        if (!$transcriptResponse) {
            throw new Exception("No transcripts are available for this video ($videoId)");
        }

        preg_match_all(self::RE_XML_TRANSCRIPT, $transcriptResponse, $matches, PREG_SET_ORDER);

        return array_map(fn($match) => [
            'text' => $match[3],
            'duration' => (float)$match[2],
            'offset' => (float)$match[1],
            'lang' => $config['lang'] ?? $captions['captionTracks'][0]['languageCode'],
        ], $matches);
    }

    private function retrieveVideoId($videoId)
    {
        if (strlen($videoId) === 11) {
            return $videoId;
        }
        if (preg_match(self::RE_YOUTUBE, $videoId, $matches)) {
            return $matches[1];
        }
        throw new Exception('Impossible to retrieve YouTube video ID.');
    }

    private function fetchUrl($url, $headers)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification (not recommended for production)

        $headerArray = [];
        foreach ($headers as $key => $value) {
            $headerArray[] = "$key: $value";
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headerArray);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new Exception('Curl error: ' . curl_error($ch));
        }

        curl_close($ch);

        return $response;
    }
}
