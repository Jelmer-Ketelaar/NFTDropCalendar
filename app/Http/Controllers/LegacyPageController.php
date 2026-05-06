<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

final class LegacyPageController extends Controller
{
    public function __invoke(Request $request, ?string $path = null): Response
    {
        $legacyFile = $this->resolveLegacyFile($path);

        if ($legacyFile === null) {
            abort(404);
        }

        $legacyRoot = base_path('legacy');
        $previousDirectory = getcwd();
        $previousPhpSelf = $_SERVER['PHP_SELF'] ?? null;
        $previousScriptName = $_SERVER['SCRIPT_NAME'] ?? null;
        $relativeFile = Str::after($legacyFile, $legacyRoot.DIRECTORY_SEPARATOR);

        $_SERVER['PHP_SELF'] = '/'.str_replace(DIRECTORY_SEPARATOR, '/', $relativeFile);
        $_SERVER['SCRIPT_NAME'] = $_SERVER['PHP_SELF'];

        ob_start();
        chdir($legacyRoot);

        try {
            require $legacyFile;
        } finally {
            chdir($previousDirectory ?: base_path());

            if ($previousPhpSelf === null) {
                unset($_SERVER['PHP_SELF']);
            } else {
                $_SERVER['PHP_SELF'] = $previousPhpSelf;
            }

            if ($previousScriptName === null) {
                unset($_SERVER['SCRIPT_NAME']);
            } else {
                $_SERVER['SCRIPT_NAME'] = $previousScriptName;
            }
        }

        return response(ob_get_clean());
    }

    private function resolveLegacyFile(?string $path): ?string
    {
        $path = trim($path ?? '', '/');
        $path = $path === '' ? 'index' : $path;

        if (str_contains($path, '..') || str_starts_with($path, '.')) {
            return null;
        }

        $path = preg_replace('/[^A-Za-z0-9_\/.-]/', '', $path) ?: 'index';
        $candidate = base_path('legacy/'.$path);

        if (! str_ends_with($candidate, '.php')) {
            $candidate .= '.php';
        }

        $realLegacyRoot = realpath(base_path('legacy'));
        $realCandidate = realpath($candidate);

        if (
            $realLegacyRoot === false
            || $realCandidate === false
            || ! str_starts_with($realCandidate, $realLegacyRoot.DIRECTORY_SEPARATOR)
        ) {
            return null;
        }

        return is_file($realCandidate) ? $realCandidate : null;
    }
}
