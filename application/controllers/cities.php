<?php

class Cities extends CI_Controller {
    function Cities() {
        parent::__construct();

        $this->load->library(array('encrypt', 'form_validation', 'session'));
		$this->load->helper(array('form', 'url', 'html'));
	    $this->load->model(array('cities_model'));

	}
    function index() {
        $cities = $this->cities_model->get_cities();
        $data['cities'] = $cities;
        $this->load->view('cities_view', $data);
    }
	
	function add() {
        $name = $this->input->post('name');
        $this->cities_model->insert_city($name);
        redirect("cities");
    }

    function delete() {
        $city_id = $this->input->get('city_id');
        $this->cities_model->delete_city($city_id);
        redirect("cities");
    }

    function edit() {
        $city_id = $this->input->post('city_id');
        $name = $this->input->post('name');
        $this->cities_model->update_city($city_id,$name);
        redirect("cities");
    }
}