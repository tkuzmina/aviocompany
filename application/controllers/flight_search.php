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
//        $flights = array();
        $flights = $this->flights_model->search($search_params);
        $data['city_list'] = $city_list;
        $data['city_from_id'] = $search_params['city_from_id'];
        $data['city_to_id'] = $search_params['city_to_id'];
        $data['flights'] = $flights;
        $this->load->view('flight_search_view', $data);
    }

    function search_by_params() {
        $city_from_id = $this->input->post('city_from_id');
        $city_to_id = $this->input->post('city_to_id');
        $search_params = array(
                   'city_from_id' => $city_from_id,
                   'city_to_id' => $city_to_id
               );
        $this->session->set_userdata('search_params', $search_params);
        redirect("flight_search");
    }
}
