<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;

class ImageHelper
{
    public static function upload(UploadedFile $file, $folder = 'general')
    {
        $path = public_path('uploads/'.$folder);

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $name = uniqid().'.'.$file->getClientOriginalExtension();

        // move file into /public/uploads/{folder}/
        $file->move($path, $name);

        // return ONLY filename -> database safe
        return $name;
    }

    public static function update(?string $oldImage, UploadedFile $file, $folder = 'general')
    {
        $oldPath = public_path('uploads/'.$folder.'/'.$oldImage);

        // delete old
        if ($oldImage && file_exists($oldPath)) {
            unlink($oldPath);
        }

        // upload new
        return self::upload($file, $folder);
    }

    public static function delete(?string $imageName, $folder = 'general')
    {
        $filePath = public_path('uploads/'.$folder.'/'.$imageName);

        if ($imageName && file_exists($filePath)) {
            unlink($filePath);
        }
    }

    public static function uploadMultiple(array $files, string $folder = 'general'): array
    {
        $uploaded = [];

        foreach ($files as $file) {
            if ($file instanceof UploadedFile) {
                $uploaded[] = self::upload($file, $folder);
            }
        }

        return $uploaded; 
    }
}
