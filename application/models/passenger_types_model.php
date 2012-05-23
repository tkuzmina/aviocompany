<?php

class Passenger_types_model extends CI_Model {

    function get_types_map() {
        $query = $this->db->query("select * from passenger_types");
        $classes = $query->result();
        $class_map = array();
        foreach($classes as $class) {
            $class_map[$class->id] = $class->name;# array("1" => "adult", "2" => "child", "3" => "infant", )
        }
        return $class_map;
    }
}