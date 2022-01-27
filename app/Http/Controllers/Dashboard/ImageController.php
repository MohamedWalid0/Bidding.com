<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Services\ImageResizeService;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function upload(Request $request,$modelName ,$modelId): string
    {
        if ($request->has('photo')) {
            $image = $request->file('photo');
            $newFileName = $image->hashName();
            if ( $modelName === 'Category'  ) {
                if( File::exists(storage_path('app/public/categories/' . $modelId)) ){
                    File::deleteDirectory(storage_path('app/public/categories/' . $modelId));
                }
                $this->handleUploadImage($modelId, $newFileName, $image, $modelName , 'categories');
            }
            else {
                if( File::exists(storage_path('app/public/sub_categories/' . $modelId)) ){
                    File::deleteDirectory(storage_path('app/public/sub_categories/' . $modelId));
                }
                $this->handleUploadImage($modelId, $newFileName, $image, $modelName, 'sub_categories');
            }
            Cache::forget('categories');
            return $newFileName;
        }
        return '';
    }

    /**
     * @param $modelId
     * @param string $newFileName
     * @param $image
     * @param $modelName
     * @param $disk
     * @return void
     */
    public function handleUploadImage($modelId, string $newFileName, $image, $modelName , $disk): void
    {
        Image::updateOrCreate([
            'imageable_id' => $modelId,
            'imageable_type' => 'App\Models\\' . $modelName,
        ], [
                'image_path' => $newFileName
            ]
        );
        Storage::disk($disk)->put("/{$modelId}", $image);
        (new ImageResizeService)->ImageResize($disk, $newFileName, 70, 70, $modelId);
    }
}
