<?php

class Users extends CI_Controller {

    function Users() {
        parent::__construct();

        $this->load->library(array('encrypt', 'form_validation', 'session', 'lang'));
        $this->load->helper(array('form', 'url', 'html', 'avio'));
        $this->load->model(array('users_model', 'roles_model'));

        init_avio_page($this->session, $this->lang);
    }

    function login() {
        $login = $this->input->post('login');
        $password = $this->input->post('password');

        $user = $this->users_model->get_by_login($login);
        if ($user) {
            if ($password == $this->decrypt_password($user->password)) {
			#set_userdata sets a value to session
                $this->session->set_userdata('current_user', $user);
            } else {
                $this->session->set_flashdata('message', $this->lang->line('ui_incorrect_password'));
            }
        } else {
            $this->session->set_flashdata('message', $this->lang->line('ui_do_not_exist'));
        }

        redirect("main");
    }

    function logout() {
        $this->session->unset_userdata('current_user');

        redirect("main");
    }

    function index() {
        $users = $this->users_model->get_users();
        $roles = $this->roles_model->get_role_map();

        $data['users'] = $users;
        $data['roles'] = $roles;
        $this->load->view('users_view', $data);
    }

    function add() {
        $login = $this->input->post('login');
        $password = $this->encrypt_password($this->input->post('password'));
        $name = $this->input->post('name');
        $surname = $this->input->post('surname');
        $email = $this->input->post('email');
        $role_id = $this->input->post('role_id');
        $this->users_model->insert_user($login, $password, $name, $surname, $email, $role_id);
        $this->session->set_flashdata('info', $this->lang->line('ui_user_add'));
        redirect("users");
    }

    function delete() {
        $user_id = $this->input->get('user_id');
        $this->users_model->delete_user($user_id);
        $this->session->set_flashdata('info',  $this->lang->line('ui_user_delete'));
        redirect("users");
    }

    function edit() {
        $user_id = $this->input->post('user_id');
        $name = $this->input->post('name');
        $surname = $this->input->post('surname');
        $email = $this->input->post('email');
        $role_id = $this->input->post('role_id');
        $this->users_model->update_user($user_id, $name, $surname, $email, $role_id);
        $this->session->set_flashdata('info',  $this->lang->line('ui_user_edit'));  
        redirect("users");
    }
    #password encrypt
    private function encrypt_password($decrypted_password) {
        return $this->encrypt->encode($decrypted_password);
    }
    #decrypt password
    private function decrypt_password($encrypted_password) {
        return $this->encrypt->decode($encrypted_password);
    }

}
