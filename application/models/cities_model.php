<?php

class Cities_model extends CI_Model {

    function get_cities() {
        $query = $this->db->query("select * from cities");
        $cities = $query->result();
        return $cities;
    }

    function insert_city($name){
        $this->db->insert('cities', array("name" => $name));
    }

    function delete_city($city_id) {
        $this->db->delete('cities', array("id" => $city_id));
    }

    function update_city($city_id, $name) {
        $this->db->update('cities', array("name" => $name), array('id' => $city_id));
    }

    function get_city_list() {
        $cities = $this->get_cities();
        $city_list = array();
        foreach ($cities as $city){
            $city_list[$city->id] = $city->name;
        }
        return $city_list;
    }
}
