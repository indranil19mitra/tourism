<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mycontroller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('myfront_model');
    }

    public function index()
    {
        // echo "<pre>";
        // $data = array();
        $cond1 = array(
            'tours.is_delete!=' => '0',
            'tours.status!=' => '0',
            'tours.tour_category_id' => 1,
            'tour_category.is_delete!=' => '0',
            'tour_category.status!=' => '0',
        );
        $cond2 = array(
            'tours.is_delete!=' => '0',
            'tours.status!=' => '0',
            'tours.tour_category_id' => 2,
            'tour_category.is_delete!=' => '0',
            'tour_category.status!=' => '0',
        );
        $cond3 = array(
            'tours.is_delete!=' => '0',
            'tours.status!=' => '0',
            'tours.tour_category_id' => 3,
            'tour_category.is_delete!=' => '0',
            'tour_category.status!=' => '0',
        );
        $join = array('table' => 'tour_category', 'condition' => 'tour_category.id=tours.tour_category_id');

        $data['weekend_trip'] = $this->myfront_model->get_data("tours.id,tours.name", "tours", $cond1, [$join], "", "desc", "tours.id");
        $data['popular_trip'] = $this->myfront_model->get_data("tours.id,tours.name", "tours", $cond2, [$join], "", "desc", "tours.id");
        $data['adv_thrill_trip'] = $this->myfront_model->get_data("tours.id,tours.name", "tours", $cond3, [$join], "", "desc", "tours.id");

        $cond4 = array(
            'is_delete!=' => '0',
            'status!=' => '0',
        );
        $data['get_tours_dates'] = $this->myfront_model->get_data("start_date", "tour_details", $cond4, "", "", "asc", "start_date", "start_date", "10");
        // print_r($data);
        // exit;
        $this->load->view('include/header', $data);
        $this->load->view('index', $data);
        $this->load->view('include/footer', $data);
    }


    public function aboutUs()
    {
        $this->load->view('include/header');
        $this->load->view('about_us');
        $this->load->view('include/footer');
    }


    public function details()
    {
        $this->load->view('include/header');
        $this->load->view('details');
        $this->load->view('include/footer');
    }
}
