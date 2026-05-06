<?php
declare(strict_types=1);

use Illuminate\Support\Facades\DB;

try {
    require_once __DIR__ . '/helpers.php';

    $conn = DB::connection()->getPdo();
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    error_log('Database connection failed: ' . $exception->getMessage());

    if ((bool) config('app.debug')) {
        respond_with_error('Database connection failed: ' . $exception->getMessage(), 500);
    }

    respond_with_error('Database connection failed.', 500);
}
