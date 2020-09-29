<?php
class Registrations extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('Registration_Model');
    }

public function index($page = "Registration")
{   
    $data['nav'] = $this ->Navigation_Model ->getNavigation();
    //Display errors text-danger bootstrap
    $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
    //Check username if its unqiue and min length and max length
    $this->form_validation->set_rules('UserName', 'Username', 'trim|required|min_length[4]|max_length[60]|is_unique[users.UserName]',
    array(
        'required'      => 'You have not provided %s.',
        'is_unique'     => 'This %s already exists.'
        )
    );
    //Min Length is 8
    $this->form_validation->set_rules('Password1', 'Password', 'trim|required|min_length[8]');
 
    $this->form_validation->set_rules('Password2', 'Password Confirmation', 'trim|required|matches[Password1]',
    array(
        'required' => 'You have not provided %s',
        'matches' => 'The confirmation Password does not match the First Password'
    )
);
    $this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email|is_unique[users.Email]',
    array(
        'required'      => 'You have not provided %s.',
        'is_unique'     => 'This %s already exists.'
        )
    );
    $data['title'] = ucfirst($page);
    if($page == 'Registration')
    {
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header',$data);
            $this->load->view('Registration');
            $this->load->view('templates/footer');
        }
        else
        {
            $this->load->view('templates/header',$data);
            $this->load->view('RegistrationSucess');
            $this->load->view('templates/footer');
            $userName = $this->input->post('UserName');
            $password = $this->input->post('Password1');
            $email = $this->input->post('Email');
            $this->Registration_Model->AddUser($userName,$password,$email);
        }
    }
}
}
?>