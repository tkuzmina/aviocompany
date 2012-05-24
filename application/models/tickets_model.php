<?php

class Tickets_model extends CI_Model {

    function get_tickets() {
        $query = $this->db->query("select * from tickets");
        $tickets = $query->result();
        return $tickets;
    }
    #getting ticket by id
    function get_ticket($id) {
        $sql = "select * from tickets where id=".$id;
        $query = $this->db->query($sql);
        $result = $query->result();
        return count($result) == 0 ? NULL : $result[0];
    }
    #getting ticket by flight_id
    function get_tickets_by_flight($flight_id) {
        $query = $this->db->query("select * from tickets where flight_to_id=".$flight_id." or flight_return_id=".$flight_id." order by class_id, id");
        $tickets = $query->result();
        return $tickets;
    }

    function create_ticket($flight_to_id, $flight_return_id, $class_id, $cardholder_name, $card_number, $card_expiration_date, $card_cvv2) {
        $this->db->insert('tickets', array("flight_to_id" => $flight_to_id, "flight_return_id" => $flight_return_id, "class_id" => $class_id,
                                          "cardholder_name" => $cardholder_name, "card_number" => $card_number, "card_expiration_date" => $card_expiration_date, "card_cvv2" => $card_cvv2));
        return $this->db->insert_id();
    }
}
