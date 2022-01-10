<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class ImageResizeService
{
    public function ImageResize(string $disk, string $fileName, int $width, int $height): void
    {
        Image::make(Storage::disk($disk)->get($fileName))
            ->resize($width, $height)
            ->save(storage_path('app/public/' . $disk . '/thump-' . $fileName));
    }
}
