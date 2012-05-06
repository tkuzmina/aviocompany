<?php

if (!function_exists('get_value')) {
    function get_value($key, $array){
        if ($array == NULL) {
            return NULL;
        }
        return array_key_exists($key, $array) ? $array[$key] : NULL;
    }
}

