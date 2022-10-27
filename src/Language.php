<?php

namespace OrangeLaravel\Language;

use Illuminate\Support\Arr;

class Language
{
    private static function getArray($language)
    {
        $path_to_file = resource_path("lang\\$language.json");
        $file = file_get_contents($path_to_file);
        return json_decode($file, true);
    }

    private static function setArray($array, $language)
    {
        $path_to_file = resource_path("lang\\$language.json");
        file_put_contents($path_to_file, json_encode($array));
    }

    public static function get($path, $language){
        $array = self::getArray($language);
        return Arr::get($array, $path);
    }

    public static function set($path, $value, $language)
    {
        $array = self::getArray($language);
        Arr::set($array, $path, $value);
        self::setArray($array, $language);
    }

    public static function delete($path, $language)
    {
        $array = self::getArray($language);
        Arr::forget($array, $path);
    }
}
