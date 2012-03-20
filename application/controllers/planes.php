<?php

class Planes extends CI_Controller {
    function Planes() {
        parent::__construct();
        
        $this->load->library(array('encrypt', 'form_validation', 'session'));
		$this->load->helper(array('form', 'url', 'html', 'aviocompany_url'));
		$this->load->model(array('planes_model'));
	
	}
    function index() {
        $planes = $this->planes_model->get_planes();
        $data['planes'] = $planes;
        $this->load->view('planes_view', $data);
    }
	
	function add() {
        $model = $this->input->post('model');
		$seats_economy = $this->input->post('seats_economy');
		$seats_business = $this->input->post('seats_business');
		$luggage_count = $this->input->post('luggage_count');
        $this->planes_model->insert_plane($model,$seats_economy,$seats_business,$luggage_count);

        redirect_back($this->session);
    }

    function delete() {
        $plane_id = $this->input->get('plane_id');
        $this->planes_model->delete_plane($plane_id);

        redirect_back($this->session);
    }

    function edit() {
        $plane_id = $this->input->post('plane_id');
        $model = $this->input->post('model');
		$seats_economy = $this->input->post('seats_economy');
		$seats_business = $this->input->post('seats_business');
		$luggage_count = $this->input->post('luggage_count');
        $this->planes_model->update_plane($plane_id,$model,$seats_economy,$seats_business,$luggage_count);

        redirect_back($this->session);
    }
}