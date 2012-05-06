<?php

class Tickets_model extends CI_Model {

    function get_tickets() {
        $query = $this->db->query("select * from tickets");
        $tickets = $query->result();
        return $tickets;
    }

    function get_ticket($id) {
        $sql = "select * from tickets where id=".$id;
        $query = $this->db->query($sql);
        $result = $query->result();
        return count($result) == 0 ? NULL : $result[0];
    /*
        if (count($result) == 0){
            return NULL;
        } else {
            return $result[0];
        }
   */
    }

    function create_ticket($flight_id, $class_id) {
        $this->db->insert('tickets', array("flight_id" => $flight_id, "class_id" => $class_id));
        return $this->db->insert_id();
    }
}
