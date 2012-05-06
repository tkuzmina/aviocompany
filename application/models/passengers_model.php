<?php

class Passengers_model extends CI_Model {

    function get_passengers($ticket_id) {
        $query = $this->db->query("select * from passengers where ticket_id=".$ticket_id);
        $tickets = $query->result();
        return $tickets;
    }

    function create_passenger($ticket_id, $type_id, $name, $surname, $luggage_count, $passport_number, $issue_date, $expiration_date){
        $this->db->insert('passengers', array("ticket_id" => $ticket_id, "type_id" => $type_id,
                                             "name" => $name, "surname" => $surname, "luggage_count" => $luggage_count,
                                             "passport_number" => $passport_number, "issue_date" => $issue_date, "expiration_date" => $expiration_date));
    }

}
