<?php
namespace App\Services;

final class InputNormalizationService
{
    public function twitterUsername(string $value): string
    {
        $value = trim($value);

        if (preg_match('#^https?://#i', $value)) {
            $path = parse_url($value, PHP_URL_PATH);
            $value = is_string($path) ? $path : $value;
        }

        $value = trim($value, "@/ \t\n\r\0\x0B");

        if (! preg_match('/^[A-Za-z0-9_]{1,15}$/', $value)) {
            return '';
        }

        return $value;
    }

    public function url(string $value): string
    {
        $value = trim($value);

        if ($value === '') {
            return '';
        }

        if (! preg_match('#^https?://#i', $value)) {
            $value = 'https://' . $value;
        }

        return filter_var($value, FILTER_VALIDATE_URL) ? $value : '';
    }
}
