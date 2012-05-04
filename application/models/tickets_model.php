<?php

class Tickets_model extends CI_Model {

    function get_tickets() {
        $query = $this->db->query("select * from tickets");
        $tickets = $query->result();
        return $tickets;
    }

    function insert_passanger($name, $surname, $telephone, $luggage_count, $passport_int){
        $this->db->insert('passengers', array("name" => $name,"surname" => $surname,"telephone" => $telephone,"luggage_count" => $luggage_count,"passport_int" => $passport_int  ));
    }

}
