<?php

class Comments extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url','form');
        $this->load->model('Thread_Model');
        $this->load->model('Comments_Model');
        $this->load->model("Login_Model");
        $this->load->model("Post_Model");
    }  
    public function index($postID)
    {
        $data['post'] = $this->Post_Model->getPost($postID);
        $data['user'] = $this->Login_Model->getUserdata($data['post']->Users_userID);
        $data['comments'] = $this->Comments_Model->getComments($postID);
        $page = "Comments";
        $data['nav'] = $this ->Navigation_Model ->getNavigation();
        $data['title'] = ucfirst($page);
        $this->load->view('templates/header',$data);
        $this->load->view('Comments.php',$data);
        $this->load->view('templates/footer');
    }
    public function submitComment($postID){
        
        $this->form_validation->set_rules('comment', 'comment', 'required');

        if (isset($_SESSION['ID']))
        {
        if ($this->form_validation->run() == FALSE)
        {
            $page = "Submit Post";
            $data['postID'] = $postID;
            $data['nav'] = $this ->Navigation_Model ->getNavigation();
            $data['title'] = ucfirst($page);
            $this->load->view('templates/header',$data);
            $this->load->view('CreateComment',$data);
            $this->load->view('templates/footer');
        }
        else
        {
            $comment = $this->input->post('comment');
            $page = "Submit Post";
            $this->Comments_Model->createComment($comment,$_SESSION['ID'],$postID);
            $data['nav'] = $this ->Navigation_Model ->getNavigation();
            $data['title'] = ucfirst($page);
            $this->load->view('templates/header',$data);
            $this->load->view('PostSuccess');
            $this->load->view('templates/footer');
        }
    }
    else 
    {
            $page = "Submit Post";
            $data['nav'] = $this ->Navigation_Model ->getNavigation();
            $data['title'] = ucfirst($page);
            $this->load->view('templates/header',$data);
            $this->load->view('PostFailed');
            $this->load->view('templates/footer');
    }



    }
}
?>
}
?>