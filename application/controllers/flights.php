<?php

class Flights extends CI_Controller {

    function Flights() {
        parent::__construct();

        $this->load->library(array('encrypt', 'form_validation', 'session'));
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->model(array('flights_model', 'cities_model', 'planes_model'));
    }

    function show_add() {
        $data['planes'] = $this->planes_model->get_plane_map(false);
        $this->load->view('flight_view', $data);
    }
	
	function show_edit() {
        $data['planes'] = $this->planes_model->get_plane_map(false);
        $this->load->view('flight_view', $data);
    }
	
//    $data['models'] = $this->flights_model->get_dropdown_models();
  
}
