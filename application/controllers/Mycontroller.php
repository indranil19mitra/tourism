<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mycontroller extends CI_Controller
{
    public function index()
    {
        $this->load->view('include/header');
        $this->load->view('index');
        $this->load->view('include/footer');
    }


    public function aboutUs()
    {
        $this->load->view('include/header');
        $this->load->view('about_us');
        $this->load->view('include/footer');
    }
}
