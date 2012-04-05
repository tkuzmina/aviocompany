<?php

class Users_model extends CI_Model {

    function get_by_id($id) {
        $query = $this->db->query("select * from users where id = ?", array($id));
        $users =  $query->result();
        return count($users) > 0 ? $users[0] : NIL;
    }

    function get_by_login($login) {
        $query = $this->db->query("select * from users where login like ?", array($login));
        $users =  $query->result();
        return count($users) > 0 ? $users[0] : NIL;
    }

    function get_users() {
        $query = $this->db->query("select * from users");
        $users = $query->result();
        return $users;
    }

    function insert_user($login, $password, $email, $role_id) {
        $this->db->insert('users', array("login" => $login, "password" => $password, "email" => $email, "role_id" => $role_id));
    }

    function delete_user($user_id) {
        $this->db->delete('users', array("id" => $user_id));
    }

    function update_user($user_id, $email, $role_id) {
        $this->db->update('users', array("email" => $email, "role_id" => $role_id), array('id' => $user_id));
    }
}
