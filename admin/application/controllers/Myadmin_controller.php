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

            $result = $this->myadmin_model->get_data('users.id as user_id,users.name,users.user_role', 'user_auth', $cond, $join, "single");

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
            $data = $this->myadmin_model->get_data('id,name,status', "states", $cond, "", "single");
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
        $data['place_details'] = $this->myadmin_model->get_data("place.*,states.name as state_name", "place", $cond, $join, "", "desc", "place.id");


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
            $data = $this->myadmin_model->get_data('id,name,state,status', "place", $cond, "", "single");
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
            $data = $this->myadmin_model->get_data('id,name,status', "tour_category", $cond, "", "single");
            $rslt = array('status' => '101', 'msg' => '', 'data' => $data);
        } else {
            $rslt = array('status' => '103', 'msg' => '', 'data' => '');
        }

        echo json_encode($rslt);
    }
}
