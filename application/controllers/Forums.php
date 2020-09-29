<?php

class Forums extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->helper('url','form');
        $this->load->model('Thread_Model');
        $this->load->model('Category_Model');
    }  
    public function index($page = "Forum")
    {
        $data['nav'] = $this ->Navigation_Model ->getNavigation();
        $data['Categories'] = $this->Category_Model->getCategoryNames();
        $data['threads'] = $this->Thread_Model->getThreads();
        $data['title'] = ucfirst($page);
        $this->load->view('templates/header',$data);
        $this->load->view('mainForum.php',$data);
        $this->load->view('templates/footer');
    }
}
?>