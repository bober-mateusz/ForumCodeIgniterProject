<?php

class Logouts extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $_SESSION = array();
        redirect(base_url());
    }
}


    ?>