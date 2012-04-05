<?php

class Flights_model extends CI_Model {

    function get_flights() {
        $query = $this->db->query("select * from flghts");
        $flights = $query->result();
        return $flights;
    }

    function insert_flight($city_from_id,$city_to_id,$date_from,$date_to,$time_from,$time_to,$plane_id,$price_economy,$price_business,$price_e_child,$price_b_child,$price_e_infant,$price_b_infant){
        $this->db->insert('flights', array("city_from_id" => $city_from_id,"city_to_id" => $city_to_id,"date_from" => $date_from,"date_to" => $date_to,"time_from" => $time_from,"time_to" => $time_to,"plane_id" => $plane_id,"price_economy" => $price_economy,"price_business" => $price_business,"price_e_child" => $price_e_child,"price_b_child" => $price_b_child,"price_e_infant" => $price_e_infant,"price_b_infant" => $price_b_infant));
    }

    function delete_flight($flight_id) {
        $this->db->delete('flights', array("id" => $flight_id));
    }

    function update_flight($flight_id,$city_from_id,$city_to_id,$date_from,$date_to,$time_from,$time_to,$plane_id,$price_economy,$price_business,$price_e_child,$price_b_child,$price_e_infant,$price_b_infant) {
        $this->db->update('flights', array("city_from_id" => $city_from_id,"city_to_id" => $city_to_id,"date_from" => $date_from,"date_to" => $date_to,"time_from" => $time_from,"time_to" => $time_to,"plane_id" => $plane_id,"price_economy" => $price_economy,"price_business" => $price_business,"price_e_child" => $price_e_child,"price_b_child" => $price_b_child,"price_e_infant" => $price_e_infant,"price_b_infant" => $price_b_infant), array('id' => $flight_id));
    }
	
}
