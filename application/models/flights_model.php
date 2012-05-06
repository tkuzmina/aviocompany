<?php

class Flights_model extends CI_Model {

    private $FLIGHT_SQL = "select f.*, c_to.name as city_to_name, c_from.name as city_from_name, p.model as plane_model
        from flights f, cities c_to, cities c_from, planes p
        where f.city_from_id = c_from.id and f.city_to_id = c_to.id and f.plane_id = p.id";

    function get_flights_by_criteria($search_params) {
        $sql = $this->FLIGHT_SQL;
        $sql = $this->append_criteria($sql, $search_params);

        $query = $this->db->query($sql);
        return $query->result();
    }
	
	private function append_criteria($sql, $search_params) {
        if (!$search_params) {
            return $sql;
        }

        if ($this->is_defined('city_from_id', $search_params)) {
            $sql = $sql." and f.city_from_id=".$search_params['city_from_id'];
        }
        if ($this->is_defined('city_to_id', $search_params)) {
            $sql = $sql." and f.city_to_id=".$search_params['city_to_id'];
        }
        if ($this->is_defined('date_from', $search_params)) {
            $sql = $sql." and f.date_from='".$search_params['date_from']."'";
        }
        if ($this->is_defined('date_to', $search_params)) {
            $sql = $sql." and f.date_to='".$search_params['date_to']."'";
        }
        return $sql;
    }

    function is_defined($key, $array) {
        return array_key_exists($key, $array) && $array[$key];
    }
  
    function get_flights() {
        $query = $this->db->query("select * from flights");
        $flights = $query->result();
        return $flights;
    }

    function get_flight($id) {
        $sql = $this->FLIGHT_SQL." and f.id=".$id;
        $query = $this->db->query($sql);
        $result = $query->result();
        if (count($result) == 0){
            return NULL;
        } else {
            return $result[0];
        }
    }

    function insert_flight($city_from_id,$city_to_id,$date_from,$date_to,$plane_id,$price_economy,$price_business,$price_e_child,$price_b_child,$price_e_infant,$price_b_infant){
        $this->db->insert('flights', array("city_from_id" => $city_from_id,"city_to_id" => $city_to_id,"date_from" => $date_from,"date_to" => $date_to,"plane_id" => $plane_id,"price_economy" => $price_economy,"price_business" => $price_business,"price_e_child" => $price_e_child,"price_b_child" => $price_b_child,"price_e_infant" => $price_e_infant,"price_b_infant" => $price_b_infant));
    }

    function delete_flight($flight_id) {
        $this->db->delete('flights', array("id" => $flight_id));
    }

    function update_flight($flight_id,$city_from_id,$city_to_id,$date_from,$date_to,$plane_id,$price_economy,$price_business,$price_e_child,$price_b_child,$price_e_infant,$price_b_infant) {
        $this->db->update('flights', array("city_from_id" => $city_from_id,"city_to_id" => $city_to_id,"date_from" => $date_from,"date_to" => $date_to,"plane_id" => $plane_id,"price_economy" => $price_economy,"price_business" => $price_business,"price_e_child" => $price_e_child,"price_b_child" => $price_b_child,"price_e_infant" => $price_e_infant,"price_b_infant" => $price_b_infant), array("id" => $flight_id));
    }

	function get_flight_list() {
        $flights = $this->get_flights();
        $flight_list = array();
        foreach ($flights as $flight){
            $flight_list[$flight->id] = $flight->id;
        }
        return $flight_list;
    }

    function search($search_params) {
        if (!$search_params) {
            return $this->get_flights();
        }
            // $sql =  "select f.*, c_to.name as city_to_name, c_from.name as city_from_name, p.model as plane_model
         //  from flights f, cities c_to, cities c_from, planes p where f.city_from_id = c_from.id and f.city_to_id = c_to.id and f.plane_id = p.id";

			 $sql="select * from flights
                    where city_from_id = ".$search_params['city_from_id']; 
				 //        $sql = "select f.*, p.model from flights f, planes p where f.plane_id = p.id";
        $query = $this->db->query($sql);
        return $query->result();
    }
	
	
	
	
	
}
