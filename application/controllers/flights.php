<?php

class Events extends CI_Controller {

    function Events() {
        parent::__construct();

        $this->load->library(array('encrypt', 'form_validation', 'session'));
        $this->load->helper(array('form', 'url', 'html', 'aviocompany_url'));
        $this->load->model(array('flghts_model', 'cities_model', 'planes_model', 'tickets_model'));

        init_events_page($this->session, $this->lang);
    }

    function index() {

    }

    function search_flight() {
      
    }

    function my_flight() {

    }

    function add() {
        $city_from_id = $this->input->post('city_from_id');
        $city_to_id = $this->input->post('city_to_id');
        $date_from = $this->input->post('date_from');
		$date_to = $this->input->post('date_to');
		$time_from = $this->input->post('time_from');
		$time_to = $this->input->post('time_to');
		$plane_id = $this->input->post('plane_id');
		$price_economy = $this->input->post('price_economy ');
		$price_business = $this->input->post('price_business');
		$price_e_child = $this->input->post('price_e_child');
		$price_b_child = $this->input->post('price_b_child');
		$price_e_infant = $this->input->post('price_e_infant');
		$price_b_infant = $this->input->post('price_b_infant');
		
        $this->flights_model->insert_flight($city_from_id, $city_to_id, $date_from, $date_to, $time_from, $time_to, $plane_id, $price_economy, $price_business, $price_e_child, $price_b_child, $price_e_infant, $price_b_infant);

        redirect(flights_url('flights'));
    }



    function edit() {
       $city_from_id = $this->input->post('city_from_id');
        $city_to_id = $this->input->post('city_to_id');
        $date_from = $this->input->post('date_from');
		$date_to = $this->input->post('date_to');
		$time_from = $this->input->post('time_from');
		$time_to = $this->input->post('time_to');
		$plane_id = $this->input->post('plane_id');
		$price_economy = $this->input->post('price_economy ');
		$price_business = $this->input->post('price_business');
		$price_e_child = $this->input->post('price_e_child');
		$price_b_child = $this->input->post('price_b_child');
		$price_e_infant = $this->input->post('price_e_infant');
		$price_b_infant = $this->input->post('price_b_infant');
		
        $this->flights_model->update_flight($city_from_id, $city_to_id, $date_from, $date_to, $time_from, $time_to, $plane_id, $price_economy, $price_business, $price_e_child, $price_b_child, $price_e_infant, $price_b_infant);

        redirect(flights_url('flights'));
    }

    function delete() {
        $flight_id = $this->input->get('flight_id');
        $this->flights_model->delete_flight($flight_id);

        redirect(flights_url('flights'));
    }
}
