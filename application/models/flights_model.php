<?php

class Flights_model extends CI_Model {

function get_dropdown_models()
{
$models = $this->db->query(‘select model from planes’);
$dropdowns = $models->result();
foreach ($dropdowns as $dropdown)
{
$dropdownlist[$dropdown->model] = $dropdown->model;
}
$finaldropdown = $dropdownlist;
return $finaldropdown;
}

}
