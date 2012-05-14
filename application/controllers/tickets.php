<?php

class Tickets extends CI_Controller {

    function Tickets() {
        parent::__construct();

        $this->load->library(array('encrypt', 'form_validation', 'session'));
        $this->load->helper(array('form', 'url', 'html', 'avio'));
        $this->load->model(array('tickets_model', 'classes_model', 'flights_model', 'passengers_model', 'passenger_types_model'));
    }

    function index() {
        $ticket_id = $this->input->get('ticket_id');
        $ticket = $this->tickets_model->get_ticket($ticket_id);
        if (!$ticket) {
            $this->session->set_flashdata('message', 'Ticket not found by provided reservation id.');
            redirect('main');
            return;
        }

        $flight_to = $this->flights_model->get_flight($ticket->flight_to_id);
        $flight_return = $this->flights_model->get_flight($ticket->flight_return_id);
        $passengers = $this->passengers_model->get_passengers($ticket_id);
        $this->flights_model->count_flight_price_by_ticket($ticket, $passengers, $flight_to);
        $this->flights_model->count_flight_price_by_ticket($ticket, $passengers, $flight_return);
        $data['ticket'] = $ticket;
        $data['flight_to'] = $flight_to;
        $data['flight_return'] = $flight_return;
        $data['passengers'] = $passengers;
        $this->load->view('ticket_view', $data);
    }

    function print_ticket() {
        $ticket_id = $this->input->get('ticket_id');
        $ticket = $this->tickets_model->get_ticket($ticket_id);
        if (!$ticket) {
            $this->session->set_flashdata('message', 'Ticket not found by provided reservation id.');
            redirect('main');
            return;
        }

        $flight_to = $this->flights_model->get_flight($ticket->flight_to_id);
        $flight_return = $this->flights_model->get_flight($ticket->flight_return_id);
        $passengers = $this->passengers_model->get_passengers($ticket_id);
        $data['ticket'] = $ticket;
        $data['flight_to'] = $flight_to;
        $data['flight_return'] = $flight_return;
        $data['passengers'] = $passengers;
        $this->load->view('print_ticket_view', $data);
    }

    function buy() {
        $search_params = $this->session->userdata('search_params');
        $classes = $this->classes_model->get_class_map();
        $flight_to_id = $this->input->get('flight_to_id');
        $flight_return_id = $this->input->get('flight_return_id');
        $flight_to = $this->flights_model->get_flight($flight_to_id);
        $this->flights_model->count_flight_price_by_params($search_params, $flight_to);
        $flight_return = $this->flights_model->get_flight($flight_return_id);
        $this->flights_model->count_flight_price_by_params($search_params, $flight_return);
        $data['classes'] = $classes;
        $data['flight_to'] = $flight_to;
        $data['flight_return'] = $flight_return;
        $data['class_id'] = get_value('class_id', $search_params);
        $data['types'] = $this->get_types($search_params);
        $data['type_list'] = $this->passenger_types_model->get_types_map();
        $this->load->view('add_ticket_view', $data);
    }

    function get_types($search_params) {
        $result = array();
        for ($i = 0; $i < get_value('adult_count', $search_params); $i++) {
            array_push($result, 1);
        }
        for ($i = 0; $i < get_value('child_count', $search_params); $i++) {
            array_push($result, 2);
        }
        for ($i = 0; $i < get_value('infant_count', $search_params); $i++) {
            array_push($result, 3);
        }
        return $result;
    }

    function add() {
        $flight_to_id = $this->input->post('flight_to_id');
        $flight_return_id = $this->input->post('flight_return_id');
        $class_id = $this->input->post('class_id');
        $ticket_id = $this->tickets_model->create_ticket($flight_to_id, $flight_return_id, $class_id);
        for ($i = 1; $i < $this->input->post('passenger_count'); $i++) {
            $this->add_passenger($ticket_id, $i);
        }
        redirect("tickets?ticket_id=".$ticket_id);
    }

    function add_passenger($ticket_id, $passenger_no) {
        $type_id = $this->input->post('type_id'.$passenger_no);
        $name = $this->input->post('name'.$passenger_no);
		$surname = $this->input->post('surname'.$passenger_no);
		$luggage_count = $this->input->post('luggage_count'.$passenger_no);
		$passport_number = $this->input->post('passport_number'.$passenger_no);
		$issue_date = $this->input->post('issue_date'.$passenger_no);
		$expiration_date = $this->input->post('expiration_date'.$passenger_no);
        $this->passengers_model->create_passenger($ticket_id, $type_id, $name, $surname, $luggage_count, $passport_number, $issue_date, $expiration_date);
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
