<?php
namespace App\Services;

final class TwitterService
{
    public function followerCount(string $username): int
    {
        if ($username === '') {
            return 0;
        }

        $url = 'https://cdn.syndication.twimg.com/widgets/followbutton/info.json?screen_names=' . rawurlencode($username);
        $context = stream_context_create(['http' => ['timeout' => 3, 'ignore_errors' => true]]);
        $data = @file_get_contents($url, false, $context);

        if ($data === false) {
            return 0;
        }

        $parsed = json_decode($data, true);

        if (! is_array($parsed) || ! isset($parsed[0]['followers_count'])) {
            return 0;
        }

        return max(0, (int) $parsed[0]['followers_count']);
    }
}
