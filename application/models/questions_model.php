<?php

class Questions_model extends CI_Model {

    function get_questions() {
        $query = $this->db->query("select * from questions order by created_date desc");
        $questions = $query->result();
        return $questions;
    }

    function insert_question($name, $email, $text){
        $created_date = date("Y-m-d H:i:s");
        $this->db->insert('questions', array("name" => $name, "email" => $email, "text" => $text, "created_date" => $created_date));
    }

    function delete_question($question_id) {
        $this->db->delete('questions', array("id" => $question_id));
    }
}
