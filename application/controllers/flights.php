<?php

class Flights extends CI_Controller {

    function Flights() {
        parent::__construct();

        $this->load->library(array('encrypt', 'form_validation', 'session', 'lang'));
        $this->load->helper(array('form', 'url', 'html', 'avio'));
        $this->load->model(array('flights_model', 'cities_model', 'planes_model', ));

        init_avio_page($this->session, $this->lang);
    }

    function index() {
        $flights = $this->flights_model->get_flights();
        $plane_list = $this->planes_model->get_plane_list();
        $city_list = $this->cities_model->get_city_list();

        $data['flights'] = $flights;
        $data['plane_list'] = $plane_list;
        $data['city_list'] = $city_list;
        $this->load->view('flights_view', $data);
    }
	
    function add() {
        $city_from_id = $this->input->post('city_from_id');
        $city_to_id = $this->input->post('city_to_id');
        $date_from = $this->input->post('date_from');
        $time_from = $this->input->post('time_from');
        $duration = $this->input->post('duration');
		$plane_id = $this->input->post('plane_id');
		$price_economy = $this->input->post('price_economy');
		$price_business = $this->input->post('price_business');
		$price_e_child = $this->input->post('price_e_child');
		$price_b_child = $this->input->post('price_b_child');
		$price_e_infant = $this->input->post('price_e_infant');
		$price_b_infant = $this->input->post('price_b_infant');
        $this->flights_model->insert_flight($city_from_id, $city_to_id, $date_from, $time_from, $duration, $plane_id, $price_economy, $price_business, $price_e_child, $price_b_child, $price_e_infant, $price_b_infant);
        $this->session->set_flashdata('info', $this->lang->line('ui_flight_add'));
		redirect("flights");
    }
	
    function edit() {
	    $flight_id = $this->input->post('flight_id');
        $city_from_id = $this->input->post('city_from_id');
        $city_to_id = $this->input->post('city_to_id');
        $date_from = $this->input->post('date_from');
        $time_from = $this->input->post('time_from');
        $duration = $this->input->post('duration');
		$plane_id = $this->input->post('plane_id');
		$price_economy = $this->input->post('price_economy');
		$price_business = $this->input->post('price_business');
		$price_e_child = $this->input->post('price_e_child');
		$price_b_child = $this->input->post('price_b_child');
		$price_e_infant = $this->input->post('price_e_infant');
		$price_b_infant = $this->input->post('price_b_infant');
        $this->flights_model->update_flight($flight_id, $city_from_id, $city_to_id, $date_from, $time_from, $duration, $plane_id, $price_economy, $price_business, $price_e_child, $price_b_child, $price_e_infant, $price_b_infant);
        $this->session->set_flashdata('info', $this->lang->line('ui_flight_edit'));
		redirect("flights");
    }

    function delete() {
        $flight_id = $this->input->get('flight_id');
        $this->flights_model->delete_flight($flight_id);
        $this->session->set_flashdata('info', $this->lang->line('ui_flight_delete'));
	    redirect("flights");
    }


}
