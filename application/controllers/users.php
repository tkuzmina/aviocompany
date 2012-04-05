<?php

class Users extends CI_Controller {

    function Users() {
        parent::__construct();

        $this->load->library(array('encrypt', 'form_validation', 'session'));
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->model(array('users_model', 'roles_model'));
    }

    function login() {
        $login = $this->input->post('login');
        $password = $this->input->post('password');

        $user = $this->users_model->get_by_login($login);
        if ($user) {
            if ($password == $this->decrypt_password($user->password)) {
                $this->session->set_userdata('current_user', $user);
            } else {
                $this->session->set_flashdata('message', 'Incorrect password.');
            }
        } else {
            $this->session->set_flashdata('message', 'User does not exist.');
        }

        redirect_back($this->session);
    }

    function logout() {
        $this->session->unset_userdata('current_user');

        redirect_back($this->session);
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
        $email = $this->input->post('email');
        $role_id = $this->input->post('role_id');
        $this->users_model->insert_user($login, $password, $email, $role_id);

        redirect_back('users');
    }

    function delete() {
        $user_id = $this->input->get('user_id');
        $this->users_model->delete_user($user_id);

        redirect_back($this->session);
    }

    function edit() {
        $user_id = $this->input->post('user_id');
        $email = $this->input->post('email');
        $role_id = $this->input->post('role_id');
        $this->users_model->update_user($user_id, $email, $role_id);

        redirect_back('users');
    }

    function register() {
        $this->load->view('register_view');
    }

    function do_register() {
        $login = $this->input->post('login');
        $password = $this->encrypt_password($this->input->post('password'));
        $email = $this->input->post('email');
        $role_id = 1; // user
        $this->users_model->insert_user($login, $password, $email, $role_id);

        $this->session->set_flashdata('message', 'Registration successful!');
        redirect('users');
    }

}
