<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use PhpParser\Node\Expr\Array_;

class Language extends Model
{
    private static function getArray($language)
    {
        $path_to_file = public_path() . '/../resources/lang/' . $language . '.json';
        $file = file_get_contents($path_to_file);
        return json_decode($file, true);
    }

    private static function setArray($array, $language)
    {
        $path_to_file = public_path() . '/../resources/lang/' . $language . '.json';
        file_put_contents($path_to_file, json_encode($array));
    }

    public static function get($path, $language){
        $array = self::getArray($language);
        return Arr::get($array, $path);
    }

    public static function add($path, $value, $language)
    {
        $array = self::getArray($language);
        Arr::set($array, $path, $value);
        self::setArray($array, $language);
    }

    public static function forget($path, $language)
    {
        $array = self::getArray($language);
        Arr::forget($array, $path);
    }
}
