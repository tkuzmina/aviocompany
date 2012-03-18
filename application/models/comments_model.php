<?php

class Comments_model extends CI_Model {

    function get_comments($news_id) {
        $query = $this->db->query("select * from comments where news_id = ?", array($news_id));
        return $query->result();
    }

    function load_comment_count($news) {
        foreach($news) {
            $news_id = $news->id;
            $query = $this->db->query("select count(*) as count_rows from comments where news_id = ?", array($news_id));
            $result = $query->result();
            $news->comment_count = $result[0]->count_rows;
        }
    }

    function load_comments($news_id) {
        $sql = "select c.*, u.login as user_login
                where c.news_id = ? and c.user_id = u.id order by c.created_date desc";
        $query = $this->db->query($sql, array($event_id));
        $comments = $query->result();
        return $comments;
    }

    function insert_comment($text, $news_id, $user_id) {
        $created_date = date("Y-m-d H:i:s");
        $this->db->insert('comments', array("text" => $text, "news_id" => $news_id, "user_id" => $user_id, "created_date" => $created_date));
    }

    function delete_comment($comment_id) {
        if ($comment_id) {
            $this->db->delete('comments', array("id" => $comment_id));
        }
    }
}
