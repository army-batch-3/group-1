<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function saveImage($path, $photo)
    {
        $img_name = strtotime(date('Y-m-d'))
            .'_'.rand(11111,99999)
            .'.'.$photo->extension();

        /**
         * putFileAs(path, image object, image name);
         */
        Storage::disk('public')->putFileAs(
            $path,
            $photo,
            $img_name
        );

        return $path.'/'.$img_name;
    }
}
