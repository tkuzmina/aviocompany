<?php

class Planes extends CI_Controller {
    function Planes() {
        parent::__construct();

        $this->load->library(array('encrypt', 'form_validation', 'session', 'lang'));
		$this->load->helper(array('form', 'url', 'html', 'avio'));
	    $this->load->model(array('planes_model'));

        init_avio_page($this->session, $this->lang);
	}

    function index() {
        $planes = $this->planes_model->get_planes();
		$plane_list = $this->planes_model->get_plane_list();
        $data['planes'] = $planes;
		$data['plane_list'] = $plane_list;
        $this->load->view('planes_view', $data);
    }
	
	function add() {
        $model = $this->input->post('model');
		$seats_economy = $this->input->post('seats_economy');
		$seats_business = $this->input->post('seats_business');
		$luggage_count = $this->input->post('luggage_count');
        $this->planes_model->insert_plane($model,$seats_economy,$seats_business,$luggage_count);
		$this->session->set_flashdata('message', 'Plane was added successfully!');
        redirect("planes");
    }

    function delete() {
        $plane_id = $this->input->get('plane_id');
        $this->planes_model->delete_plane($plane_id);
		$this->session->set_flashdata('message', 'Plane is deleted successfully!');
        redirect("planes");
    }

    function edit() {
        $plane_id = $this->input->post('plane_id');
        $model = $this->input->post('model');
		$seats_economy = $this->input->post('seats_economy');
		$seats_business = $this->input->post('seats_business');
		$luggage_count = $this->input->post('luggage_count');
        $this->planes_model->update_plane($plane_id,$model,$seats_economy,$seats_business,$luggage_count);
		$this->session->set_flashdata('message', 'Plane is eddited successfully!');
        redirect("planes");
    }
}