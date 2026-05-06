<?php
namespace App\Services;

final class IdEncoderService
{
    public function encode(int $id): string
    {
        return base64_encode((string) $id);
    }

    public function decode(?string $encoded): ?int
    {
        if ($encoded === null || $encoded === '' || $encoded === 'none') {
            return null;
        }

        $decoded = base64_decode($encoded, true);

        if ($decoded === false || ! ctype_digit($decoded)) {
            return null;
        }

        return (int) $decoded;
    }
}
