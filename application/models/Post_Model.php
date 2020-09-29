<?php
class Post_Model extends CI_Model {
    public function getPosts($threadID,$offset)
    {
        $query = 'CALL get_Posts('.$threadID.','.$offset.')';
        $result = $this->db->query($query);
        $posts = $result->result();
        return $posts; 
    }

    public function createPost($postName,$postdesc,$threadID,$userID)
    {
        $data = '"'.$postName.'"'.','.'"'.$postdesc.'"'.','.$threadID.','.$userID;
        $query = "CALL createPost($data)";
        $result = $this->db->query($query);
    }

    public function getPostCount()
    {
        $query = 'SELECT COUNT(posts.postID) as Count FROM posts;';
        $result = $this->db->query($query);
        $posts = $result->first_row();
        print_r($posts);
        $count = (int)$posts->Count;
        return $count;
    }

    public function getPost($postID)
    {
        $query = "SELECT * FROM posts where posts.postID =$postID";
        $result = $this->db->query($query);
        $posts = $result->first_row();
        return $posts;
    }



    }
    


?>
