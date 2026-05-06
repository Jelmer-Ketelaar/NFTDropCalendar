<?php
declare(strict_types=1);

function load_environment(string $path): void
{
    if (!is_file($path) || !is_readable($path)) {
        return;
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($lines === false) {
        return;
    }

    foreach ($lines as $line) {
        $line = trim($line);

        if ($line === '' || str_starts_with($line, '#') || !str_contains($line, '=')) {
            continue;
        }

        [$name, $value] = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);

        if ($name === '' || getenv($name) !== false) {
            continue;
        }

        if (
            (str_starts_with($value, '"') && str_ends_with($value, '"'))
            || (str_starts_with($value, "'") && str_ends_with($value, "'"))
        ) {
            $value = substr($value, 1, -1);
        }

        putenv($name . '=' . $value);
        $_ENV[$name] = $value;
        $_SERVER[$name] = $value;
    }
}

function env_value(string $key, ?string $default = null): ?string
{
    $value = getenv($key);

    if ($value === false || $value === '') {
        return $default;
    }

    return $value;
}

function env_bool(string $key, bool $default = false): bool
{
    $value = env_value($key);

    if ($value === null) {
        return $default;
    }

    return filter_var($value, FILTER_VALIDATE_BOOL);
}

function redirect_to(string $location, int $statusCode = 302): never
{
    header('Location: ' . $location, true, $statusCode);
    exit;
}

function respond_with_error(string $message, int $statusCode = 400): never
{
    http_response_code($statusCode);
    echo e($message);
    exit;
}

function request_string(array $source, string $key, string $default = ''): string
{
    $value = $source[$key] ?? $default;

    if (is_array($value)) {
        return $default;
    }

    return trim((string)$value);
}

function required_request_string(array $source, string $key): string
{
    $value = request_string($source, $key);

    if ($value === '') {
        respond_with_error('Missing required field: ' . $key);
    }

    return $value;
}

function decoded_id(?string $encoded): ?int
{
    if ($encoded === null || $encoded === '' || $encoded === 'none') {
        return null;
    }

    $decoded = base64_decode($encoded, true);

    if ($decoded === false || !ctype_digit($decoded)) {
        return null;
    }

    return (int)$decoded;
}

if (!function_exists('e')) {
    function e(mixed $value): string
    {
        return htmlspecialchars((string)$value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }
}

function ensure_allowed_value(string $value, array $allowedValues, string $fieldName): string
{
    if (!in_array($value, $allowedValues, true)) {
        respond_with_error('Invalid value for field: ' . $fieldName);
    }

    return $value;
}

function normalize_external_url(string $value): string
{
    $value = trim($value);

    if ($value === '') {
        return '';
    }

    if (!preg_match('#^https?://#i', $value)) {
        $value = 'https://' . $value;
    }

    return filter_var($value, FILTER_VALIDATE_URL) ? $value : '';
}

function normalize_twitter_username(string $value): string
{
    $value = trim($value);

    if (preg_match('#^https?://#i', $value)) {
        $path = parse_url($value, PHP_URL_PATH);
        $value = is_string($path) ? $path : $value;
    }

    $value = trim($value, "@/ \t\n\r\0\x0B");

    if (!preg_match('/^[A-Za-z0-9_]{1,15}$/', $value)) {
        return '';
    }

    return $value;
}

function fetch_twitter_follower_count(string $username): int
{
    if ($username === '') {
        return 0;
    }

    $url = 'https://cdn.syndication.twimg.com/widgets/followbutton/info.json?screen_names='
        . rawurlencode($username);
    $context = stream_context_create([
        'http' => [
            'timeout' => 3,
            'ignore_errors' => true,
        ],
    ]);
    $data = @file_get_contents($url, false, $context);

    if ($data === false) {
        return 0;
    }

    $parsed = json_decode($data, true);

    if (!is_array($parsed) || !isset($parsed[0]['followers_count'])) {
        return 0;
    }

    return max(0, (int)$parsed[0]['followers_count']);
}

function uploaded_image_path(string $fieldName, string $targetDirectory = 'images'): ?string
{
    if (
        !isset($_FILES[$fieldName])
        || !is_array($_FILES[$fieldName])
        || ($_FILES[$fieldName]['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK
    ) {
        return null;
    }

    $upload = $_FILES[$fieldName];
    $tmpName = $upload['tmp_name'] ?? '';

    if (!is_string($tmpName) || !is_uploaded_file($tmpName)) {
        return null;
    }

    $mimeType = mime_content_type($tmpName) ?: '';
    $extensionsByMime = [
        'image/gif' => 'gif',
        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'image/webp' => 'webp',
    ];

    if (!isset($extensionsByMime[$mimeType])) {
        return null;
    }

    $originalName = pathinfo((string)($upload['name'] ?? ''), PATHINFO_FILENAME);
    $safeName = preg_replace('/[^A-Za-z0-9_-]+/', '-', $originalName) ?: 'upload';
    $safeName = trim($safeName, '-');
    $safeName = strtolower($safeName !== '' ? $safeName : 'upload');
    $filename = date('Y-m-d-H-i-s') . '-' . bin2hex(random_bytes(4)) . '-' . $safeName
        . '.' . $extensionsByMime[$mimeType];
    $targetPath = rtrim($targetDirectory, '/') . '/' . $filename;
    $absoluteTargetPath = dirname(__DIR__) . '/public/' . $targetPath;
    $absoluteTargetDirectory = dirname($absoluteTargetPath);

    if (!is_dir($absoluteTargetDirectory) && !mkdir($absoluteTargetDirectory, 0755, true)) {
        return null;
    }

    if (!move_uploaded_file($tmpName, $absoluteTargetPath)) {
        return null;
    }

    return $targetPath;
}
