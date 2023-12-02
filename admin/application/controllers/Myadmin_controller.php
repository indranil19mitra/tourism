<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Myadmin_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('myadmin_model');
    }

    public function index()
    {
        if (empty($this->session->userdata('user_id'))) {
            redirect(base_url('login'));
        }
        $this->load->view('include/header');
        $this->load->view('home/index');
        $this->load->view('include/footer');
    }

    public function login()
    {
        $this->load->view('login');
        // exit;
    }

    public function auth_login()
    {
        echo "<pre>";
        if (!empty($this->input->post('username')) && !empty($this->input->post('password'))) {
            $cond = array(
                'user_name' => $this->input->post('username'),
                'pswd' => md5($this->input->post('password'))
            );

            $join = array('table' => 'users', 'condition' => 'users.id = user_auth.user_id');

            $result = $this->myadmin_model->get_data('', 'user_auth', $cond, $join, "single");

            $rslt = array('status' => '101', 'msg' => '', 'result' => $result);
            // print_r($result);
            $session_array = array(
                'user_id' => $result->user_id()
            );

            
        } else {
            $rslt = array('status' => '103', 'msg' => 'Please fill all details correctly!!', 'result' => '');
        }
        echo json_encode($rslt);
    }
}
