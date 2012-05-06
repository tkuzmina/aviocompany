<?php

class Passenger_types_model extends CI_Model {

    function get_types_map() {
        $query = $this->db->query("select * from passenger_types");
        $classes = $query->result();
        $class_map = array();
        foreach($classes as $class) {
            $class_map[$class->id] = $class->name;
        }
        return $class_map;
    }
}