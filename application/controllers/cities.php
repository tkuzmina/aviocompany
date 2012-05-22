<?php

class Cities extends CI_Controller {
    function Cities() {
        parent::__construct();

        $this->load->library(array('encrypt', 'form_validation', 'session', 'lang'));
		$this->load->helper(array('form', 'url', 'html', 'avio'));
	    $this->load->model(array('cities_model'));

        init_avio_page($this->session, $this->lang);
	}

    function index() {
        $cities = $this->cities_model->get_cities();
        $city_list = $this->cities_model->get_city_list();
        $data['cities'] = $cities;
        $data['city_list'] = $city_list;
        $this->load->view('cities_view', $data);
    }
	
	function add() {
        $name = $this->input->post('name');
        $this->cities_model->insert_city($name);
		$this->session->set_flashdata('info', $this->lang->line('ui_city_add'));
        redirect("cities");
    }

    function delete() {
        $city_id = $this->input->get('city_id');
        $this->cities_model->delete_city($city_id);
		$this->session->set_flashdata('info', $this->lang->line('ui_city_delete'));
        redirect("cities");
    }

    function edit() {
        $city_id = $this->input->post('city_id');
        $name = $this->input->post('name');
        $this->cities_model->update_city($city_id,$name);
		$this->session->set_flashdata('info', $this->lang->line('ui_city_edit'));
        redirect("cities");
    }


}