<?php
class Userlike_model extends CI_Model{
 
    function __construct()
    {
        parent::__construct();
    }
 
    function get($user_id, $coll_id){
        $strQuery = "SELECT ISNULL(user_id) FROM user_like WHERE user_id=".$user_id." AND coll_id=".$coll_id;
 
        return $this->db->query($strQuery)->row();
    }

    function getAll($user_id){
        $strQuery = "SELECT coll_id FROM user_like WHERE user_id=".$user_id;
 
        return $this->db->query($strQuery)->result();
    }

    function put($user_id, $coll_id){
        $strQuery = "INSERT INTO user_like (user_id, coll_id) VALUES(".$user_id.",".$coll_id.")";
 
        $this->db->query($strQuery);
    }

    function del($user_id, $coll_id) {
        $strQuery = "DELETE FROM user_like WHERE user_id=".$user_id." AND coll_id=".$coll_id;
 
        $this->db->query($strQuery);
    }
 
}
?>
