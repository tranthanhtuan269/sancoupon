<?php

namespace App\Helpers;

class Helper
{
    public static function changeFormatText($string){
        $newstr = substr_replace($string, '-', 3, 0);
        $newstr = substr_replace($newstr, '-', 7, 0);
        $newstr = substr_replace($newstr, '-', 11, 0);
        return $newstr;
    }
}
