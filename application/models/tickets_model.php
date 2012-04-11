<?php

class Tickets_model extends CI_Model {

    function get_tickets() {
        $query = $this->db->query("select * from tickets");
        $tickets = $query->result();
        return $tickets;
    }

    function insert_ticket($flight_id,$class_id){
        $this->db->insert('tickets', array("flight_id" => $flight_id,"class_id" => $class_id ));
    }

    function delete_ticket($ticket_id) {
        $this->db->delete('tickets', array("id" => $ticket_id));
    }

    function update_ticket($ticket_id,$flight_id,$class_id) {
        $this->db->update('tickets', array("flight_id" => $flight_id,"class_id" => $class_id ), array("id" => $ticket_id));
    }

}
