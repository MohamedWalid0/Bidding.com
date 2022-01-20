<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class ImageResizeService
{
    public function ImageResize(string $disk, string $fileName, int $width, int $height , $modelId = NULL ): void
    {
        if (is_null($modelId)){
            Image::make(Storage::disk($disk)->get($fileName))
                ->resize($width, $height)
                ->save(storage_path('app/public/' . $disk . '/thump-' . $fileName));
        }else{
//            Image::make(Storage::disk($disk)->get($modelId .'/'.  $fileName))
            Image::make(storage_path('app/public/' . $disk . '/'. $modelId . '/' . $fileName))
                ->resize($width, $height)
                ->save(storage_path('app/public/' . $disk . '/'. $modelId . '/thump-' . $fileName));
        }

    }
}
