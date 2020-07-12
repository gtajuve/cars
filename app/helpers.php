<?php
if (! function_exists('convert_to_array')) {
    function convert_to_array($key, $array) {
        $newArray = [];
        foreach ($array as $item){
            $newArray[] = $item[$key];
        }
        return $newArray;
    }
}