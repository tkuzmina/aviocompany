<?php

class Planes_model extends CI_Model {
        function get_plane_map($include_all) {
        $query = $this->db->query("select * from planes");
        $planes = $query->result();
        $plane_map = array();
        if ($include_all) {
            $plane_map[NIL] = "All";//
        }

        foreach($planes as $plane) {
            $plane_map[$plane->id] = $plane->model;
        }
        return $plane_map;
    }


    function get_planes() {
        $query = $this->db->query("select * from planes");
        $planes = $query->result();
        return $planes;
    }

    function insert_plane($model,$seats_economy,$seats_business,$luggage_count){
        $this->db->insert('planes', array("model" => $model,"seats_economy" => $seats_economy,"seats_business" => $seats_business,"luggage_count" => $luggage_count));
    }

    function delete_plane($plane_id) {
        $this->db->delete('planes', array("id" => $plane_id));
    }

    function update_plane($plane_id, $model, $seats_economy, $seats_business, $luggage_count) {
        $this->db->update('planes', array("model" => $model,'seats_economy' => $seats_economy, 'seats_business' => $seats_business, 'luggage_count' => $luggage_count), array('id' => $plane_id));
    }
	
	function get_plane_list() {
        $planes = $this->get_planes();
        $plane_list = array();
        foreach ($planes as $plane){
            $plane_list[$plane->id] = $plane->model;
        }
        return $plane_list;
    }
}
