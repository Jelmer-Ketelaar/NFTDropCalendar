<?php
namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

final class ImageUploadService
{
    public function upload(Request $request, string $field, string $directory = 'images'): ?string
    {
        if (! $request->hasFile($field) || ! $request->file($field)->isValid()) {
            return null;
        }

        $file = $request->file($field);
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeName = strtolower(trim(preg_replace('/[^A-Za-z0-9_-]+/', '-', $originalName) ?: 'upload', '-'));
        $safeName = $safeName !== '' ? $safeName : 'upload';
        $filename = date('Y-m-d-H-i-s') . '-' . bin2hex(random_bytes(4)) . '-' . $safeName . '.' . $file->getClientOriginalExtension();
        $path = $directory . '/' . $filename;

        Storage::disk('r2')->put($path, file_get_contents($file->getRealPath()), 'public');

        return Storage::disk('r2')->url($path);
    }
}
