<?php

namespace App\Http\Traits;
use Cloudder;

trait CloudinaryUpload
{
    public function upload($file, $folder, $width, $height=null, $quality='auto')
    {
        $result  =  Cloudder::upload($file,null, $options = array(
            'folder'   => $folder,
            'timeout'  =>  3600,
            'height'   => $height,
            'width'    => $width,
            'quality'  => $quality,
        ));

        return Cloudder::getResult();
    }

    public function deletePicture($imagePubId)
    {
        Cloudder::delete($imagePubId);
    }
}
