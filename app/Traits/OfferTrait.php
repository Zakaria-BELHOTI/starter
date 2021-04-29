<?php

namespace App\Traits;

Trait OfferTrait
{
    function saveImage($photo, $path){
        $file_extension = $photo->getClientOriginalExtension();
        $file_name = time(). '.' .$file_extension;
        $photo->move($path, $file_name);
        return $file_name;
    }


}