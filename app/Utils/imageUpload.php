<?php

namespace App\Utils;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImageUpload
{
    public static function uploadImage($request, $height=null, $width=null, $path = null)
    {

        $imageName = Str::uuid().date("Y-m-d"). '.' .$request->extension();
        [$widthDefault, $heightDefault] = getimagesize($request);
        $height = $height ?? $heightDefault;
        $width = $width ?? $widthDefault;
        $image = Image::make($request->path());
        $image->fit($width,$height, function($constraint){
            $constraint->upsize();
        })->stream();

        $fullPath =  $path . $imageName;

        Storage::disk('images')->put($fullPath, $image->__toString());

        return $path . $imageName;


    }
}
