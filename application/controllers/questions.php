<?php

class Questions extends CI_Controller {

    function Questions() {
        parent::__construct();

        $this->load->library(array('encrypt', 'form_validation', 'session', 'lang'));
        $this->load->helper(array('form', 'url', 'html', 'avio'));
        $this->load->model(array('questions_model'));

        init_avio_page($this->session, $this->lang);
    }

    function index() {
        $questions = $this->questions_model->get_questions();
        $data['questions'] = $questions;
        $this->load->view('questions_view', $data);
    }

    function delete() {
        $question_id = $this->input->get('question_id');
        $this->questions_model->delete_question($question_id);
		$this->session->set_flashdata('info', $this->lang->line('ui_question_delete'));#success message after deleting question
        redirect("questions");
    }
}
