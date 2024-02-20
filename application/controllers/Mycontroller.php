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
        $join = array('table' => 'tours', 'condition' => 'tours.id=tour_details.tours_id');
        $join1 = array('table' => 'tours', 'condition' => 'tours.id=tour_details.tours_id AND tours.tour_category_id=1');
        $join2 = array('table' => 'tours', 'condition' => 'tours.id=tour_details.tours_id AND tours.tour_category_id=2');
        $join3 = array('table' => 'tours', 'condition' => 'tours.id=tour_details.tours_id AND tours.tour_category_id=3');

        $data['get_tours_date_wise'] = $this->myfront_model->get_data("tours.name,tours.main_image,tours.seat_availability,tour_details.id as tour_details_id,tour_details.duration,tour_details.start_date,tour_details.price", "tour_details", $cond5, [$join], "", "asc", "tour_details.start_date", "", "");

        $data['get_tours_weekend_trip'] = $this->myfront_model->get_data("tours.name,tours.main_image,tours.seat_availability,tour_details.id as tour_details_id,tour_details.duration,tour_details.start_date,tour_details.price", "tour_details", $cond5, [$join1], "", "asc", "tour_details.start_date", "", "");

        $data['get_tours_popular_trip'] = $this->myfront_model->get_data("tours.name,tours.main_image,tours.seat_availability,tour_details.id as tour_details_id,tour_details.duration,tour_details.start_date,tour_details.price", "tour_details", $cond5, [$join2], "", "asc", "tour_details.start_date", "", "");

        $data['get_tours_adv_trip'] = $this->myfront_model->get_data("tours.name,tours.main_image,tours.seat_availability,tour_details.id as tour_details_id,tour_details.duration,tour_details.start_date,tour_details.price", "tour_details", $cond5, [$join3], "", "asc", "tour_details.start_date", "", "");
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
        // echo "<pre>";
        $data = array();
        $data = $this->nav_tour_details();
        $ids = $this->input->get('ids');
        // echo "ids=> " . $ids;
        // exit;

        $cond = array(
            'tour_details.id' => $ids
        );
        $join1 = array('table' => 'tours', 'condition' => 'tours.id=tour_details.tours_id', 'type' => 'left');
        $join2 = array('table' => 'tour_about', 'condition' => 'tour_about.tours_id=tour_details.tours_id', 'type' => 'left');
        $join3 = array('table' => 'tour_itinerary_main', 'condition' => 'tour_itinerary_main.tours_id=tours.id AND tour_itinerary_main.status="1"', 'type' => 'left');
        $join4 = array('table' => 'tour_itinerary_sub', 'condition' => 'tour_itinerary_sub.itinery_main_id=tour_itinerary_main.id AND tour_itinerary_sub.status="1"', 'type' => 'left');
        $join5 = array('table' => 'tour_inclusions_exclusions', 'condition' => 'tour_inclusions_exclusions.tours_id=tour_details.tours_id AND tour_inclusions_exclusions.status="1"', 'type' => 'left');
        $join6 = array('table' => 'tour_other_info', 'condition' => 'tour_other_info.tours_id=tour_details.tours_id AND tour_other_info.status="1"', 'type' => 'left');

        $join = [$join1, $join2, $join3, $join4, $join5, $join6];

        $data['get_tours_details'] = $this->myfront_model->get_data("tour_details.id as tour_details_id,tour_details.tours_id,tour_details.duration,tour_details.start_date,tour_details.price,tour_details.pikup_location,tour_details.drop_location,tours.difficulty,tours.tour_category_id,tour_about.tour_about_details,GROUP_CONCAT(tour_itinerary_main.sequence,'##') as itinerary_sequence,GROUP_CONCAT(tour_itinerary_main.itinerary,'##') as itinerary,GROUP_CONCAT(tour_itinerary_sub.itinerary_sub,'##') as itinerary_sub,tour_inclusions_exclusions.inclusions,tour_inclusions_exclusions.exclusions,tour_other_info.other_info", "tour_details", $cond, $join, "1");
        // exit;

        $cond1 = array(
            'tour_details.tours_id!=' => $data['get_tours_details']->tours_id,
            'tour_details.is_delete!=' => '0',
            'tour_details.status!=' => '0',
            'tour_details.start_date >=' => date('Y-m-d'),
            'tours.is_delete!=' => '0',
            'tours.status!=' => '0',
            'tours.tour_category_id' => $data['get_tours_details']->tour_category_id,
        );


        $join7 = array('table' => 'tour_category', 'condition' => 'tour_category.id=tours.tour_category_id', 'type' => 'left');
        $join8 = [$join1, $join7];

        $get_tours_category_wise = $this->myfront_model->get_data("tours.name,tours.main_image,tours.seat_availability,tours.tour_category_id,tour_details.id as tour_details_id,tour_details.duration,tour_details.start_date,tour_details.price,DATE_FORMAT(tour_details.start_date,'%d %b') as tour_calendar_days", "tour_details", $cond1, $join8, "", "asc", "tour_details.start_date", "tour_details.tours_id", "");

        foreach ($get_tours_category_wise as $key => $val) {
            $data['get_tours_category_wise_data'][$key]['name'] = $val->name;
            $data['get_tours_category_wise_data'][$key]['main_image'] = $val->main_image;
            $data['get_tours_category_wise_data'][$key]['seat_availability'] = $val->seat_availability;
            $data['get_tours_category_wise_data'][$key]['tour_details_id'] = $val->tour_details_id;
            $data['get_tours_category_wise_data'][$key]['duration'] = $val->duration;
            $data['get_tours_category_wise_data'][$key]['start_date'] = $val->start_date;
            $data['get_tours_category_wise_data'][$key]['price'] = $val->price;
            $data['get_tours_category_wise_data'][$key]['tour_calendar_days'] = $val->tour_calendar_days;
            $data['get_tours_category_wise_data'][$key]['tour_category_id'] = $val->tour_category_id;
        }

        // print_r($data['get_tours_category_wise_data']);
        // print_r($data['get_tours_details']);
        // exit;


        $join7 = array('table' => 'tour_photos', 'condition' => 'tour_photos.tours_id=tours.id AND tour_photos.status="1" AND tour_photos.is_delete="1"', 'type' => 'left');
        $join8 = [$join1, $join7];

        $data['tour_photos'] = $this->myfront_model->get_data("GROUP_CONCAT(tour_photos.tour_photo) as tour_photo", "tour_details", $cond, $join8, "1");

        $cond2 = array(
            'is_delete!=' => '0',
            'status!=' => '0'
        );

        $data['country_codes'] = $this->myfront_model->get_data("", "country_code", $cond2);

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

        $data['weekend_trip'] = $this->myfront_model->get_data("tours.id,tours.name,tour_details.id as tour_details_id", "tours", $cond1, $join, "", "desc", "tours.id", "tours.id");
        $data['popular_trip'] = $this->myfront_model->get_data("tours.id,tours.name,tour_details.id as tour_details_id", "tours", $cond2, $join, "", "desc", "tours.id", "tours.id");
        $data['adv_thrill_trip'] = $this->myfront_model->get_data("tours.id,tours.name,tour_details.id as tour_details_id", "tours", $cond3, $join, "", "desc", "tours.id", "tours.id");

        return $data;
    }

    public function get_months_tour_wise()
    {
        $tour_details_id = $this->input->post('tour_details_id');
        $tour_ids = $this->input->post('tour_ids');

        $cond = array(
            'tour_details.is_delete!=' => '0',
            'tour_details.status!=' => '0',
            'tour_details.tours_id' => $tour_ids,
            'start_date >=' => date('Y-m-d')
        );

        $data['get_tour_schduled_month'] = $this->myfront_model->get_data("tour_details.id as tour_details_id,tour_details.start_date, DATE_FORMAT(tour_details.start_date, '%Y-%m') AS formatted_date,tour_details.tours_id", "tour_details", $cond, "", "", "asc", "formatted_date", "formatted_date", "6");

        if (!empty($data)) {
            $rslt = array('status' => '101', 'msg' => 'Get Months', 'data' => $data);
        } else {
            $rslt = array('status' => '103', 'msg' => 'Not Get Months', 'data' => '');
        }

        echo json_encode($rslt);
    }

    public function get_dates_tour_month_wise()
    {
        $tour_ids = $this->input->post('tour_ids');
        $tour_details_id = $this->input->post('tour_details_id');
        $start_dates = $this->input->post('start_dates');

        $cond = array(
            'tour_details.is_delete!=' => '0',
            'tour_details.status!=' => '0',
            'tour_details.tours_id' => $tour_ids,
            'DATE_FORMAT(tour_details.start_date,"%Y-%m")' => date('Y-m', strtotime($start_dates)),
            'start_date >=' => date('Y-m-d')
        );

        $data['get_tour_schduled_month'] = $this->myfront_model->get_data("tour_details.id as tour_details_id,concat(tour_details.start_date,' - ',tour_details.end_date) AS formatted_date,tour_details.start_date,tour_details.end_date,tour_details.tours_id,tour_details.price", "tour_details", $cond, "", "", "asc", "tour_details.start_date", "tour_details.start_date,tour_details.end_date");

        if (!empty($data)) {
            $rslt = array('status' => '101', 'msg' => 'Get Dates', 'data' => $data);
        } else {
            $rslt = array('status' => '103', 'msg' => 'Not Get Dates', 'data' => '');
        }

        echo json_encode($rslt);
    }

    public function get_months_wise_tour_price()
    {
        $tour_details_id = $this->input->post('tour_details_id');
        $tours_id = $this->input->post('tours_id');
        $cond = array(
            'tour_details.id' => $tour_details_id,
            'tour_details.is_delete!=' => '0',
            'tour_details.status!=' => '0'
        );
        $join = array('table' => 'tours', 'condition' => 'tour_details.tours_id=tours.id');
        $get_details = $this->myfront_model->get_data("tour_details.price,tour_details.duration,tour_details.start_date,tour_details.end_date,tours.name", "tour_details", $cond, [$join], "1");
        // echo "<pre>";
        // print_r($get_details);
        $data['name'] = $get_details->name;
        $data['tout_price'] = $get_details->price;
        $data['duration'] = $get_details->duration;
        $data['tour_total_days'] = str_replace("D", "", (explode('/', $get_details->duration)[1]));
        $data['tour_exact_duration'] = str_replace("/", " - ", $get_details->duration);
        $data['start_date'] = $this->date_modification($get_details->start_date);
        $data['end_date'] = $this->date_modification($get_details->end_date);

        // print_r($data);
        // exit;

        if (!empty($get_details)) {
            $rslt = array('status' => '101', 'msg' => 'Get price', 'data' => $data);
        } else {
            $rslt = array('status' => '103', 'msg' => 'Not Get price', 'data' => '');
        }

        echo json_encode($rslt);
    }

    function date_modification($get_date)
    {
        $date = strtotime($get_date);
        $formatted_end_date = date('D, j M, Y', $date);

        return $formatted_end_date;
    }

    public function add_booking_details_bknd()
    {
        $tour_booking_info = array(
            'tours_details_id' => $this->input->post('booking_details_ids'),
            'cust_name' => $this->input->post('name'),
            'cust_contact' => $this->input->post('contact_no'),
            'cust_mail' => $this->input->post('email'),
            'cust_addr' => $this->input->post('address'),
            'nmbr_of_person' => $this->input->post('booking_member_count_1'),
            'booking_date_time' => date('Y-m-d H:i:s'),
            'booking_amount_without_gst' => $this->input->post('ttl_amount_of_booking_without_gst_1'),
            'booking_amount_with_gst' => $this->input->post('ttl_amount_of_booking_with_gst_1'),
            'booking_gst_amount' => $this->input->post('ttl_cost_of_booking_gst_amount_1'),
            'booking_status' => '1',
            'status' => '1'
        );

        // print_r($tour_booking_info);
        // exit;
        $last_inst_id = $this->myfront_model->insert_data("tour_booking_details", $tour_booking_info);
        $msg = 'You have booked successfully..<br>We will connect with you soon..!';


        if (!empty($last_inst_id)) {
            $rslt = array('status' => '101', 'msg' => $msg, 'data' => $last_inst_id);
        } else {
            $rslt = array('status' => '103', 'msg' => 'Something went wrong!', 'data' => '');
        }

        echo json_encode($rslt);
    }


    public function add_get_in_touch_details_bknd()
    {
        // echo "<pre>";
        // print_r($_POST);
        // exit;
        // $edit_id = (!empty($this->input->post('eid'))) ? $this->input->post('eid') : '';

        $tour_get_in_touch = array(
            'git_cust_name' => $this->input->post('name_1'),
            'country_id' => $this->input->post('country_code_1'),
            'git_cust_contact' => $this->input->post('contact_no_1'),
            'git_cust_email' => $this->input->post('email_1'),
            'git_cust_destination' => $this->input->post('preferred_destination_1'),
            'query_time' => date('Y-m-d H:i:s'),
            'query_status' => '1',
            'status' => '1'
        );

        // print_r($tour_get_in_touch);
        // exit;
        $last_inst_id = $this->myfront_model->insert_data("get_in_touch", $tour_get_in_touch);
        $msg = 'Thank You..<br>We will connect with you soon..!';

        if (!empty($last_inst_id)) {
            $rslt = array('status' => '101', 'msg' => $msg, 'data' => $last_inst_id);
        } else {
            $rslt = array('status' => '103', 'msg' => 'Something went wrong!', 'data' => '');
        }

        echo json_encode($rslt);
    }

    public function getDestinations()
    {
        // echo "<pre>";
        // print_r($_POST);
        $serching_data = $this->input->post('serching_data');
        $cond = array(
            'tour_details.is_delete!=' => '0',
            'tour_details.status!=' => '0',
            'tour_details.start_date >=' => date('Y-m-d'),
            'tours.is_delete!=' => '0',
            'tours.status!=' => '0',
        );
        $serch_field_array = array(
            "0" => "tours.name"
        );
        $join = array('table' => 'tour_details', 'condition' => 'tour_details.tours_id=tours.id', 'left');
        $destinations = $this->myfront_model->get_data("tours.name,tour_details.id as tour_details_id,tour_details.start_date", "tours", $cond, [$join], "", "asc", "tour_details.start_date", "tour_details.tours_id", "", "", "", $serching_data, $serch_field_array);
        if (!empty($destinations)) {
            $rslt = array('status' => '101', 'data' => $destinations);
        } else {
            $rslt = array('status' => '103', 'data' => '');
        }

        // print_r($rslt);
        // exit;

        echo json_encode($rslt);
    }

    public function dta_on_selection()
    {
        // echo "<pre>";
        // print_r($_POST);
        // exit;

        if (!empty($this->input->post('dts'))) {
            $cond5 = array(
                'tour_details.is_delete!=' => '0',
                'tour_details.status!=' => '0',
                'DATE_FORMAT(tour_details.start_date,"%Y-%m")' => date('Y-m', strtotime($this->input->post('dts'))),
                'tour_details.start_date >=' => date('Y-m-d'),
                'tours.is_delete!=' => '0',
                'tours.status!=' => '0',
            );
        }
        $join = array('table' => 'tours', 'condition' => 'tours.id=tour_details.tours_id');

        $get_tours_date_wise = $this->myfront_model->get_data("tours.name,tours.main_image,tours.seat_availability,tour_details.id as tour_details_id,tour_details.duration,tour_details.start_date,tour_details.price,DATE_FORMAT(tour_details.start_date,'%d %b') as tour_calendar_days", "tour_details", $cond5, [$join], "", "asc", "tour_details.start_date", "", "");
        if (!empty($get_tours_date_wise)) {
            // print_r($get_tours_date_wise);
            foreach ($get_tours_date_wise as $key => $val) {
                $get_tours_date_wise_data[$key]['dtl_nm'] = implode("-", explode(" ", $val->name));
                $get_tours_date_wise_data[$key]['name'] = $val->name;
                $get_tours_date_wise_data[$key]['main_image'] = $val->main_image;
                $get_tours_date_wise_data[$key]['seat_availability'] = $val->seat_availability;
                $get_tours_date_wise_data[$key]['tour_details_id'] = $val->tour_details_id;
                $get_tours_date_wise_data[$key]['duration'] = $val->duration;
                $get_tours_date_wise_data[$key]['start_date'] = $val->start_date;
                $get_tours_date_wise_data[$key]['price'] = $val->price;
                $get_tours_date_wise_data[$key]['tour_calendar_days'] = $val->tour_calendar_days;
            }
            // print_r($get_tours_date_wise_data);
            $rslt = array('status' => '101', 'data' => $get_tours_date_wise_data);
        } else {
            $rslt = array('status' => '103', 'data' => '');
        }
        // print_r($data);
        // exit;
        echo json_encode($rslt);
    }

    public function get_searchData()
    {
        $serching_data = $this->input->post('serchingData');
        $cond = array(
            'tour_details.is_delete!=' => '0',
            'tour_details.status!=' => '0',
            'tour_details.start_date >=' => date('Y-m-d'),
            'tours.is_delete!=' => '0',
            'tours.status!=' => '0',
        );
        $serch_field_array = array(
            "0" => "tours.name"
        );
        $join = array('table' => 'tour_details', 'condition' => 'tour_details.tours_id=tours.id', 'left');
        $destinations = $this->myfront_model->get_data("tours.name,tour_details.id as tour_details_id,tour_details.start_date", "tours", $cond, [$join], "", "asc", "tour_details.start_date", "tour_details.tours_id", "", "", "", $serching_data, $serch_field_array);
        // print_r($destinations);
        $serch_rslt = "";
        if (!empty($destinations)) {
            foreach ($destinations as $key => $val) {
                // $names = implode("-", explode(" ", $val->name));
                $serch_rslt .= '<a value="' . $val->tour_details_id . '" class="list-group-item list-group-item-action border-1 lst_itm">' . $val->name . '</a>';
            }
            $rslt = array('status' => '101', 'data' => $serch_rslt);
        } else {
            $serch_rslt .= '<p class="list-group-item border-1 lst_itm">Tour Is Available Currently. Thank You..!</p>';
            $rslt = array('status' => '103', 'data' => $serch_rslt);
        }
        // exit;

        echo json_encode($rslt);
    }

    public function search_form_data()
    {
        // echo "<pre>";
        // print_r($_POST);
        // exit;
        $serching_data_id = $this->input->post('serching_data_id');
        $cond = array(
            'tour_details.id' => $serching_data_id,
            'tour_details.is_delete!=' => '0',
            'tour_details.status!=' => '0',
            'tour_details.start_date >=' => date('Y-m-d'),
            'tours.is_delete!=' => '0',
            'tours.status!=' => '0',
        );

        $join = array('table' => 'tour_details', 'condition' => 'tour_details.tours_id=tours.id', 'left');
        $destinations = $this->myfront_model->get_data("tours.name,tour_details.id as tour_details_id,tour_details.start_date", "tours", $cond, [$join], "1", "asc", "tour_details.start_date", "tour_details.tours_id");
        // print_r($destinations);
        $serch_rslt = "";
        if (!empty($destinations)) {
            $destinations_data['dtl_nm'] = implode("-", explode(" ", $destinations->name));
            $destinations_data['ids'] = $destinations->tour_details_id;
            $rslt = array('status' => '101', 'data' => $destinations_data);
        } else {
            $serch_rslt .= '<p class="list-group-item border-1 lst_itm">Tour Is Not Available Currently. Thank You..!</p>';
            $rslt = array('status' => '103', 'data' => $serch_rslt);
        }
        // exit;

        echo json_encode($rslt);
    }
}
