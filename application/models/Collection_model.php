<?php
class Collection_model extends CI_Model{
 
    function __construct()
    {
        parent::__construct();
    }
 
    function get($id){
        $strQuery = "SELECT id, say, trans, say_by FROM collection WHERE id=".$id;
 
        return $this->db->query($strQuery)->result();
    }

    function getMax(){
        $strQuery = "SELECT MAX(id) as max FROM collection";
 
        return $this->db->query($strQuery)->row();
    }
 
}
?>
