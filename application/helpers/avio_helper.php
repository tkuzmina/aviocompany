<?php

if (!function_exists('get_value')) {
    function get_value($key, $array){
        if ($array == NULL) {
            return NULL;
        }
        return array_key_exists($key, $array) ? $array[$key] : NULL;
    }
}

if (!function_exists('avio_url')) {
    function avio_url($relative){
        return site_url($relative);
    }
}

if (!function_exists('avio_resource_url')) {
    function avio_resource_url($relative){
        return "/avio/".$relative;
    }
}

if (!function_exists('init_avio_page')) {
    function init_avio_page($session, $lang) {
        $language = $session->userdata('language');
        if (!$language) {
            $language = 'en';
        }
        $lang->load('ui', $language);
    }
}

if (!function_exists('validation_class')) {
    function validation_class($field_name, $class = NULL) {
        $result = "class='";
        if (form_error($field_name)) {
            $result = $result."validation";
        }
        if ($class) {
            $result = $result." ".$class;
        }
        $result = $result."'";
        return $result;
    }
}
