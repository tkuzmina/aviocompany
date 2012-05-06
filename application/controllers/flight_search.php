<?php

class Flight_search extends CI_Controller {

    function Flight_search() {
        parent::__construct();

        $this->load->library(array('encrypt', 'form_validation', 'session'));
        $this->load->helper(array('form', 'url', 'html', 'avio'));
        $this->load->model(array('flights_model', 'cities_model', 'planes_model', 'classes_model'));
    }

    function index() {
        $search_params = $this->session->userdata('search_params');
        $city_list = $this->cities_model->get_city_list();
		$plane_list = $this->planes_model->get_plane_list();
		$classes_list = $this->classes_model->get_class_map();
//        $flights = array();
        $flights = $this->flights_model->get_flights_by_criteria($search_params);
     //   $flights = $this->flights_model->search($search_params);
        $data['city_list'] = $city_list;
		$data['plane_list'] = $plane_list;
		$data['count_list'] = $this->get_count_list();
		$data['classes_list'] = $classes_list;
        $data['city_from_id'] = get_value('city_from_id', $search_params);
        $data['city_to_id'] = get_value('city_to_id', $search_params);
        $data['date_from'] = get_value('date_from', $search_params);
        $data['date_to'] = get_value('date_to', $search_params);
        $data['adult_count'] = get_value('adult_count', $search_params);
        $data['child_count'] = get_value('child_count', $search_params);
        $data['infant_count'] = get_value('infant_count', $search_params);
        $data['class_id'] = get_value('class_id', $search_params);
        $data['flights'] = $flights;
        $this->load->view('flight_search_view', $data);
    }


    function get_count_list(){
        $result = array();
        for($count = 0; $count <= 9; $count++){
            $result[$count] = $count;
        }
        return $result;
    }

    function search_by_params() {
        $search_params = array(
                   'city_from_id' => $this->input->post('city_from_id'),
                   'city_to_id' => $this->input->post('city_to_id'),
                   'date_from' => $this->input->post('date_from'),
                   'date_to' => $this->input->post('date_to'),
                   'adult_count' => $this->input->post('adult_count'),
                   'child_count' => $this->input->post('child_count'),
                   'infant_count' => $this->input->post('infant_count'),
                   'class_id' => $this->input->post('class_id')
               );
        $this->session->set_userdata('search_params', $search_params);
        redirect("flight_search");
    }
}
