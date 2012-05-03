<?php

class Flight_search extends CI_Controller {

    function Flight_search() {
        parent::__construct();

        $this->load->library(array('encrypt', 'form_validation', 'session'));
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->model(array('flights_model', 'cities_model', 'planes_model'));
    }

    function index() {
        $search_params = $this->session->userdata('search_params');
        $city_list = $this->cities_model->get_city_list();
		$plane_list = $this->planes_model->get_plane_list();
//        $flights = array();
        $flights = $this->flights_model->get_flights_by_criteria($search_params);
     //   $flights = $this->flights_model->search($search_params);
        $data['city_list'] = $city_list;
		$data['plane_list'] = $plane_list;
        $data['city_from_id'] = $this->get_value('city_from_id', $search_params);
        $data['city_to_id'] = $this->get_value('city_to_id', $search_params);
        $data['date_from'] = $this->get_value('date_from', $search_params);
        $data['date_to'] = $this->get_value('date_to', $search_params);
        $data['flights'] = $flights;
        $this->load->view('flight_search_view', $data);
    }

    function get_value($key, $array){
        return array_key_exists($key, $array) ? $array[$key] : NULL;
    }

    function search_by_params() {
        $search_params = array(
                   'city_from_id' => $this->input->post('city_from_id'),
                   'city_to_id' => $this->input->post('city_to_id'),
                   'date_from' => $this->input->post('date_from'),
                   'date_to' => $this->input->post('date_to')
               );
        $this->session->set_userdata('search_params', $search_params);
        redirect("flight_search");
    }
}
