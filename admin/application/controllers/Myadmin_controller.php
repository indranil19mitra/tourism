<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Myadmin_controller extends CI_Controller
{
    public function index()
    {
        $this->load->view('include/header');
        $this->load->view('index');
        $this->load->view('include/footer');
    }
}
