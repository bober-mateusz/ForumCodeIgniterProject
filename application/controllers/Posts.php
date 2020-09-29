<?php

class Posts extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation','pagination'));
        $this->load->Model("Navigation_Model");
        $this->load->Model("Post_Model");
    
    }

public function index($threadID,$pageid = 0)
{  
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<a href="http://localhost/K00241665_CodeIgniter/Posts/'.$threadID.'/0'.'"'.'>';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
    $postCount = $this->Post_Model->getPostCount();
    
    $config['uri_segment'] = 4;
    $config['base_url'] = 'http://localhost/K00241665_CodeIgniter/Posts/'.$threadID;
    $config['total_rows'] = $postCount;
    $config['per_page'] = 10;
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $data['posts'] = $this->Post_Model->getPosts($threadID,$page);
    $this->pagination->initialize($config);
    $page = "Posts";
    $data['threadID'] = $threadID;
    $data['nav'] = $this ->Navigation_Model ->getNavigation();
    $data['title'] = ucfirst($page);
    $this->load->view('templates/header',$data);
    $this->load->view('mainPosts.php',$data);
    $this->load->view('templates/footer');
}
public function submitPost($threadID){
        
        $this->form_validation->set_rules('postName', 'postName', 'required|min_length[1]');
        $this->form_validation->set_rules('PostDescription','postDescription','required|min_length[1]' );

        if (isset($_SESSION['ID']))
        {
        if ($this->form_validation->run() == FALSE)
        {
            $page = "Submit Post";
            $data['threadID'] = $threadID;
            $data['nav'] = $this ->Navigation_Model ->getNavigation();
            $data['title'] = ucfirst($page);
            $this->load->view('templates/header',$data);
            $this->load->view('SubmitPost',$data);
            $this->load->view('templates/footer');
        }
        else
        {
            $postName = $this->input->post('postName');
            $postDescription = $this->input->post('PostDescription');
            $page = "Submit Post";
            $this->Post_Model->createPost($postName,$postDescription,$threadID,$_SESSION['ID']);
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