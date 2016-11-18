<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;


use File;
use Response;
/**
 * Description of ImageController
 * 
 *
 * @author Hrvoje Tonkovac
 */
class ImageController {
    //put your code here
    function showImage($filename)
{
    $path = storage_path('app/uploads') . '/' . $filename;

    if(!File::exists($path)){ abort(404);}

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
}
}
