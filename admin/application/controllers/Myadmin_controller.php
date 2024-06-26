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
        // echo "<pre>";
        if (!empty($this->input->post('username')) && !empty($this->input->post('password'))) {
            $cond = array(
                'user_auth.user_name' => $this->input->post('username'),
                'user_auth.pswd' => md5($this->input->post('password')),
                'user_auth.status' => '1'
            );

            $join = array('table' => 'users', 'condition' => 'users.id = user_auth.user_id');

            $result = $this->myadmin_model->get_data('users.id as user_id,users.name,users.user_role', 'user_auth', $cond, [$join], "1");

            $rslt = array('status' => '101', 'msg' => '', 'result' => $result);
            // print_r($result);
            // exit;
            $session_array = array(
                'user_id' => $result->user_id,
                'name' => $result->name,
                'user_role' => $result->user_role,
            );

            $this->session->set_userdata($session_array);
        } else {
            $rslt = array('status' => '103', 'msg' => 'Please fill all details correctly!!', 'result' => '');
        }
        echo json_encode($rslt);
    }

    public function state()
    {
        if (empty($this->session->userdata('user_id'))) {
            redirect(base_url('login'));
        }

        $cond = array('is_delete!=' => '0');
        $data['state_details'] = $this->myadmin_model->get_data("", "states", $cond, "", "", "desc", "id");
        $this->load->view('include/header');
        $this->load->view('state/index', $data);
        $this->load->view('include/footer');
    }

    public function state_details()
    {
        // echo "<pre>";
        // print_r($this->input->post());
        // exit;
        $edit_id = (!empty($this->input->post('eid'))) ? $this->input->post('eid') : '';
        $state_details = array(
            'name' => $this->input->post('state'),
            'status' => $this->input->post('status')
        );

        if (empty($edit_id)) {
            $state_details['created_by'] = $this->session->userdata('user_id');
            $state_details['created_at'] = date('Y-m-d H:i:s');
            $state_details['is_delete'] = '1';
            $last_inst_id = $this->myadmin_model->insert_data("states", $state_details);
            $msg = 'You have successfully added';
        } else {
            $cond = array(
                'id' => $edit_id
            );
            $state_details['updated_by'] = $this->session->userdata('user_id');
            $state_details['updated_at'] = date('Y-m-d H:i:s');
            $last_inst_id = $this->myadmin_model->update_data("states", $state_details, $cond);
            $msg = 'You have successfully edited';
        }

        if (!empty($last_inst_id)) {
            $rslt = array('status' => '101', 'msg' => $msg, 'data' => $last_inst_id);
        } else {
            $rslt = array('status' => '103', 'msg' => 'Something went wrong!', 'data' => '');
        }

        echo json_encode($rslt);
    }

    public function edit_state_data()
    {
        $edit_id = (!empty($this->input->post('eid'))) ? $this->input->post('eid') : '';
        // echo "edit_id=> ".$edit_id;
        // exit;
        if (!empty($edit_id)) {
            $cond = array(
                'id' => $edit_id
            );
            $data = $this->myadmin_model->get_data('id,name,status', "states", $cond, "", "1");
            $rslt = array('status' => '101', 'msg' => '', 'data' => $data);
        } else {
            $rslt = array('status' => '103', 'msg' => '', 'data' => '');
        }

        echo json_encode($rslt);
    }

    public function checkisExist()
    {
        // echo "<pre>";
        $val = $this->input->post('val');
        $checked_table = $this->input->post('checked_table');
        $eid = (!empty($this->input->post('eid'))) ? $this->input->post('eid') : '';

        if ($checked_table == 'states') {
            $cond = array('name' => $val, 'is_delete!=' => '0');
        }
        if ($checked_table == 'place') {
            $cond = array('name' => $val, 'is_delete!=' => '0');
        }
        if ($checked_table == 'country_code') {
            $cond = array('name' => $val, 'is_delete!=' => '0');
        }

        $data = $this->myadmin_model->get_data("", $checked_table, $cond);
        if (!empty($data)) {
            if (!empty($eid)) {
                if ($data->id == $eid) {
                    $rslt = array('status' => '101', 'msg' => '', 'data' => '');
                } else {
                    $rslt = array('status' => '103', 'msg' => '', 'data' => $data);
                }
            } else {
                $rslt = array('status' => '103', 'msg' => '', 'data' => $data);
            }
        } else {
            $rslt = array('status' => '101', 'msg' => '', 'data' => '');
        }

        echo json_encode($rslt);
    }

    public function delete_data()
    {
        $eid = $this->input->post('eid');
        $dlt_tables = $this->input->post('tables');

        if ($dlt_tables == "travel_mates_images" || $dlt_tables == "tour_photos" || $dlt_tables == "tour_category_photos") {
            if ($dlt_tables == "travel_mates_images") {
                $dlt_fld = "travel_mate_images";
            } elseif ($dlt_tables == "tour_photos") {
                $dlt_fld = "tour_photo";
            } else {
                $dlt_fld = "trip_image";
            }

            $e_rslt = $this->myadmin_model->get_data($dlt_fld, $dlt_tables, ['id' => $eid], "", "1");
            // print_r($e_rslt);
            // exit;
            $existing_file_path = (!empty($e_rslt)) ? $e_rslt->$dlt_fld : '';
            if (!empty($existing_file_path) && file_exists($existing_file_path)) {
                unlink($existing_file_path);
            }
        }

        $cond = array('id' => $eid);
        $updt_data = array(
            'is_delete' => '0',
            'status' => '0'
        );

        $data = $this->myadmin_model->update_data($dlt_tables, $updt_data, $cond);

        if (!empty($data)) {
            $rslt = array('status' => '101', 'msg' => 'Successfully Deleted!', 'data' => $data);
        } else {
            $rslt = array('status' => '103', 'msg' => 'Delete Not Be Done!', 'data' => '');
        }

        echo json_encode($rslt);
    }

    public function place()
    {
        if (empty($this->session->userdata('user_id'))) {
            redirect(base_url('login'));
        }

        $cond = array('place.is_delete!=' => '0');

        $join = array('table' => 'states', 'condition' => 'states.id=place.state');
        $data['place_details'] = $this->myadmin_model->get_data("place.*,states.name as state_name", "place", $cond, [$join], "", "desc", "place.id");


        $cond1 = array('is_delete!=' => '0', 'status' => '1');
        $data['state_details'] = $this->myadmin_model->get_data("id,name", "states", $cond1);

        $this->load->view('include/header');
        $this->load->view('place/index', $data);
        $this->load->view('include/footer');
    }

    public function place_details()
    {
        // echo "<pre>";
        // echo "abcd";
        // print_r($this->input->post());
        // exit;
        $edit_id = (!empty($this->input->post('eid'))) ? $this->input->post('eid') : '';
        $place_details = array(
            'name' => $this->input->post('place'),
            'state' => $this->input->post('state'),
            'status' => $this->input->post('status'),
        );

        if (empty($edit_id)) {
            $place_details['created_by'] = $this->session->userdata('user_id');
            $place_details['created_at'] = date('Y-m-d H:i:s');
            $place_details['is_delete'] = '1';
            $last_inst_id = $this->myadmin_model->insert_data("place", $place_details);
            $msg = 'You have successfully added';
        } else {
            $cond = array(
                'id' => $edit_id
            );
            $place_details['updated_by'] = $this->session->userdata('user_id');
            $place_details['updated_at'] = date('Y-m-d H:i:s');
            $last_inst_id = $this->myadmin_model->update_data("place", $place_details, $cond);
            $msg = 'You have successfully edited';
        }

        if (!empty($last_inst_id)) {
            $rslt = array('status' => '101', 'msg' => $msg, 'data' => $last_inst_id);
        } else {
            $rslt = array('status' => '103', 'msg' => 'Something went wrong!', 'data' => '');
        }

        echo json_encode($rslt);
    }

    public function edit_place_data()
    {
        $edit_id = (!empty($this->input->post('eid'))) ? $this->input->post('eid') : '';
        // echo "edit_id=> ".$edit_id;
        // exit;
        if (!empty($edit_id)) {
            $cond = array(
                'id' => $edit_id
            );
            $data = $this->myadmin_model->get_data('id,name,state,status', "place", $cond, "", "1");
            $rslt = array('status' => '101', 'msg' => '', 'data' => $data);
        } else {
            $rslt = array('status' => '103', 'msg' => '', 'data' => '');
        }

        echo json_encode($rslt);
    }

    public function tour_category()
    {
        if (empty($this->session->userdata('user_id'))) {
            redirect(base_url('login'));
        }

        $cond = array('is_delete!=' => '0');
        $data['tour_category_details'] = $this->myadmin_model->get_data("", "tour_category", $cond, "", "", "desc", "id");
        $this->load->view('include/header');
        $this->load->view('tour_category/index', $data);
        $this->load->view('include/footer');
    }

    public function tour_category_details()
    {
        // echo "<pre>";
        // print_r($this->input->post());
        // exit;
        $edit_id = (!empty($this->input->post('eid'))) ? $this->input->post('eid') : '';
        $tour_category_details = array(
            'name' => $this->input->post('category_name'),
            'status' => $this->input->post('status')
        );

        if (empty($edit_id)) {
            $tour_category_details['created_by'] = $this->session->userdata('user_id');
            $tour_category_details['created_at'] = date('Y-m-d H:i:s');
            $tour_category_details['is_delete'] = '1';
            $last_inst_id = $this->myadmin_model->insert_data("tour_category", $tour_category_details);
            $msg = 'You have successfully added';
        } else {
            $cond = array(
                'id' => $edit_id
            );
            $tour_category_details['updated_by'] = $this->session->userdata('user_id');
            $tour_category_details['updated_at'] = date('Y-m-d H:i:s');
            $last_inst_id = $this->myadmin_model->update_data("tour_category", $tour_category_details, $cond);
            $msg = 'You have successfully edited';
        }

        if (!empty($last_inst_id)) {
            $rslt = array('status' => '101', 'msg' => $msg, 'data' => $last_inst_id);
        } else {
            $rslt = array('status' => '103', 'msg' => 'Something went wrong!', 'data' => '');
        }

        echo json_encode($rslt);
    }

    public function edit_tour_category_data()
    {
        $edit_id = (!empty($this->input->post('eid'))) ? $this->input->post('eid') : '';
        // echo "edit_id=> ".$edit_id;
        // exit;
        if (!empty($edit_id)) {
            $cond = array(
                'id' => $edit_id
            );
            $data = $this->myadmin_model->get_data('id,name,status', "tour_category", $cond, "", "1");
            $rslt = array('status' => '101', 'msg' => '', 'data' => $data);
        } else {
            $rslt = array('status' => '103', 'msg' => '', 'data' => '');
        }

        echo json_encode($rslt);
    }

    public function tours()
    {
        if (empty($this->session->userdata('user_id'))) {
            redirect(base_url('login'));
        }

        $cond = array('tours.is_delete!=' => '0');
        $join1 = array('table' => 'place', 'condition' => 'place.id=tours.place_id');
        $join2 = array('table' => 'tour_category', 'condition' => 'tour_category.id=tours.tour_category_id');
        $join = [$join1, $join2];

        $data['tour_details'] = $this->myadmin_model->get_data("tours.id,tours.name,tours.main_image,tours.difficulty,tours.seat_availability,tours.short_desc,tours.header_desc,place.name as place_name,tour_category.name as tour_category_name,tours.status", "tours", $cond, $join, "", "desc", "id");


        $cond1 = array('place.is_delete!=' => '0');
        $cond2 = array('tour_category.is_delete!=' => '0');

        $data['place_details'] = $this->myadmin_model->get_data("id,name", "place", $cond1, "", "", "", "");
        $data['tour_category_details'] = $this->myadmin_model->get_data("id,name", "tour_category", $cond2, "", "", "", "");

        $this->load->view('include/header');
        $this->load->view('tours/index', $data);
        $this->load->view('include/footer');
    }

    public function tour_details()
    {
        $edit_id = $this->input->post('eid');
        $tours_details = array(
            'name' => $this->input->post('tour_name'),
            'place_id' => $this->input->post('place'),
            'tour_category_id' => $this->input->post('tour_category'),
            'seat_availability' => $this->input->post('seat_availability'),
            'difficulty' => $this->input->post('difficulty'),
            'short_desc' => $this->input->post('tour_short_desc'),
            'header_desc' => $this->input->post('tour_header_desc'),
            'status' => $this->input->post('status'),
        );

        // Existing file path for the record being edited
        $existing_file_path = ''; // Provide the correct path based on your implementation

        if (!empty($edit_id)) {
            $f_cond = array(
                'id' => $edit_id
            );
            $e_rslt = $this->myadmin_model->get_data("main_image", "tours", $f_cond, "", "", "", "1");
            if (!empty($e_rslt)) {
                $existing_file_path = $e_rslt[0]->main_image;
            }
        }
        if (!empty($_FILES) && !empty($_FILES['tour_image']['name'])) {
            $f_name = $_FILES['tour_image']['name'];
            $f_path = $_FILES['tour_image']['tmp_name'];

            $i = uniqid();
            $f_arry = explode('.', $f_name);
            $f_new_name = $i . "_" . date('Y-m-d_H-i-s') . "." . end($f_arry);
            $img_path = 'assets/images/self_upload/' . $f_new_name;

            // Check if the file already exists
            if (file_exists($img_path)) {
                $rslt = array('status' => '103', 'msg' => 'File with the same name already exists.', 'data' => '');
                echo json_encode($rslt);
                return;
            }

            $tours_details['main_image'] = $img_path;

            if (!move_uploaded_file($f_path, $img_path)) {
                $rslt = array('status' => '103', 'msg' => 'Failed to move the uploaded file.', 'data' => '');
                echo json_encode($rslt);
                return;
            }

            // Remove the previous file associated with the record being edited
            if (!empty($existing_file_path) && file_exists($existing_file_path)) {
                unlink($existing_file_path);
            }
        }

        $now = date('Y-m-d H:i:s');

        if (empty($edit_id)) {
            $tours_details['created_by'] = $this->session->userdata('user_id');
            $tours_details['created_at'] = $now;
            $tours_details['is_delete'] = '1';

            $last_inst_id = $this->myadmin_model->insert_data("tours", $tours_details);
            $msg = 'You have successfully added';
        } else {
            $cond = array('id' => $edit_id);
            $tours_details['updated_by'] = $this->session->userdata('user_id');
            $tours_details['updated_at'] = $now;
            $last_inst_id = $this->myadmin_model->update_data("tours", $tours_details, $cond);
            $msg = 'You have successfully edited';
        }

        if (!empty($last_inst_id)) {
            $rslt = array('status' => '101', 'msg' => $msg, 'data' => $last_inst_id);
        } else {
            $rslt = array('status' => '103', 'msg' => 'Something went wrong!', 'data' => '');
        }

        echo json_encode($rslt);
    }

    public function edit_tour_data()
    {
        $edit_id = (!empty($this->input->post('eid'))) ? $this->input->post('eid') : '';
        // echo "edit_id=> ".$edit_id;
        // exit;
        if (!empty($edit_id)) {
            $cond = array(
                'id' => $edit_id
            );
            $data = $this->myadmin_model->get_data('id,name,place_id,tour_category_id,difficulty,seat_availability,short_desc,header_desc,status,main_image', "tours", $cond, "", "1");
            $rslt = array('status' => '101', 'msg' => '', 'data' => $data);
        } else {
            $rslt = array('status' => '103', 'msg' => '', 'data' => '');
        }

        echo json_encode($rslt);
    }

    public function tour_destination()
    {
        if (empty($this->session->userdata('user_id'))) {
            redirect(base_url('login'));
        }

        $cond = array(
            'tours.is_delete!=' => '0',
            'tour_details.is_delete!=' => '0'
        );
        $join1 = array('table' => 'tours', 'condition' => 'tours.id=tour_details.tours_id');
        $join2 = ['table' => 'tour_category', 'condition' => 'tours.tour_category_id=tour_category.id'];
        $join = [$join1, $join2];

        $data['tour_destination_details'] = $this->myadmin_model->get_data("tours.name,tour_details.*,tour_category.name as category_name", "tour_details", $cond, $join, "", "desc", "tour_details.id");

        $cond1 = array(
            'tours.is_delete!=' => '0',
            'tours.status!=' => '0'
        );

        $data['tours_data'] = $this->myadmin_model->get_data("tours.id,tours.name,tour_category.name as category_name", "tours", $cond1, [$join2], "", "asc", "tours.name");

        $this->load->view('include/header');
        $this->load->view('destination_details/index', $data);
        $this->load->view('include/footer');
    }

    public function destination_details()
    {
        // echo "<pre>";
        // print_r($_POST);
        // exit;

        $edit_id = (!empty($this->input->post('eid'))) ? $this->input->post('eid') : '';

        $tour_details = array(
            'tours_id' => $this->input->post('tours_id'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
            'pikup_location' => $this->input->post('pikup_location'),
            'drop_location' => $this->input->post('drop_location'),
            'duration' => $this->input->post('duration'),
            'price' => $this->input->post('price'),
            'pax_size' => $this->input->post('pax_size'),
            'is_discount' => (!empty($this->input->post('is_discount'))) ? $this->input->post('is_discount') : '0',
            'disc_percent' => (!empty($this->input->post('is_discount'))) ? (($this->input->post('is_discount') != 0) ? ($this->input->post('disc_percent')) : 0) : 0,
            'status' => $this->input->post('status'),
        );

        // print_r($tour_details);
        // exit;
        if (empty($edit_id)) {
            $tour_details['created_by'] = $this->session->userdata('user_id');
            $tour_details['created_at'] = date('Y-m-d H:i:s');
            $tour_details['is_delete'] = '1';
            $last_inst_id = $this->myadmin_model->insert_data("tour_details", $tour_details);
            $msg = 'You have successfully added';
        } else {
            $cond = array(
                'id' => $edit_id
            );
            $tour_details['updated_by'] = $this->session->userdata('user_id');
            $tour_details['updated_at'] = date('Y-m-d H:i:s');
            $last_inst_id = $this->myadmin_model->update_data("tour_details", $tour_details, $cond);
            $msg = 'You have successfully edited';
        }

        if (!empty($last_inst_id)) {
            $rslt = array('status' => '101', 'msg' => $msg, 'data' => $last_inst_id);
        } else {
            $rslt = array('status' => '103', 'msg' => 'Something went wrong!', 'data' => '');
        }

        echo json_encode($rslt);
    }

    public function edit_tour_dest_data()
    {
        $edit_id = (!empty($this->input->post('eid'))) ? $this->input->post('eid') : '';

        if (!empty($edit_id)) {
            $cond = array(
                'id' => $edit_id
            );
            $data = $this->myadmin_model->get_data('', "tour_details", $cond, "", "1");
            $rslt = array('status' => '101', 'msg' => '', 'data' => $data);
        } else {
            $rslt = array('status' => '103', 'msg' => '', 'data' => '');
        }

        echo json_encode($rslt);
    }

    public function tour_about()
    {
        // echo "<pre>";
        if (empty($this->session->userdata('user_id'))) {
            redirect(base_url('login'));
        }

        $cond2 = array(
            'tour_about.is_delete!=' => '0',
            // 'tour_about.status!=' => '0'tour_details
        );
        $join1 = array('table' => 'tours', 'condition' => 'tours.id=tour_about.tours_id');
        $join2 = ['table' => 'tour_category', 'condition' => 'tours.tour_category_id=tour_category.id'];
        $join3 = ['table' => 'tour_details', 'condition' => 'tour_details.tours_id=tours.id'];
        $join = [$join1, $join2, $join3];

        $data['tour_about_details'] = $this->myadmin_model->get_data("tour_about.id,tour_about.tours_id,tour_about.tour_about_details,tour_about.status,tours.name,tour_category.name as category_name,tour_details.start_date as tour_start_date", "tour_about", $cond2, $join, "", "desc", "tour_about.id");

        $cond1 = array(
            'tours.is_delete!=' => '0',
            'tours.status!=' => '0',
        );
        $ids_arry = array();
        foreach ($data['tour_about_details'] as $val) {
            $ids_arry[] = $val->tours_id;
        }
        // print_r($ids_arry);
        // $data['tours_data'] = $this->myadmin_model->get_data("id,name", "tours", $cond1, "", "", "", "", "", "", "id", $ids_arry);
        // $data['tours_data'] = $this->myadmin_model->get_data("id,name", "tours", $cond1);

        $data['tours_data'] = $this->myadmin_model->get_data("tours.id,tours.name,tour_category.name as category_name,tour_details.start_date as tour_start_date", "tours", $cond1, [$join2, $join3], "", "asc", "tours.name");

        // exit;
        $this->load->view('include/header');
        $this->load->view('tour_about/index', $data);
        $this->load->view('include/footer');
    }

    public function tour_about_details()
    {
        // echo "<per>";
        // print_r($_POST);
        // exit;

        $edit_id = (!empty($this->input->post('eid'))) ? $this->input->post('eid') : '';

        $tour_about = array(
            'tours_id' => $this->input->post('tours_id'),
            'status' => $this->input->post('status'),
            'tour_about_details' => $this->input->post('tour_about_details_text'),
        );

        // print_r($tour_details);
        // exit;
        if (empty($edit_id)) {
            $tour_about['created_by'] = $this->session->userdata('user_id');
            $tour_about['created_at'] = date('Y-m-d H:i:s');
            $tour_about['is_delete'] = '1';
            $last_inst_id = $this->myadmin_model->insert_data("tour_about", $tour_about);
            $msg = 'You have successfully added';
        } else {
            $cond = array(
                'id' => $edit_id
            );
            $tour_about['updated_by'] = $this->session->userdata('user_id');
            $tour_about['updated_at'] = date('Y-m-d H:i:s');
            $last_inst_id = $this->myadmin_model->update_data("tour_about", $tour_about, $cond);
            $msg = 'You have successfully edited';
        }

        if (!empty($last_inst_id)) {
            $rslt = array('status' => '101', 'msg' => $msg, 'data' => $last_inst_id);
        } else {
            $rslt = array('status' => '103', 'msg' => 'Something went wrong!', 'data' => '');
        }

        echo json_encode($rslt);
    }

    public function edit_tour_about_data()
    {
        $edit_id = (!empty($this->input->post('eid'))) ? $this->input->post('eid') : '';

        if (!empty($edit_id)) {
            $cond = array(
                'id' => $edit_id
            );
            $data = $this->myadmin_model->get_data('', "tour_about", $cond, "", "1");
            $rslt = array('status' => '101', 'msg' => '', 'data' => $data);
        } else {
            $rslt = array('status' => '103', 'msg' => '', 'data' => '');
        }

        echo json_encode($rslt);
    }

    public function tour_itinerary()
    {
        // echo "<pre>";
        if (empty($this->session->userdata('user_id'))) {
            redirect(base_url('login'));
        }

        $cond1 = array(
            'tours.is_delete!=' => '0',
            'tours.status!=' => '0',
        );
        // $data['tours_data'] = $this->myadmin_model->get_data("id,name", "tours", $cond1);
        $join3 = ['table' => 'tour_category', 'condition' => 'tours.tour_category_id=tour_category.id'];
        $join4 = ['table' => 'tour_details', 'condition' => 'tour_details.tours_id=tours.id'];
        $data['tours_data'] = $this->myadmin_model->get_data("tours.id,tours.name,tour_category.name as category_name,tour_details.start_date as tour_start_date", "tours", $cond1, [$join3, $join4], "", "asc", "tours.name");


        $cond2 = array(
            'tour_itinerary_main.is_delete!=' => '0'
        );
        $join1 = array('table' => 'tours', 'condition' => 'tours.id=tour_itinerary_main.tours_id');
        $join2 = array('table' => 'tour_itinerary_sub', 'condition' => 'tour_itinerary_sub.itinery_main_id=tour_itinerary_main.id');
        $join = [$join1, $join2, $join3, $join4];
        $data['tour_itinerary_details'] = $this->myadmin_model->get_data("tour_itinerary_main.id,tour_itinerary_main.itinerary,tour_itinerary_main.status,tour_itinerary_main.sequence,tours.name,tour_itinerary_sub.itinerary_sub,tour_category.name as category_name,tour_details.start_date as tour_start_date", "tour_itinerary_main", $cond2, $join, "", "desc", "tour_itinerary_main.id");

        // exit;
        $this->load->view('include/header');
        $this->load->view('tour_itinerary/index', $data);
        $this->load->view('include/footer');
    }

    public function tour_itinerary_details()
    {
        $edit_id = (!empty($this->input->post('eid'))) ? $this->input->post('eid') : '';
        $itinerary = $this->input->post('itinerary');
        $itinerary_descriptions = $this->input->post('itinerary_descriptions');

        $check_itinerary_cond = array(
            'tours_id' => $this->input->post('tours_id'),
            'sequence' => $this->input->post('sequence'),
        );

        $check_itinerary_sequence = $this->myadmin_model->get_data("id", "tour_itinerary_main", $check_itinerary_cond);
        if (!empty($check_itinerary_sequence)) {
            foreach ($check_itinerary_sequence as $val) {
                $tour_update_data = array(
                    'status' => '0',
                );
                $this->myadmin_model->update_data("tour_itinerary_main", $tour_update_data, ["id " => $val->id]);
            }
        }

        $tour_itenary = array(
            'tours_id' => $this->input->post('tours_id'),
            'status' => $this->input->post('status'),
            'sequence' => $this->input->post('sequence'),
        );

        if (empty($edit_id)) {
            $tour_itenary['created_by'] = $this->session->userdata('user_id');
            $tour_itenary['created_at'] = date('Y-m-d H:i:s');
            $tour_itenary['is_delete'] = '1';
            // foreach ($itinerary as $key => $val) {
            if (!empty($itinerary) && !empty($itinerary_descriptions)) {
                $tour_itenary['itinerary'] = $itinerary;
                $last_inst_id = $this->myadmin_model->insert_data("tour_itinerary_main", $tour_itenary);

                $tour_itenary_sub = array(
                    'itinery_main_id' => $last_inst_id,
                    'itinerary_sub' => $itinerary_descriptions,
                    'status' => $this->input->post('status'),
                    'created_by' => $this->session->userdata('user_id'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'is_delete' => '1'
                );
                $last_inst_id = $this->myadmin_model->insert_data("tour_itinerary_sub", $tour_itenary_sub);
            }
            // }
            $msg = 'You have successfully added';
        } else {
            $cond = array(
                'tour_itinerary_main.id' => $edit_id
            );
            $tour_itenary['updated_by'] = $this->session->userdata('user_id');
            $tour_itenary['updated_at'] = date('Y-m-d H:i:s');

            // foreach ($itinerary as $key => $val) {
            if (!empty($itinerary) && !empty($itinerary_descriptions)) {
                $tour_itenary['itinerary'] = $itinerary;
                $last_inst_id = $this->myadmin_model->update_data("tour_itinerary_main", $tour_itenary, $cond);

                $cond1 = array(
                    'tour_itinerary_sub.itinery_main_id' => $edit_id,
                    'tour_itinerary_sub.status' => '1',
                    'tour_itinerary_sub.is_delete' => '1',
                );
                $tour_itenary_sub = array(
                    'itinerary_sub' => $itinerary_descriptions,
                    'updated_by' => $this->session->userdata('user_id'),
                    'updated_at' => date('Y-m-d H:i:s'),
                );

                $last_inst_id = $this->myadmin_model->update_data("tour_itinerary_sub", $tour_itenary_sub, $cond1);
            }
            // }
            $msg = 'You have successfully edited';
        }

        if (!empty($last_inst_id)) {
            $rslt = array('status' => '101', 'msg' => $msg, 'data' => $last_inst_id);
        } else {
            $rslt = array('status' => '103', 'msg' => 'Something went wrong!', 'data' => '');
        }

        echo json_encode($rslt);
    }

    public function edit_tour_itinerary_data()
    {
        $edit_id = (!empty($this->input->post('eid'))) ? $this->input->post('eid') : '';

        if (!empty($edit_id)) {
            $cond = array(
                'tour_itinerary_main.id' => $edit_id
            );

            $join = array('table' => 'tour_itinerary_sub', 'condition' => 'tour_itinerary_sub.itinery_main_id=tour_itinerary_main.id');
            $data = $this->myadmin_model->get_data('tour_itinerary_main.id,tour_itinerary_main.tours_id,tour_itinerary_main.sequence,tour_itinerary_main.itinerary,tour_itinerary_main.status,tour_itinerary_sub.itinerary_sub', "tour_itinerary_main", $cond, [$join], "1");
            $rslt = array('status' => '101', 'msg' => '', 'data' => $data);
        } else {
            $rslt = array('status' => '103', 'msg' => '', 'data' => '');
        }

        echo json_encode($rslt);
    }

    public function tour_inclusions_exclusions()
    {
        // echo "<pre>";
        if (empty($this->session->userdata('user_id'))) {
            redirect(base_url('login'));
        }

        $cond2 = array(
            'tour_inclusions_exclusions.is_delete!=' => '0'
        );
        $join1 = array('table' => 'tours', 'condition' => 'tours.id=tour_inclusions_exclusions.tours_id');
        $join2 = ['table' => 'tour_category', 'condition' => 'tours.tour_category_id=tour_category.id'];
        $join3 = ['table' => 'tour_details', 'condition' => 'tour_details.tours_id=tours.id'];
        $join = [$join1, $join2, $join3];

        $data['tour_inclusions_exclusions_details'] = $this->myadmin_model->get_data("tour_inclusions_exclusions.id,tour_inclusions_exclusions.tours_id,tour_inclusions_exclusions.inclusions,tour_inclusions_exclusions.exclusions,tour_inclusions_exclusions.status,tours.name,tour_category.name as category_name,,tour_details.start_date as tour_start_date", "tour_inclusions_exclusions", $cond2, $join, "", "", "");

        $cond1 = array(
            'tours.is_delete!=' => '0',
            'tours.status!=' => '0',
        );
        // $data['tours_data'] = $this->myadmin_model->get_data("id,name", "tours", $cond1);
        $data['tours_data'] = $this->myadmin_model->get_data("tours.id,tours.name,tour_category.name as category_name,,tour_details.start_date as tour_start_date", "tours", $cond1, [$join2, $join3], "", "asc", "tours.name");


        // exit;
        $this->load->view('include/header');
        $this->load->view('tour_inclusions_exclusions/index', $data);
        $this->load->view('include/footer');
    }

    public function tour_inclusions_exclusions_details()
    {
        // echo "<per>";
        // print_r($_POST);
        // exit;

        $edit_id = (!empty($this->input->post('eid'))) ? $this->input->post('eid') : '';

        $tour_inclusions_exclusions = array(
            'tours_id' => $this->input->post('tours_id'),
            'status' => $this->input->post('status'),
            'inclusions' => $this->input->post('tour_inclusions_details_text'),
            'exclusions' => $this->input->post('tour_exclusions_details_text'),
        );

        // print_r($tour_inclusions_exclusions);
        // exit;
        if (empty($edit_id)) {
            $tour_inclusions_exclusions['created_by'] = $this->session->userdata('user_id');
            $tour_inclusions_exclusions['created_at'] = date('Y-m-d H:i:s');
            $tour_inclusions_exclusions['is_delete'] = '1';
            $last_inst_id = $this->myadmin_model->insert_data("tour_inclusions_exclusions", $tour_inclusions_exclusions);
            $msg = 'You have successfully added';
        } else {
            $cond = array(
                'id' => $edit_id
            );
            $tour_inclusions_exclusions['updated_by'] = $this->session->userdata('user_id');
            $tour_inclusions_exclusions['updated_at'] = date('Y-m-d H:i:s');
            $last_inst_id = $this->myadmin_model->update_data("tour_inclusions_exclusions", $tour_inclusions_exclusions, $cond);
            $msg = 'You have successfully edited';
        }

        if (!empty($last_inst_id)) {
            $rslt = array('status' => '101', 'msg' => $msg, 'data' => $last_inst_id);
        } else {
            $rslt = array('status' => '103', 'msg' => 'Something went wrong!', 'data' => '');
        }

        echo json_encode($rslt);
    }

    public function edit_tour_inclusions_exclusions_data()
    {
        $edit_id = (!empty($this->input->post('eid'))) ? $this->input->post('eid') : '';

        if (!empty($edit_id)) {
            $cond = array(
                'id' => $edit_id
            );
            $data = $this->myadmin_model->get_data('', "tour_inclusions_exclusions", $cond, "", "1");
            $rslt = array('status' => '101', 'msg' => '', 'data' => $data);
        } else {
            $rslt = array('status' => '103', 'msg' => '', 'data' => '');
        }

        echo json_encode($rslt);
    }

    public function tour_other_info()
    {
        // echo "<pre>";
        if (empty($this->session->userdata('user_id'))) {
            redirect(base_url('login'));
        }

        $cond2 = array(
            'tour_other_info.is_delete!=' => '0'
        );
        $join1 = array('table' => 'tours', 'condition' => 'tours.id=tour_other_info.tours_id');
        $join2 = ['table' => 'tour_category', 'condition' => 'tours.tour_category_id=tour_category.id'];
        $join3 = ['table' => 'tour_details', 'condition' => 'tour_details.tours_id=tours.id'];
        $join = [$join1, $join2, $join3];

        $data['tour_tour_other_info_details'] = $this->myadmin_model->get_data("tour_other_info.id,tour_other_info.tours_id,tour_other_info.other_info,tour_other_info.status,tours.name,tour_category.name as category_name,tour_details.start_date as tour_start_date", "tour_other_info", $cond2, $join, "", "desc", "tour_other_info.id");

        $cond1 = array(
            'tours.is_delete!=' => '0',
            'tours.status!=' => '0',
        );
        // $data['tours_data'] = $this->myadmin_model->get_data("id,name", "tours", $cond1);
        $data['tours_data'] = $this->myadmin_model->get_data("tours.id,tours.name,tour_category.name as category_name,tour_details.start_date as tour_start_date", "tours", $cond1, [$join2, $join3], "", "asc", "tours.name");

        // exit;
        $this->load->view('include/header');
        $this->load->view('tour_other_info/index', $data);
        $this->load->view('include/footer');
    }

    public function tour_other_info_details()
    {
        // echo "<per>";
        // print_r($_POST);
        // exit;

        $edit_id = (!empty($this->input->post('eid'))) ? $this->input->post('eid') : '';

        $tour_other_info = array(
            'tours_id' => $this->input->post('tours_id'),
            'status' => $this->input->post('status'),
            'other_info' => $this->input->post('tour_other_info_details_text'),
        );

        // print_r($tour_inclusions_exclusions);
        // exit;
        if (empty($edit_id)) {
            $tour_other_info['created_by'] = $this->session->userdata('user_id');
            $tour_other_info['created_at'] = date('Y-m-d H:i:s');
            $tour_other_info['is_delete'] = '1';
            $last_inst_id = $this->myadmin_model->insert_data("tour_other_info", $tour_other_info);
            $msg = 'You have successfully added';
        } else {
            $cond = array(
                'id' => $edit_id
            );
            $tour_other_info['updated_by'] = $this->session->userdata('user_id');
            $tour_other_info['updated_at'] = date('Y-m-d H:i:s');
            $last_inst_id = $this->myadmin_model->update_data("tour_other_info", $tour_other_info, $cond);
            $msg = 'You have successfully edited';
        }

        if (!empty($last_inst_id)) {
            $rslt = array('status' => '101', 'msg' => $msg, 'data' => $last_inst_id);
        } else {
            $rslt = array('status' => '103', 'msg' => 'Something went wrong!', 'data' => '');
        }

        echo json_encode($rslt);
    }

    public function edit_tour_other_info_data()
    {
        $edit_id = (!empty($this->input->post('eid'))) ? $this->input->post('eid') : '';

        if (!empty($edit_id)) {
            $cond = array(
                'id' => $edit_id
            );
            $data = $this->myadmin_model->get_data('', "tour_other_info", $cond, "", "1");
            $rslt = array('status' => '101', 'msg' => '', 'data' => $data);
        } else {
            $rslt = array('status' => '103', 'msg' => '', 'data' => '');
        }

        echo json_encode($rslt);
    }

    public function tour_photos()
    {
        if (empty($this->session->userdata('user_id'))) {
            redirect(base_url('login'));
        }


        $cond1 = array(
            'tours.is_delete!=' => '0',
            'tours.status!=' => '0',
        );
        // $data['tours_data'] = $this->myadmin_model->get_data("id,name", "tours", $cond1);
        $join2 = ['table' => 'tour_category', 'condition' => 'tours.tour_category_id=tour_category.id'];
        $join3 = ['table' => 'tour_details', 'condition' => 'tour_details.tours_id=tours.id'];
        $data['tours_data'] = $this->myadmin_model->get_data("tours.id,tours.name,tour_category.name as category_name,tour_details.start_date as tour_start_date", "tours", $cond1, [$join2, $join3], "", "asc", "tours.name");

        $cond2 = array(
            'tour_photos.is_delete!=' => '0'
        );
        $join1 = array('table' => 'tours', 'condition' => 'tours.id=tour_photos.tours_id');
        $join = [$join1, $join2, $join3];

        $data['tour_photos'] = $this->myadmin_model->get_data('tour_photos.id,tour_photos.tours_id,tour_photos.tour_photo,tour_photos.status,tours.name,tour_category.name as category_name,tour_details.start_date as tour_start_date', "tour_photos", $cond2, $join, "", "desc", "tour_photos.id", "tour_photos.id,tour_photos.tour_photo");

        $this->load->view('include/header');
        $this->load->view('tour_photos/index', $data);
        $this->load->view('include/footer');
    }

    public function tour_photos_details()
    {
        $edit_id = $this->input->post('eid');
        $msg = ''; // Initialize $msg variable
        $last_inst_id = null; // Initialize $last_inst_id
        $tours_photos = array();
        $now = date('Y-m-d H:i:s'); // Initialize $now


        $tours_photo = array(
            'tours_id' => $this->input->post('tours_id'),
            'status' => $this->input->post('status'),
        );

        // Check if files are uploaded
        if (!empty($_FILES['tour_photos']['name'])) {
            // Process each uploaded file
            foreach ($_FILES['tour_photos']['name'] as $key => $f_name) {
                $f_path = $_FILES['tour_photos']['tmp_name'][$key];

                // Check if the file is uploaded
                if (!empty($f_name) && is_uploaded_file($f_path)) {
                    $i = uniqid();
                    $f_arry = explode('.', $f_name);
                    $f_new_name = $i . "_" . date('Y-m-d_H-i-s') . "." . end($f_arry);
                    $img_path = 'assets/images/self_upload/' . $f_new_name;

                    // Check if the file already exists
                    if (file_exists($img_path)) {
                        $rslt = array('status' => '103', 'msg' => 'File with the same name already exists.', 'data' => '');
                        echo json_encode($rslt);
                        return;
                    }

                    $tours_photo['tour_photo'] = $img_path;


                    if (!move_uploaded_file($f_path, $img_path)) {
                        $rslt = array('status' => '103', 'msg' => 'Failed to move the uploaded file.', 'data' => '');
                        echo json_encode($rslt);
                        return;
                    }

                    // Add the photo details to the array
                    $tours_photos[] = $tours_photo;
                }
            }
        }

        // Existing file path for the record being edited
        $existing_file_paths = array();

        if (!empty($edit_id)) {
            $f_cond = array('id' => $edit_id);
            $e_rslt = $this->myadmin_model->get_data("tour_photo", "tour_photos", $f_cond, "", "", "", "1");
            foreach ($e_rslt as $e) {
                $existing_file_paths[] = $e->tour_photo;
            }
        }

        // Now, you can loop through $tours_photos to insert each photo
        if (!empty($tours_photos)) {
            foreach ($tours_photos as $tours_photo) {
                // Remove the previous file associated with the record being edited
                if (!empty($existing_file_paths)) {
                    foreach ($existing_file_paths as $existing_file_path) {
                        if (!empty($existing_file_path) && file_exists($existing_file_path)) {
                            unlink($existing_file_path);
                        }
                    }
                }

                $now = date('Y-m-d H:i:s');

                if (empty($edit_id)) {
                    // Insert the photo details into the database
                    $tours_photo['created_by'] = $this->session->userdata('user_id');
                    $tours_photo['created_at'] = $now;
                    $tours_photo['is_delete'] = '1';

                    $insert_result = $this->myadmin_model->insert_data("tour_photos", $tours_photo);

                    if (!empty($insert_result)) {
                        $last_inst_id = $insert_result;
                        $msg = 'You have successfully added';
                    } else {
                        $msg = 'Failed to insert data.';
                        $rslt = array('status' => '103', 'msg' => $msg, 'data' => '');
                        echo json_encode($rslt);
                        return;
                    }
                }
            }
        }

        // Update code outside the loop
        if (!empty($edit_id)) {
            $cond = array('id' => $edit_id);
            $tours_photo['updated_by'] = $this->session->userdata('user_id');
            $tours_photo['updated_at'] = $now;
            $update_result = $this->myadmin_model->update_data("tour_photos", $tours_photo, $cond);

            if ($update_result) {
                $last_inst_id = $edit_id;
                $msg = 'You have successfully edited';
            } else {
                $msg = 'Failed to update data.';
                $rslt = array('status' => '103', 'msg' => $msg, 'data' => '');
                echo json_encode($rslt);
                return;
            }
        }

        if (empty($last_inst_id)) {
            $rslt = array('status' => '103', 'msg' => 'Something went wrong!', 'data' => '');
            echo json_encode($rslt);
            return;
        }

        $rslt = array('status' => '101', 'msg' => $msg, 'data' => $last_inst_id);
        echo json_encode($rslt);
    }

    public function edit_tour_photos_data()
    {
        $edit_id = (!empty($this->input->post('eid'))) ? $this->input->post('eid') : '';
        // echo "edit_id=> ".$edit_id;
        // exit;
        if (!empty($edit_id)) {
            $cond = array(
                'id' => $edit_id
            );
            $data = $this->myadmin_model->get_data('id,tours_id,tour_photo,status', "tour_photos", $cond, "", "1");
            $rslt = array('status' => '101', 'msg' => '', 'data' => $data);
        } else {
            $rslt = array('status' => '103', 'msg' => '', 'data' => '');
        }

        echo json_encode($rslt);
    }

    public function tour_booking_details()
    {
        if (empty($this->session->userdata('user_id'))) {
            redirect(base_url('login'));
        }

        $data = array();

        $cond1 = array(
            'tour_details.is_delete!=' => '0',
            'tours.status!=' => '0',
            'tour_details.is_delete!=' => '0',
            'tour_details.status!=' => '0',
            'tour_booking_details.is_delete!=' => '0',
            'tour_booking_details.status!=' => '0',
        );

        $join1 = array('table' => 'tour_details', 'condition' => 'tour_details.id=tour_booking_details.tours_details_id');
        $join2 = array('table' => 'tours', 'condition' => 'tours.id=tour_details.tours_id');
        $join3 = array('table' => 'tour_category', 'condition' => 'tour_category.id=tours.tour_category_id');
        $join = array($join1, $join2, $join3);

        $data['tour_booking_details'] = $this->myadmin_model->get_data("tour_booking_details.id as tour_booking_details_id,tours.name,tour_booking_details.cust_name,tour_booking_details.cust_contact,tour_booking_details.cust_mail,tour_booking_details.cust_addr,tour_booking_details.nmbr_of_person,tour_booking_details.booking_date_time,tour_booking_details.booking_status,tour_booking_details.booking_amount_without_gst,tour_booking_details.booking_amount_with_gst,tour_booking_details.received_amount,tour_booking_details.booking_gst_amount,tour_details.start_date,tour_details.price,tour_details.end_date,tour_details.pikup_location,tour_details.drop_location,tour_details.duration,tour_details.price,tour_category.name as category_name", 'tour_booking_details', $cond1, $join, "", "asc", "tour_details.start_date");

        $this->load->view('include/header');
        $this->load->view('tour_booking_details/index', $data);
        $this->load->view('include/footer');
    }


    public function get_in_touch_details()
    {
        if (empty($this->session->userdata('user_id'))) {
            redirect(base_url('login'));
        }
        $cond1 = array(
            'get_in_touch.is_delete!=' => '0',
            'get_in_touch.status!=' => '0',
        );
        $data = array();
        $join = ['table' => 'country_code', 'condition' => 'country_code.id=get_in_touch.country_id', 'type' => 'left'];
        $data['get_in_touch_details'] = $this->myadmin_model->get_data("get_in_touch.id as get_in_touch_details_id,get_in_touch.git_cust_name,get_in_touch.git_cust_contact,get_in_touch.git_cust_email,get_in_touch.git_cust_destination,get_in_touch.query_time,get_in_touch.query_status,get_in_touch.status,get_in_touch.updated_by,get_in_touch.updated_at,country_code.code", 'get_in_touch', $cond1, [$join], "", "desc", "get_in_touch_details_id");

        $this->load->view('include/header');
        $this->load->view('tour_get_in_touch_details/index', $data);
        $this->load->view('include/footer');
    }

    public function country_code()
    {
        if (empty($this->session->userdata('user_id'))) {
            redirect(base_url('login'));
        }

        $cond = array('is_delete!=' => '0');
        $data['Country_details'] = $this->myadmin_model->get_data("", "country_code", $cond, "", "", "ace", "name");
        $this->load->view('include/header');
        $this->load->view('country/index', $data);
        $this->load->view('include/footer');
    }

    public function country_code_details()
    {
        // echo "<pre>";
        // print_r($this->input->post());
        // exit;
        $edit_id = (!empty($this->input->post('eid'))) ? $this->input->post('eid') : '';
        $country_name = ucwords(implode(' ', explode(' ', trim($this->input->post('name'), " "))));
        $state_details = array(
            'name' => $country_name,
            'code' => $this->input->post('code'),
            'status' => $this->input->post('status')
        );

        if (empty($edit_id)) {
            $state_details['created_by'] = $this->session->userdata('user_id');
            $state_details['created_at'] = date('Y-m-d H:i:s');
            $state_details['is_delete'] = '1';
            $last_inst_id = $this->myadmin_model->insert_data("country_code", $state_details);
            $msg = 'You have successfully added';
        } else {
            $cond = array(
                'id' => $edit_id
            );
            $state_details['updated_by'] = $this->session->userdata('user_id');
            $state_details['updated_at'] = date('Y-m-d H:i:s');
            $last_inst_id = $this->myadmin_model->update_data("country_code", $state_details, $cond);
            $msg = 'You have successfully edited';
        }

        if (!empty($last_inst_id)) {
            $rslt = array('status' => '101', 'msg' => $msg, 'data' => $last_inst_id);
        } else {
            $rslt = array('status' => '103', 'msg' => 'Something went wrong!', 'data' => '');
        }

        echo json_encode($rslt);
    }


    public function edit_country_code_data()
    {
        $edit_id = (!empty($this->input->post('eid'))) ? $this->input->post('eid') : '';
        // echo "edit_id=> ".$edit_id;
        // exit;
        if (!empty($edit_id)) {
            $cond = array(
                'id' => $edit_id
            );
            $data = $this->myadmin_model->get_data('id,name,code,status', "country_code", $cond, "", "1");
            $rslt = array('status' => '101', 'msg' => '', 'data' => $data);
        } else {
            $rslt = array('status' => '103', 'msg' => '', 'data' => '');
        }

        echo json_encode($rslt);
    }

    public function contact_us_details()
    {
        if (empty($this->session->userdata('user_id'))) {
            redirect(base_url('login'));
        }

        $cond1 = array(
            'contact_us.is_delete!=' => '0',
            'contact_us.status!=' => '0',
        );

        $data = array();
        $data['contact_us_details'] = $this->myadmin_model->get_data("contact_us.id as contact_us_details_id,contact_us.cnct_us_name,contact_us.cnct_us_email,contact_us.cnct_us_query,contact_us.query_time,contact_us.query_status,contact_us.status,contact_us.updated_by,contact_us.updated_at", 'contact_us', $cond1, "", "desc", "contact_us_details_id");

        $this->load->view('include/header');
        $this->load->view('tour_contact_us_details/index', $data);
        $this->load->view('include/footer');
    }

    public function terms_conditions_details()
    {
        // echo "<per>";
        // print_r($_POST);
        // exit;

        $edit_id = (!empty($this->input->post('eid'))) ? $this->input->post('eid') : '';

        $terms_conditions = array(
            'status' => $this->input->post('status'),
            'terms_conditions_data' => $this->input->post('terms_conditions_details_text'),
        );

        $terms_conditions_prev_data = array(
            'status' => '0',
            'updated_by' => $this->session->userdata('user_id'),
            'updated_at' => date('Y-m-d H:i:s')
        );
        $this->myadmin_model->update_data("terms_conditions", $terms_conditions_prev_data);
        // print_r($tour_details);
        // exit;
        if (empty($edit_id)) {
            $terms_conditions['created_by'] = $this->session->userdata('user_id');
            $terms_conditions['created_at'] = date('Y-m-d H:i:s');
            $terms_conditions['is_delete'] = '1';

            $last_inst_id = $this->myadmin_model->insert_data("terms_conditions", $terms_conditions);
            $msg = 'You have successfully added';
        } else {
            $cond = array(
                'id' => $edit_id
            );
            $terms_conditions['updated_by'] = $this->session->userdata('user_id');
            $terms_conditions['updated_at'] = date('Y-m-d H:i:s');
            $last_inst_id = $this->myadmin_model->update_data("terms_conditions", $terms_conditions, $cond);
            $msg = 'You have successfully edited';
        }

        if (!empty($last_inst_id)) {
            $rslt = array('status' => '101', 'msg' => $msg, 'data' => $last_inst_id);
        } else {
            $rslt = array('status' => '103', 'msg' => 'Something went wrong!', 'data' => '');
        }

        echo json_encode($rslt);
    }

    public function terms_conditions()
    {
        // echo "<pre>";
        if (empty($this->session->userdata('user_id'))) {
            redirect(base_url('login'));
        }

        $cond1 = array(
            'is_delete!=' => '0',
        );
        $data['terms_conditions_details'] = $this->myadmin_model->get_data("id,terms_conditions_data,status", "terms_conditions", $cond1, "", "", "desc", "id");

        // exit;
        $this->load->view('include/header');
        $this->load->view('tour_terms_and_conditions/index', $data);
        $this->load->view('include/footer');
    }

    public function terms_conditions_about_data()
    {
        $edit_id = (!empty($this->input->post('eid'))) ? $this->input->post('eid') : '';

        if (!empty($edit_id)) {
            $cond = array(
                'id' => $edit_id
            );
            $data = $this->myadmin_model->get_data('', "terms_conditions", $cond, "", "1");
            $rslt = array('status' => '101', 'msg' => '', 'data' => $data);
        } else {
            $rslt = array('status' => '103', 'msg' => '', 'data' => '');
        }

        echo json_encode($rslt);
    }

    public function tour_category_photos()
    {
        if (empty($this->session->userdata('user_id'))) {
            redirect(base_url('login'));
        }

        $cond1 = array(
            'is_delete!=' => '0',
            'status!=' => '0',
        );

        $data['tour_category_data'] = $this->myadmin_model->get_data("id,name", "tour_category", $cond1);

        $cond2 = array(
            'tour_category_photos.is_delete!=' => '0'
        );
        $join1 = array('table' => 'tour_category', 'condition' => 'tour_category.id=tour_category_photos.tour_category_id');
        $data['tour_photos'] = $this->myadmin_model->get_data('tour_category_photos.id,tour_category_photos.tour_category_id,tour_category_photos.trip_image,tour_category_photos.status,tour_category.name', "tour_category_photos", $cond2, [$join1], "", "desc", "tour_category_photos.id", "tour_category_photos.id,tour_category_photos.trip_image");

        $this->load->view('include/header');
        $this->load->view('tour_category_photo/index', $data);
        $this->load->view('include/footer');
    }

    public function tour_category_photos_details()
    {
        $edit_id = $this->input->post('eid');
        $msg = ''; // Initialize $msg variable
        $last_inst_id = null; // Initialize $last_inst_id
        $category_photos = array();
        $now = date('Y-m-d H:i:s'); // Initialize $now

        $category_photo = array(
            'tour_category_id' => $this->input->post('category_id'),
            'status' => $this->input->post('status'),
        );


        $this->myadmin_model->update_data("tour_category_photos", ['status' => '0'], ["tour_category_id" => $this->input->post('category_id')]);

        // Check if files are uploaded
        if (!empty($_FILES['category_photos']['name'])) {
            // Process each uploaded file
            $f_path = $_FILES['category_photos']['tmp_name'];
            $f_name = $_FILES['category_photos']['name'];

            // Check if the file is uploaded
            if (!empty($f_name)) {
                $i = uniqid();
                $f_arry = explode('.', $f_name);
                $f_new_name = $i . "_" . date('Y-m-d_H-i-s') . "." . end($f_arry);
                $img_path = 'assets/images/self_upload/' . $f_new_name;
                // Check if the file already exists
                if (file_exists($img_path)) {
                    $rslt = array('status' => '103', 'msg' => 'File with the same name already exists.', 'data' => '');
                    echo json_encode($rslt);
                    return;
                }

                $category_photo['trip_image'] = $img_path;


                if (!move_uploaded_file($f_path, $img_path)) {
                    $rslt = array('status' => '103', 'msg' => 'Failed to move the uploaded file.', 'data' => '');
                    echo json_encode($rslt);
                    return;
                }

                // Add the photo details to the array
                $category_photos[] = $category_photo;
            }
        }

        // Existing file path for the record being edited
        $existing_file_paths = array();

        if (!empty($edit_id)) {
            $f_cond = array('id' => $edit_id);
            $e_rslt = $this->myadmin_model->get_data("trip_image", "tour_category_photos", $f_cond, "", "", "", "1");
            foreach ($e_rslt as $e) {
                $existing_file_paths[] = $e->trip_image;
            }
        }
        // Now, you can loop through $category_photos to insert each photo
        if (!empty($category_photos)) {
            foreach ($category_photos as $category_photo) {
                // Remove the previous file associated with the record being edited
                if (!empty($existing_file_paths)) {
                    foreach ($existing_file_paths as $existing_file_path) {
                        if (!empty($existing_file_path) && file_exists($existing_file_path)) {
                            unlink($existing_file_path);
                        }
                    }
                }

                $now = date('Y-m-d H:i:s');
                if (empty($edit_id)) {
                    // Insert the photo details into the database
                    $category_photo['created_by'] = $this->session->userdata('user_id');
                    $category_photo['created_at'] = $now;
                    $category_photo['is_delete'] = '1';
                    $insert_result = $this->myadmin_model->insert_data("tour_category_photos", $category_photo);

                    if (!empty($insert_result)) {
                        $last_inst_id = $insert_result;
                        $msg = 'You have successfully added';
                    } else {
                        $msg = 'Failed to insert data.';
                        $rslt = array('status' => '103', 'msg' => $msg, 'data' => '');
                        echo json_encode($rslt);
                        return;
                    }
                }
            }
        }

        // Update code outside the loop
        if (!empty($edit_id)) {
            $cond = array('id' => $edit_id);
            $category_photo['updated_by'] = $this->session->userdata('user_id');
            $category_photo['updated_at'] = $now;
            $update_result = $this->myadmin_model->update_data("tour_category_photos", $category_photo, $cond);

            if ($update_result) {
                $last_inst_id = $edit_id;
                $msg = 'You have successfully edited';
            } else {
                $msg = 'Failed to update data.';
                $rslt = array('status' => '103', 'msg' => $msg, 'data' => '');
                echo json_encode($rslt);
                return;
            }
        }

        if (empty($last_inst_id)) {
            $rslt = array('status' => '103', 'msg' => 'Something went wrong!', 'data' => '');
            echo json_encode($rslt);
            return;
        } else {
            $rslt = array('status' => '101', 'msg' => $msg, 'data' => $last_inst_id);
        }

        echo json_encode($rslt);
    }

    public function edit_tour_category_photos_data()
    {
        $edit_id = (!empty($this->input->post('eid'))) ? $this->input->post('eid') : '';
        // echo "edit_id=> ".$edit_id;
        // exit;
        if (!empty($edit_id)) {
            $cond = array(
                'id' => $edit_id
            );
            $data = $this->myadmin_model->get_data('id,tour_category_id,trip_image,status', "tour_category_photos", $cond, "", "1");
            $rslt = array('status' => '101', 'msg' => '', 'data' => $data);
        } else {
            $rslt = array('status' => '103', 'msg' => '', 'data' => '');
        }

        echo json_encode($rslt);
    }

    public function travel_mate_images()
    {
        if (empty($this->session->userdata('user_id'))) {
            redirect(base_url('login'));
        }

        $cond = array(
            'is_delete!=' => '0'
        );

        $data['travel_mates_image'] = $this->myadmin_model->get_data('id,travel_mate_images,status', "travel_mates_images", $cond, "", "", "desc", "id", "id,travel_mate_images");

        $this->load->view('include/header');
        $this->load->view('travel_mates_image/index', $data);
        $this->load->view('include/footer');
    }

    public function travel_mate_images_details()
    {
        $edit_id = $this->input->post('eid');
        $msg = ''; // Initialize $msg variable
        $last_inst_id = null; // Initialize $last_inst_id
        $travel_mates_images = array();
        $now = date('Y-m-d H:i:s'); // Initialize $now


        $travel_mates_image = array(
            'status' => $this->input->post('status'),
        );

        // Check if files are uploaded
        if (!empty($_FILES['tarvel_mate_image']['name'])) {
            // Process each uploaded file
            foreach ($_FILES['tarvel_mate_image']['name'] as $key => $f_name) {
                $f_path = $_FILES['tarvel_mate_image']['tmp_name'][$key];

                // Check if the file is uploaded
                if (!empty($f_name) && is_uploaded_file($f_path)) {
                    $i = uniqid();
                    $f_arry = explode('.', $f_name);
                    $f_new_name = $i . "_" . date('Y-m-d_H-i-s') . "." . end($f_arry);
                    $img_path = 'assets/images/self_upload/' . $f_new_name;

                    // Check if the file already exists
                    if (file_exists($img_path)) {
                        $rslt = array('status' => '103', 'msg' => 'File with the same name already exists.', 'data' => '');
                        echo json_encode($rslt);
                        return;
                    }

                    $travel_mates_image['travel_mate_images'] = $img_path;


                    if (!move_uploaded_file($f_path, $img_path)) {
                        $rslt = array('status' => '103', 'msg' => 'Failed to move the uploaded file.', 'data' => '');
                        echo json_encode($rslt);
                        return;
                    }

                    // Add the photo details to the array
                    $travel_mates_images[] = $travel_mates_image;
                }
            }
        }

        // Existing file path for the record being edited
        $existing_file_paths = array();

        if (!empty($edit_id)) {
            $f_cond = array('id' => $edit_id);
            $e_rslt = $this->myadmin_model->get_data("travel_mate_images", "travel_mates_images", $f_cond, "", "", "", "1");
            foreach ($e_rslt as $e) {
                $existing_file_paths[] = $e->travel_mate_images;
            }
        }

        // Now, you can loop through $travel_mates_images to insert each photo
        if (!empty($travel_mates_images)) {
            foreach ($travel_mates_images as $travel_mates_image) {
                // Remove the previous file associated with the record being edited
                if (!empty($existing_file_paths)) {
                    foreach ($existing_file_paths as $existing_file_path) {
                        if (!empty($existing_file_path) && file_exists($existing_file_path)) {
                            unlink($existing_file_path);
                        }
                    }
                }

                $now = date('Y-m-d H:i:s');

                if (empty($edit_id)) {
                    // Insert the photo details into the database
                    $travel_mates_image['created_by'] = $this->session->userdata('user_id');
                    $travel_mates_image['created_at'] = $now;
                    $travel_mates_image['is_delete'] = '1';

                    $insert_result = $this->myadmin_model->insert_data("travel_mates_images", $travel_mates_image);

                    if (!empty($insert_result)) {
                        $last_inst_id = $insert_result;
                        $msg = 'You have successfully added';
                    } else {
                        $msg = 'Failed to insert data.';
                        $rslt = array('status' => '103', 'msg' => $msg, 'data' => '');
                        echo json_encode($rslt);
                        return;
                    }
                }
            }
        }

        // Update code outside the loop
        if (!empty($edit_id)) {
            $cond = array('id' => $edit_id);
            $travel_mates_image['updated_by'] = $this->session->userdata('user_id');
            $travel_mates_image['updated_at'] = $now;
            $update_result = $this->myadmin_model->update_data("travel_mates_images", $travel_mates_image, $cond);

            if ($update_result) {
                $last_inst_id = $edit_id;
                $msg = 'You have successfully edited';
            } else {
                $msg = 'Failed to update data.';
                $rslt = array('status' => '103', 'msg' => $msg, 'data' => '');
                echo json_encode($rslt);
                return;
            }
        }

        if (empty($last_inst_id)) {
            $rslt = array('status' => '103', 'msg' => 'Something went wrong!', 'data' => '');
            echo json_encode($rslt);
            return;
        }

        $rslt = array('status' => '101', 'msg' => $msg, 'data' => $last_inst_id);
        echo json_encode($rslt);
    }

    public function edit_travel_mates_image_data()
    {
        $edit_id = (!empty($this->input->post('eid'))) ? $this->input->post('eid') : '';
        // echo "edit_id=> ".$edit_id;
        // exit;
        if (!empty($edit_id)) {
            $cond = array(
                'id' => $edit_id
            );
            $data = $this->myadmin_model->get_data('id,travel_mate_images,status', "travel_mates_images", $cond, "", "1");
            $rslt = array('status' => '101', 'msg' => '', 'data' => $data);
        } else {
            $rslt = array('status' => '103', 'msg' => '', 'data' => '');
        }

        echo json_encode($rslt);
    }

    public function set_log_out()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
