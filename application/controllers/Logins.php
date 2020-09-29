<?php
class Logins extends CI_Controller {
public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->Model('Login_Model');
    }

    public function index($page = "Login")
	{   
        $data['nav'] = $this ->Navigation_Model ->getNavigation();
        $data['title'] = ucfirst($page);
        $data['error'] = "";
        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
        $this->form_validation->set_rules('UserName', 'Username', 'required');
        $this->form_validation->set_rules('Password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header',$data);
            $this->load->view('Login',$data);
            $this->load->view('templates/footer');
        }
        else
        {
            $password = $this->input->post("Password");
            $username = $this->input->post("UserName");
            if ($this->Login_Model->verifyLogin($username,$password) == True && $_SESSION['admin'] == 1)
            {  
                //Redirect to admins page and controller
                $base_url = base_url()."admins";
                redirect("$base_url");
            }
            elseif($this->Login_Model->verifyLogin($username,$password) == True && $_SESSION["bannedStatus"] == 1 )
            {
                $data['error'] = '<p class="text-danger"> Sorry this user has been banned from the Website, Please contact us For further information</p>';
                $_SESSION = array();
                $this->load->view('templates/header',$data);
                $this->load->view('Login',$data);
                $this->load->view('templates/footer');
            }
            elseif ($this->Login_Model->verifyLogin($username,$password) == True && $_SESSION['admin'] == 0)
            {
                $this->load->view('templates/header',$data);
                $this->load->view('LoginSuccess',$data);
                $this->load->view('templates/footer');
            }
            else
            {
                $data['error'] = '<p class="text-danger"> Username or Password is Incorrect please try again (Login is case Sensitive) </p>';
                $this->load->view('templates/header',$data);
                $this->load->view('Login',$data);
                $this->load->view('templates/footer');
            }
        }
    }
}