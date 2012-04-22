<?php

class Tickets extends CI_Controller {

    function Tickets() {
        parent::__construct();

        $this->load->library(array('encrypt', 'form_validation', 'session'));
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->model(array('tickets_model', 'classes_model', 'flights_model'));
    }
	
	
   function index() {
        $classes=$this->classes_model->get_class_map();
        $tickets = $this->tickets_model->get_tickets();
		$flights = $this->flights_model->get_flight_list();
		$data['flights'] = $flights;
        $data['classes'] = $classes;
        $data['tickets'] = $tickets;
        $this->load->view('tickets_view', $data);
    }
	
	function add() {
        $flight_id = $this->input->post('flight_id');
		$class_id = $this->input->post('class_id');
        $this->tickets_model->insert_ticket($flight_id, $class_id);
        redirect("tickets");
    }

    function delete() {
        $ticket_id = $this->input->get('ticket_id');
        $this->tickets_model->delete_ticket($ticket_id);
        redirect("tickets");
    }

	function edit() {
	    $ticket_id = $this->input->post('ticket_id');
        $flight_id = $this->input->post('flight_id');
		$class_id = $this->input->post('class_id');
        $this->tickets_model->update_ticket($ticket_id, $flight_id, $class_id);
        redirect("tickets");
    }

}
