<?php

class Roles_model extends CI_Model {

    function get_role_map() {
        $query = $this->db->query("select * from roles");
        $roles = $query->result();
        $role_map = array();
        foreach($roles as $role) {
            $role_map[$role->id] = $role->name;
        }
        return $role_map;
    }
}