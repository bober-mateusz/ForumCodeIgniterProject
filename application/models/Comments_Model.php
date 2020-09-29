<?php
class Comments_Model extends CI_Model {

public function createComment($content,$userID,$postID)
{
    $data = '"'.$content.'"'.','.$userID.','.$postID;
    $query = "CALL CreateComment($data)";
    $result = $this->db->query($query);

}


public function getComments($postID)
{
    $query = "SELECT *
    FROM comment
    INNER JOIN users
    ON comment.users_userID = users.userID
    WHERE comment.posts_postID = $postID;";
    $result = $this->db->query($query);
    $comments = $result->result();
        return $comments;

}



}

?>