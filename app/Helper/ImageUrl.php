<?php
namespace App\Helper;

class ImageUrl
{
    public static function get($path,$filename)
    {
        if($filename){
            $file = $path.$filename;

            if(file_exists($file)){
                $filename = url($file);
            }else {
                $filename = url('assets/image.png');
            }
        }else {
            $filename = url('assets/image.png');
        }
        return $filename;
    }
}