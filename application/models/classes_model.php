<?php

class Classes_model extends CI_Model {

    function get_class_map() {
        $query = $this->db->query("select * from classes");
        $classes = $query->result();
        $class_map = array();
        foreach($classes as $class) {
            $class_map[$class->id] = $class->name; # array("1" => "economy", "2" => "business")
        }
        return $class_map;
    }
}