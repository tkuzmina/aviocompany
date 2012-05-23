<?php

class Languages extends CI_Controller {

    function Languages() {
        parent::__construct();

        $this->load->library(array('encrypt', 'form_validation', 'session', 'lang'));
        $this->load->helper(array('form', 'url', 'html', 'avio'));

        init_avio_page($this->session, $this->lang);
    }

	#set certain language to a session, and redirect to the main page
    function set_language() {
        $language = $this->input->get('language');
        if ($language) {
            $this->session->set_userdata('language', $language);
        }

        redirect("main");
    }

}
