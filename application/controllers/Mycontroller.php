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
        $data = $this->nav_tour_details();

        $cond4 = array(
            'is_delete!=' => '0',
            'status!=' => '0',
            'start_date >=' => date('Y-m-d')
        );

        $data['get_tours_dates'] = $this->myfront_model->get_data("start_date, DATE_FORMAT(start_date, '%Y-%m') AS formatted_date", "tour_details", $cond4, "", "", "asc", "formatted_date", "formatted_date", "12");

        if (!empty($this->input->get('dts'))) {
            $cond5 = array(
                'tour_details.is_delete!=' => '0',
                'tour_details.status!=' => '0',
                'DATE_FORMAT(tour_details.start_date,"%Y-%m")' => date('Y-m', strtotime($this->input->get('dts'))),
                'tour_details.start_date >=' => date('Y-m-d'),
                'tours.is_delete!=' => '0',
                'tours.status!=' => '0',
            );
        } else {
            $cond5 = array(
                'tour_details.is_delete!=' => '0',
                'tour_details.status!=' => '0',
                'tour_details.start_date >=' => date('Y-m-d'),
                'tours.is_delete!=' => '0',
                'tours.status!=' => '0',
            );
        }
        $join3 = array('table' => 'tours', 'condition' => 'tours.id=tour_details.tours_id');
        $data['get_tours_date_wise'] = $this->myfront_model->get_data("tours.name,tours.main_image,tour_details.id as tour_details_id,tour_details.duration,tour_details.start_date,tour_details.price", "tour_details", $cond5, [$join3], "", "asc", "tour_details.start_date", "", "");
        // print_r($data);
        // exit;
        $this->load->view('include/header', $data);
        $this->load->view('index', $data);
        $this->load->view('include/footer', $data);
    }


    public function aboutUs()
    {
        $data = array();
        $data = $this->nav_tour_details();
        $this->load->view('include/header', $data);
        $this->load->view('about_us', $data);
        $this->load->view('include/footer', $data);
    }


    public function details()
    {
        $data = array();
        $data = $this->nav_tour_details();
        $ids = $this->input->get('ids');
        // echo "ids=> " . $ids;
        // exit;

        $cond = array(
            'tour_details.id' => $ids
        );
        // $join = array('table' => 'tours', 'condition' => 'tours.id=tour_details.tours_id');

        $data['get_tours_details'] = $this->myfront_model->get_data("tour_details.id as tour_details_id,tour_details.duration,tour_details.start_date,tour_details.price,tour_details.pikup_location,tour_details.drop_location", "tour_details", $cond, "", "1");

        $this->load->view('include/header', $data);
        $this->load->view('details', $data);
        $this->load->view('include/footer', $data);
    }

    public function nav_tour_details()
    {
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

        $join1 = array('table' => 'tour_category', 'condition' => 'tour_category.id=tours.tour_category_id');
        $join2 = array('table' => 'tour_details', 'condition' => 'tours.id=tour_details.tours_id');
        $join = [$join1, $join2];

        $data['weekend_trip'] = $this->myfront_model->get_data("tours.id,tours.name,tour_details.id as tour_details_id", "tours", $cond1, $join, "", "desc", "tours.id");
        $data['popular_trip'] = $this->myfront_model->get_data("tours.id,tours.name,tour_details.id as tour_details_id", "tours", $cond2, $join, "", "desc", "tours.id");
        $data['adv_thrill_trip'] = $this->myfront_model->get_data("tours.id,tours.name,tour_details.id as tour_details_id", "tours", $cond3, $join, "", "desc", "tours.id");

        return $data;
    }
}
