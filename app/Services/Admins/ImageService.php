<?php

namespace App\Services\Admins;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class ImageService
{
    public function image($oldFile, $file)
    {
        if ($oldFile) {
            $path = substr($oldFile, strpos($oldFile,"storage") + 8);
            if(Storage::exists('app/'.$path)){
                unlink(storage_path('app/'.$path));
            }
        }
        list($width) = getimagesize($file);
        $setWidth = $width > 768 ? 768 : $width;
        $extension = $file->getClientOriginalExtension();
        $name = date('Y-m-d').Time().rand(11111, 99999).'.'.$extension;
        $image = Image::read($file);
        $image->scale(width: $setWidth);
        $filePath = 'api/media/' . $name;
        Storage::put($filePath,$image->toWebp(80)->toFilePointer(), 'public');

        return $filePath;
    }
}
