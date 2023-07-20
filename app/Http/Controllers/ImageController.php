<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function getImage($fileName){
        return Storage::disk('s3')->response('listingImages/'.$fileName);
    }
}
