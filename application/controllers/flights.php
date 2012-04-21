<?php

class Flights extends CI_Controller {

    function Flights() {
        parent::__construct();

        $this->load->library(array('encrypt', 'form_validation', 'session'));
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->model(array('flights_model', 'cities_model', 'planes_model', ));

    }

    function index() {
    $flights = $this->flights_model->get_flights();
	$planes = $this->planes_model->get_planes();
	$plane_list = $this->planes_model->get_plane_list();
    $city_list = $this->cities_model->get_city_list();
		
    $data['flights'] = $flights;
	$data['plane_list'] = $plane_list;
    $data['city_list'] = $city_list;
    $this->load->view('flights_view', $data);
    }

	
	function filter() {
        $this->set_search_params(
            $this->input->post('flight_id'),
            $this->input->post('city_from_id'),
            $this->input->post('city_to_id'),
            $this->input->post('datetime_from'),
			$this->input->post('datetime_to')
        );

        redirect(events_url('events'));
    }
	
    function add() {
        $city_from_id = $this->input->post('city_from_id');
        $city_to_id = $this->input->post('city_to_id');
        $datetime_from = $this->input->post('datetime_from');
        $datetime_to = $this->input->post('datetime_to');
		$plane_id = $this->input->post('plane_id');
		$price_economy = $this->input->post('price_economy');
		$price_business = $this->input->post('price_business');
		$price_e_child = $this->input->post('price_e_child');
		$price_b_child = $this->input->post('price_b_child');
		$price_e_infant = $this->input->post('price_e_infant');
		$price_b_infant = $this->input->post('price_b_infant');
        $this->flights_model->insert_flight($city_from_id,$city_to_id,$datetime_from,$datetime_to,$plane_id,$price_economy,$price_business,$price_e_child,$price_b_child,$price_e_infant,$price_b_infant);
        redirect("flights");
    }
	
    function edit() {
	    $flight_id = $this->input->post('flight_id');
        $city_from_id = $this->input->post('city_from_id');
        $city_to_id = $this->input->post('city_to_id');
        $datetime_from = $this->input->post('datetime_from');
        $datetime_to = $this->input->post('datetime_to');
		$plane_id = $this->input->post('plane_id');
		$price_economy = $this->input->post('price_economy');
		$price_business = $this->input->post('price_business');
		$price_e_child = $this->input->post('price_e_child');
		$price_b_child = $this->input->post('price_b_child');
		$price_e_infant = $this->input->post('price_e_infant');
		$price_b_infant = $this->input->post('price_b_infant');
        $this->flights_model->update_flight($flight_id,$city_from_id,$city_to_id,$datetime_from,$datetime_to,$plane_id,$price_economy,$price_business,$price_e_child,$price_b_child,$price_e_infant,$price_b_infant);
        redirect("flights");
    }

    function delete() {
        $flight_id = $this->input->get('flight_id');
        $this->flights_model->delete_flight($flight_id);
        redirect("flights");
    }


}
