<?php
class Comments_model extends CI_Model{
 
    function __construct()
    {
        parent::__construct();
    }
 
    function getComments($says_id){
        $strQuery = "SELECT co_id, re_id, nickname, postdate, comment, liker FROM comments WHERE says_id=".$says_id;
 
        return $this->db->query($strQuery)->result();
    }

    function getRecomments($says_id, $co_id) {
        $strQuery = "SELECT co_id, re_id, nickname, postdate, comment, liker FROM comments WHERE says_id=".$says_id." AND re_id = ".$co_id;

        return $this->db->query($strQuery)->result();
    }

    function likeComment($index) {
        $strQuery = "UPDATE comments SET liker = liker+1 WHERE co_id=".$index;
        $this->db->query($strQuery);
            
        $strQuery = "SELECT liker FROM comments WHERE co_id=".$index;    
        return $this->db->query($strQuery)->row();
    }
    
    public function addComment($index, $re_id, $userID, $nickname, $comment) {
        if ($re_id === 0)
            $strQuery = "INSERT INTO comments (says_id, uid, nickname, comment) VALUES ('".$index."', '".$userID."', '".$nickname."', '".$comment."')";
        else 
            $strQuery = "INSERT INTO comments (says_id, re_id, uid, nickname, comment) VALUES ('".$index."', '".$re_id."', '".$userID."', '".$nickname."', '".$comment."')";
        return $this->db->query($strQuery);
    }
}
?>
