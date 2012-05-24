<?php

class Flights_model extends CI_Model {

    // query that searches for flights and information from linked tables (cities, planes)
    private $FLIGHT_SQL = "select f.*, c_to.name as city_to_name, c_from.name as city_from_name,
            p.model as plane_model, p.seats_economy as seats_economy, p.seats_business as seats_business
        from flights f, cities c_to, cities c_from, planes p
        where f.city_from_id = c_from.id and f.city_to_id = c_to.id and f.plane_id = p.id";

    // query that searches for count of occupied seats by flight and class
    private $OCCUPIED_SQL = "select f.id as id, t.class_id as class_id, count(f.id) as occupied from flights f, tickets t, passengers pa
        where (t.flight_to_id = f.id or t.flight_return_id = f.id) and pa.ticket_id = t.id
        group by f.id, t.class_id";

    // $direction - direction of the flight
    // true = from -> to
    // false = to -> from
    function get_flights_by_criteria($search_params, $direction) {
        $sql = $this->FLIGHT_SQL;
        $sql = $this->append_criteria($sql, $search_params, $direction);
        $query = $this->db->query($sql);
        $flights = $query->result();
        $this->count_price($search_params, $flights);
        $this->count_free_spaces($flights);

        $results = array();
        if ($search_params) {
            $seats_needed = $search_params["adult_count"] + $search_params["child_count"] + $search_params["infant_count"];
            foreach ($flights as $flight) {
                $seats_free = $search_params["class_id"] == 1 ? $flight->free_economy : $flight->free_business;
                if ($seats_free >= $seats_needed) {
                    array_push($results, $flight);
                }
            }
        }
        return $results;
    }

    function count_price($search_params, $flights) {
        foreach ($flights as $flight) {
            $this->count_flight_price_by_params($search_params, $flight);
        }
    }

    function count_flight_price_by_params($search_params, $flight) {
        $this->count_flight_price($search_params['class_id'],
                                  $search_params['adult_count'],
                                  $search_params['child_count'],
                                  $search_params['infant_count'],
                                  $flight);
    }

    function count_flight_price_by_ticket($ticket, $passengers, $flight) {
        $adult_count = 0;
        $child_count = 0;
        $infant_count = 0;
        foreach ($passengers as $passenger) {
            if ($passenger->type_id == 1) {
                $adult_count++;
            } else if ($passenger->type_id == 2) {
                $child_count++;
            } else if ($passenger->type_id == 3) {
                $infant_count++;
            }
        }
        $this->count_flight_price($ticket->class_id, $adult_count, $child_count, $infant_count, $flight);
    }

    function count_flight_price($class_id, $adult_count, $child_count, $infant_count, $flight) {
        if (!$flight) {
            return;
        }

        if ($class_id == 1) {
            $price = $adult_count * $flight->price_economy
                     + $child_count * $flight->price_e_child
                     + $infant_count * $flight->price_e_infant;
        } else {
            $price = $adult_count * $flight->price_business
                     + $child_count * $flight->price_b_child
                     + $infant_count * $flight->price_b_infant;
        }
        $flight->price = $price;
    }

	private function append_criteria($sql, $search_params, $direction) {
        if (!$search_params) {
            return $sql;
        }

        $sql = $sql." and f.city_from_id=".($direction ? $search_params['city_from_id'] : $search_params['city_to_id']);
        $sql = $sql." and f.city_to_id=".($direction ? $search_params['city_to_id'] : $search_params['city_from_id']);
        $sql = $sql." and f.date_from='".($direction ? $search_params['date_to'] : $search_params['date_return'])."'";
        $sql = $sql." and f.date_from > '".date("Y-m-d")."'";
        return $sql;
    }

    function is_defined($key, $array) {
        return array_key_exists($key, $array) && $array[$key];
    }
  
    function get_flights() {
        $query = $this->db->query($this->FLIGHT_SQL);
        $flights = $query->result();
        $this->count_free_spaces($flights);
        return $flights;
    }

    function count_free_spaces($flights) {
        $query = $this->db->query($this->OCCUPIED_SQL);
        $occupied = $query->result();
        foreach ($flights as $flight) {
            $occupied_economy = $this->get_occupied_spaces($flight->id, 1, $occupied);
            $occupied_business = $this->get_occupied_spaces($flight->id, 2, $occupied);
            $plane = $this->db->query("select * from planes where id=".$flight->plane_id)->result();
            $flight->free_economy = $plane[0]->seats_economy - $occupied_economy;
            $flight->free_business = $plane[0]->seats_business - $occupied_business;
        }
    }

    function get_occupied_spaces($flight_id, $class_id, $occupied) {
        foreach ($occupied as $space) {
            if (($space->id == $flight_id) && ($space->class_id == $class_id)) {
                return $space->occupied;
            }
        }
        return 0;
    }

    function get_flight($id) {
        if (!$id) {
            return NULL;
        }

        $sql = $this->FLIGHT_SQL." and f.id=".$id;
        $query = $this->db->query($sql);
        $result = $query->result();
        if (count($result) == 0){
            return NULL;
        } else {
            $this->count_free_spaces($result);
            return $result[0];
        }
    }

    function insert_flight($city_from_id, $city_to_id, $date_from, $time_from, $duration, $plane_id, $price_economy, $price_business, $price_e_child, $price_b_child, $price_e_infant, $price_b_infant) {
        $this->db->insert('flights', array("city_from_id" => $city_from_id, "city_to_id" => $city_to_id, "date_from" => $date_from, "time_from" => $time_from, "duration" => $duration, "plane_id" => $plane_id, "price_economy" => $price_economy, "price_business" => $price_business, "price_e_child" => $price_e_child, "price_b_child" => $price_b_child, "price_e_infant" => $price_e_infant, "price_b_infant" => $price_b_infant));
    }

    function delete_flight($flight_id) {
        $this->db->delete('flights', array("id" => $flight_id));
    }

    function update_flight($flight_id, $city_from_id, $city_to_id, $date_from, $time_from, $duration, $plane_id, $price_economy, $price_business, $price_e_child, $price_b_child, $price_e_infant, $price_b_infant) {
        $this->db->update('flights', array("city_from_id" => $city_from_id, "city_to_id" => $city_to_id, "date_from" => $date_from, "time_from" => $time_from, "duration" => $duration, "plane_id" => $plane_id, "price_economy" => $price_economy, "price_business" => $price_business, "price_e_child" => $price_e_child, "price_b_child" => $price_b_child, "price_e_infant" => $price_e_infant, "price_b_infant" => $price_b_infant), array("id" => $flight_id));
    }
}
