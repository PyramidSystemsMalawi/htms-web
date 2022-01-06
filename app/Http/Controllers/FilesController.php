<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    //Save Image
    public static function saveFile($base64String, $storageLink){
        try {
            $image_64 = $base64String; //your base64 encoded data
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf

            $replace = substr($image_64, 0, strpos($image_64, ',')+1); 

            // find substring fro replace here eg: data:image/png;base64,
            $image = str_replace($replace, '', $image_64); 
            $image = str_replace(' ', '+', $image); 
            $imageName = Str::random(10).'.'.$extension;
            Storage::disk($storageLink)->put($imageName, base64_decode($image));  
            return $imageName;
        } catch (Exception $e) {
            return 'error';
        }   

    }
}
