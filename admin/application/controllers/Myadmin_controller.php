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

        $cond = array('id' => $eid);
        $updt_data = array(
            'is_delete' => '0'
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

        $data['tour_details'] = $this->myadmin_model->get_data("tours.id,tours.name,tours.main_image,tours.difficulty,tours.seat_availability,place.name as place_name,tour_category.name as tour_category_name,tours.status", "tours", $cond, $join, "", "desc", "id");


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
            $data = $this->myadmin_model->get_data('id,name,place_id,tour_category_id,difficulty,seat_availability,status,main_image', "tours", $cond, "", "1");
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

        $data['tour_destination_details'] = $this->myadmin_model->get_data("tours.name,tour_details.*", "tour_details", $cond, [$join1], "", "desc", "id");

        $cond1 = array(
            'tours.is_delete!=' => '0',
            'tours.status!=' => '0'
        );
        $data['tours_data'] = $this->myadmin_model->get_data("id,name", "tours", $cond1, "", "", "", "");

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
            // 'tour_about.status!=' => '0'
        );
        $join1 = array('table' => 'tours', 'condition' => 'tours.id=tour_about.tours_id');
        $data['tour_about_details'] = $this->myadmin_model->get_data("tour_about.id,tour_about.tours_id,tour_about.tour_about_details,tour_about.status,tours.name", "tour_about", $cond2, [$join1], "", "", "");

        $cond1 = array(
            'is_delete!=' => '0',
            'status!=' => '0',
        );
        $ids_arry = array();
        foreach ($data['tour_about_details'] as $val) {
            $ids_arry[] = $val->tours_id;
        }
        // print_r($ids_arry);
        // $data['tours_data'] = $this->myadmin_model->get_data("id,name", "tours", $cond1, "", "", "", "", "", "", "id", $ids_arry);
        $data['tours_data'] = $this->myadmin_model->get_data("id,name", "tours", $cond1);

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
            'is_delete!=' => '0',
            'status!=' => '0',
        );
        $data['tours_data'] = $this->myadmin_model->get_data("id,name", "tours", $cond1);


        $cond2 = array(
            'tour_itinerary_main.is_delete!=' => '0'
        );
        $join1 = array('table' => 'tours', 'condition' => 'tours.id=tour_itinerary_main.tours_id');
        $join2 = array('table' => 'tour_itinerary_sub', 'condition' => 'tour_itinerary_sub.itinery_main_id=tour_itinerary_main.id');
        $join = [$join1, $join2];
        $data['tour_itinerary_details'] = $this->myadmin_model->get_data("tour_itinerary_main.id,tour_itinerary_main.itinerary,tour_itinerary_main.status,tours.name,tour_itinerary_sub.itinerary_sub", "tour_itinerary_main", $cond2, $join, "", "desc", "tour_itinerary_main.id");

        // exit;
        $this->load->view('include/header');
        $this->load->view('tour_itinerary/index', $data);
        $this->load->view('include/footer');
    }


    public function tour_itinerary_details()
    {
        // echo "<per>";
        // print_r($_POST);
        // exit;

        $edit_id = (!empty($this->input->post('eid'))) ? $this->input->post('eid') : '';
        $itinerary = $this->input->post('itinerary');
        $itinerary_descriptions = $this->input->post('itinerary_descriptions');

        $tour_itenary = array(
            'tours_id' => $this->input->post('tours_id'),
            'status' => $this->input->post('status'),
        );



        // print_r($tour_itenary);
        // print_r($itinerary);
        // print_r($itinerary_descriptions);
        // exit;
        if (empty($edit_id)) {
            $tour_itenary['created_by'] = $this->session->userdata('user_id');
            $tour_itenary['created_at'] = date('Y-m-d H:i:s');
            $tour_itenary['is_delete'] = '1';
            foreach ($itinerary as $key => $val) {
                if (!empty($itinerary[$key]) && !empty($itinerary_descriptions[$key])) {
                    $tour_itenary['itinerary'] = $itinerary[$key];
                    $last_inst_id = $this->myadmin_model->insert_data("tour_itinerary_main", $tour_itenary);

                    $tour_itenary_sub = array(
                        'itinery_main_id' => $last_inst_id,
                        'itinerary_sub' => $itinerary_descriptions[$key],
                        'status' => $this->input->post('status'),
                        'created_by' => $this->session->userdata('user_id'),
                        'created_at' => date('Y-m-d H:i:s'),
                        'is_delete' => '1'
                    );
                    $last_inst_id = $this->myadmin_model->insert_data("tour_itinerary_sub", $tour_itenary_sub);
                }
            }
            // $last_inst_id = $this->myadmin_model->insert_data("tour_about", $tour_itenary);
            $msg = 'You have successfully added';
        } else {
            $cond = array(
                'tour_itinerary_main.id' => $edit_id
            );
            $tour_itenary['updated_by'] = $this->session->userdata('user_id');
            $tour_itenary['updated_at'] = date('Y-m-d H:i:s');

            foreach ($itinerary as $key => $val) {
                if (!empty($itinerary[$key]) && !empty($itinerary_descriptions[$key])) {
                    $tour_itenary['itinerary'] = $itinerary[$key];
                    // $last_inst_id = $this->myadmin_model->insert_data("tour_itinerary_main", $tour_itenary);
                    $last_inst_id = $this->myadmin_model->update_data("tour_itinerary_main", $tour_itenary, $cond);


                    $cond1 = array(
                        'tour_itinerary_sub.itinery_main_id' => $edit_id,
                        'tour_itinerary_sub.status' => '1',
                        'tour_itinerary_sub.is_delete' => '1',
                    );
                    $tour_itenary_sub = array(
                        'itinerary_sub' => $itinerary_descriptions[$key],
                        'updated_by' => $this->session->userdata('user_id'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    );
                    // $last_inst_id = $this->myadmin_model->insert_data("tour_itinerary_sub", $tour_itenary_sub);

                    $last_inst_id = $this->myadmin_model->update_data("tour_itinerary_sub", $tour_itenary_sub, $cond1);
                }
            }
            // $last_inst_id = $this->myadmin_model->update_data("tour_itinerary_main", $tour_itenary, $cond);
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
            $data = $this->myadmin_model->get_data('tour_itinerary_main.id,tour_itinerary_main.itinerary,tour_itinerary_main.status,tour_itinerary_sub.itinerary_sub', "tour_itinerary_main", $cond, [$join], "1");
            $rslt = array('status' => '101', 'msg' => '', 'data' => $data);
        } else {
            $rslt = array('status' => '103', 'msg' => '', 'data' => '');
        }

        echo json_encode($rslt);
    }
}
