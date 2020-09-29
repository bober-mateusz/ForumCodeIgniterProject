<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mains extends CI_Controller {

    public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
        }

    public function index($page = "GameBit")
	{   
        $data['nav'] = $this ->Navigation_Model ->getNavigation();
        $data['title'] = ucfirst($page);
        $this->load->view('templates/headerLanding',$data);
        $this->load->view('Landing.php');
        $this->load->view('templates/footer');
   
    }



}
