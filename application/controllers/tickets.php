<?php

class Tickets extends CI_Controller {

    function Tickets() {
        parent::__construct();

        $this->load->library(array('encrypt', 'form_validation', 'session', 'lang'));
        $this->load->helper(array('form', 'url', 'html', 'avio'));
        $this->load->model(array('tickets_model', 'classes_model', 'flights_model', 'passengers_model', 'passenger_types_model'));

        init_avio_page($this->session, $this->lang);
    }

    function index() {
        $ticket_id = $this->input->get('ticket_id');
        $ticket = $this->tickets_model->get_ticket($ticket_id);
		#check the reservation id,if it isn't correct return message
        if (!$ticket) {
            $this->session->set_flashdata('message', $this->lang->line('ui_no_ticket'));
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

    function view() {
        $flight_id = $this->input->get('flight_id');
        $flight = $this->flights_model->get_flight($flight_id);
        $tickets = $this->tickets_model->get_tickets_by_flight($flight_id);
        $ticket_passengers = array();
        foreach ($tickets as $ticket) {
            $ticket_id = $ticket->id;
            $passengers = $this->passengers_model->get_passengers($ticket_id);
            $ticket_passengers[$ticket_id] = $passengers;
        }
        $data['flight'] = $flight;
        $data['tickets'] = $tickets;
        $data['ticket_passengers'] = $ticket_passengers;
        $this->load->view('tickets_view', $data);
    }

    function print_ticket() {
        $ticket_id = $this->input->get('ticket_id');
        $ticket = $this->tickets_model->get_ticket($ticket_id);
		#check the reservation id, if it isn't correct return message
        if (!$ticket) {
            $this->session->set_flashdata('message', $this->lang->line('ui_no_ticket'));
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
        $flight_to_id = $this->input->get('flight_to_id');
        $flight_return_id = $this->input->get('flight_return_id');
        $this->load_add_ticket_view($flight_to_id, $flight_return_id);
    }

	#function loads add tcket view
    function load_add_ticket_view($flight_to_id, $flight_return_id) {
        $search_params = $this->session->userdata('search_params');
        $classes = $this->classes_model->get_class_map();
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
        if (!$this->validate_passengers()) {
            $this->load_add_ticket_view($flight_to_id, $flight_return_id);
            return;
        }

        $class_id = $this->input->post('class_id');
        $ticket_id = $this->tickets_model->create_ticket($flight_to_id, $flight_return_id, $class_id);
        for ($i = 1; $i < $this->input->post('passenger_count'); $i++) {
            $this->add_passenger($ticket_id, $i);
        }
        redirect("tickets?ticket_id=".$ticket_id);
    }

    function validate_passengers() {
        for ($passenger_no = 1; $passenger_no < $this->input->post('passenger_count'); $passenger_no++) {
            $this->form_validation->set_rules('name'.$passenger_no, 'lang:ui_passenger_name', 'required|alpha|max_length[30]');
            $this->form_validation->set_rules('surname'.$passenger_no, 'lang:ui_passenger_surname', 'required|alpha|max_length[30]');
            $this->form_validation->set_rules('luggage_count'.$passenger_no, 'lang:ui_luggage_count', 'required|integer|less_than[10]');
            $this->form_validation->set_rules('passport_number'.$passenger_no, 'lang:ui_passport_no', 'required|alpha_dash');
            $this->form_validation->set_rules('issue_date'.$passenger_no, 'lang:ui_date_of_issue', 'required');
            $this->form_validation->set_rules('expiration_date'.$passenger_no, 'lang:ui_date_of_expiration', 'required');
        }
        return $this->form_validation->run();
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
