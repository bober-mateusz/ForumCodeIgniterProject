<?php
class Admins extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Category_Model');
        $this->load->model('Login_Model');
        $this->load->model('Thread_Model');
        $this->load->library('form_validation');
    }  
    
    function index($page = "Admin")
    {
        
        echo "Index";
        if (($_SESSION['admin'] == 1))
        {
            $data['title'] = $page;
            $data['nav'] = $this ->Navigation_Model ->getNavigation();
            $this->load->view("templates/adminheader",$data);
            $this->load->view("AdminHome",$data);
            $this->load->view("templates/footer");
        }
        else {
            $base_url = base_url();
            redirect("$base_url/logouts");
        }
    }

    function Forums($page = "admin Forum")
    {
        if (($_SESSION['admin'] == 1))
        {
            $data['nav'] = $this ->Navigation_Model ->getNavigation();
            $data['Categories'] = $this->Category_Model->getCategoryNames();
            $data['threads'] = $this->Thread_Model->getThreads();
            $data['title'] = ucfirst($page);
            $this->load->view('templates/adminheader',$data);
            $this->load->view('mainForum.php',$data);
            $this->load->view('templates/footer');
        }
        else {
            $base_url = base_url();
            redirect("$base_url/logouts");
        }
   
    }
    function BanUser($page = "Ban User")
    {
        if (($_SESSION['admin'] == 1))
        {
            $data['error'] = "";
            $this->form_validation->set_rules('UserName', 'Username', array('required', 'min_length[1]'));
            if ($this->form_validation->run() == FALSE)
            {
                
                $data['title'] = $page;
                $data['nav'] = $this ->Navigation_Model ->getNavigation();
                $this->load->view("templates/adminheader",$data);
                $this->load->view("BanUser",$data);
                $this->load->view("templates/footer");
            }
            else
            {
                $username = $this->input->post("UserName");
                $data['title'] = $page;
                $data['nav'] = $this ->Navigation_Model ->getNavigation();
                $data['error'] = $this->Login_Model->BanUser($username);
                $this->load->view("templates/adminheader",$data);
                $this->load->view("BanUser",$data);
                $this->load->view("templates/footer");
    
            }
        }
        else {
            $base_url = base_url();
            redirect("$base_url/logouts");
        }
     
    }
    function UnBanUser($page = "UnBan User")
    {
        if (($_SESSION['admin'] == 1))
        {
            $this->form_validation->set_rules('UserName', 'Username', array('required', 'min_length[1]'));
            $data['error'] = "";
            if ($this->form_validation->run() == FALSE)
            {
                $data['title'] = $page;
                $data['nav'] = $this ->Navigation_Model ->getNavigation();
                $this->load->view("templates/adminheader",$data);
                $this->load->view("UnBanUser",$data);
                $this->load->view("templates/footer");
            }
            else
            {
                $data['title'] = $page;
                $data['nav'] = $this ->Navigation_Model ->getNavigation();
                $username = $this->input->post("UserName");
                $data['error'] = $this->Login_Model->UnBanUser($username);
                $this->load->view("templates/adminheader",$data);
                $this->load->view("UnBanUser",$data);
                $this->load->view("templates/footer");
            }
        }
        else {
            $base_url = base_url();
            redirect("$base_url/logouts");
        }
    }

    function CreateThread($page = "Create Threads")
    {
        $this->form_validation->set_rules('threadName', 'threadName', array('required', 'min_length[1]'));
        $this->form_validation->set_rules('threadDescription', 'threadDescription', array('required', 'min_length[1]'));
        if (($_SESSION['admin'] == 1))
        {
            if ($this->form_validation->run() == FALSE)
            {
                $data['categories'] = $this->Category_Model->getCategories();
                $data['threads'] = $this->Thread_Model->getThreads();
                $data['title'] = $page;
                $data['nav'] = $this ->Navigation_Model ->getNavigation();
                $this->load->view("templates/adminheader",$data);
                $this->load->view("CreateThreads",$data);
                $this->load->view("templates/footer");
            }
            else
            {
                $name =$this->input->post("threadName");
                $description =  $this->input->post("threadDescription");
                $category =  $this->input->post("Category");
                $this->Thread_Model->createThread($name,$description,$category);
                redirect("admins/CreateThread");
            }
            
        }
        else {
            $base_url = base_url();
            redirect("$base_url/logouts");
        }
     
    }


    function CreateCategory($page = "Create Category")
    {
       
        $this->form_validation->set_rules('Category', 'Category', array('required', 'min_length[1]'));
        if (($_SESSION['admin'] == 1))
        {
            if ($this->form_validation->run() == FALSE)
            {
                $data['title'] = $page;
                $data['nav'] = $this ->Navigation_Model ->getNavigation();
                $data['categories'] = array();
                $data['categories'] = $this->Category_Model->getCategories();
                $this->load->view("templates/adminheader",$data);
                $this->load->view("CreateCategory",$data);
                $this->load->view("templates/footer");
            }
            else
            {
                $category = $this->input->post("Category");
                $this->Category_Model->addCategory($category);
                redirect("admins/CreateCategory");
            }
        }
        else 
        {
        $base_url = base_url();
        redirect("$base_url/logouts");
        }
    }


    function RemoveThread($threadID)
    {
        $this->Thread_Model->RemoveThread($threadID);
        redirect("admins/CreateThread");

    }
    function RemoveCategory($categoryID)
    {
        
        $this->Thread_Model->removeThreadsOnCategoryID($categoryID);
        $this->Category_Model->RemoveCategory($categoryID);
        redirect("admins/CreateCategory");
    }
    function LogOuts()
    {
        redirect("LogOuts");
    }



}
