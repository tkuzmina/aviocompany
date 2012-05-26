<?php
#check key in array
if (!function_exists('get_value')) {
    function get_value($key, $array){
        if ($array == NULL) {
            return NULL;
        }
        return array_key_exists($key, $array) ? $array[$key] : NULL;
    }
}
#replace avio_url($relative), to a site_url($relative)
if (!function_exists('avio_url')) {
    function avio_url($relative){
        return site_url($relative);
    }
}
#replace avio_resource_url($relative), to a "/aviocompany/".$relative
if (!function_exists('avio_resource_url')) {
    function avio_resource_url($relative){
        return "/aviocompany/".$relative;
    }
}
#function set language and load translation,if there is any form_validation than set messsage
if (!function_exists('init_avio_page')) {
    function init_avio_page($session, $lang, $form_validation = null) {
        $language = $session->userdata('language');
        if (!$language) {
            $language = 'lv';
        }
        $lang->load('ui', $language);

        if ($form_validation) {
            $form_validation->set_message('required', $lang->line('ui_rule_required'));
            $form_validation->set_message('max_length', $lang->line('ui_rule_max_length'));
            $form_validation->set_message('valid_email', $lang->line('ui_rule_valid_email'));
            $form_validation->set_message('integer', $lang->line('ui_rule_integer'));
            $form_validation->set_message('less_than', $lang->line('ui_rule_less_than'));
        }
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
