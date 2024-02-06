<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Myfront_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->database();
    }

    public function get_data($specific_col = "", $table = "", $cond = "", $join = "", $fetching_type = "", $orderBy_type = "", $orderBy_col = "", $group_by = "", $limit_cnt = "", $where_not_in_field = "", $where_not_in_array = "", $search_data = "", $search_field = [])
    {
        if (!empty($specific_col)) {
            $this->db->select($specific_col);
        } else {
            $this->db->select('*');
        }

        if (!empty($join)) {
            if (is_array($join)) {
                foreach ($join as $join_arr_name) {
                    if (!empty($join_arr_name['type'])) {
                        $this->db->join($join_arr_name['table'], $join_arr_name['condition'], $join_arr_name['type']);
                    } else {
                        $this->db->join($join_arr_name['table'], $join_arr_name['condition']);
                    }
                }
            }
        }

        if (!empty($cond)) {
            $this->db->where($cond);
        }

        if (!empty($where_not_in_field) && !empty($where_not_in_array)) {
            $this->db->where_not_in($where_not_in_field, $where_not_in_array);
        }

        if (!empty($search_data) && !empty($search_field)) {
            // print_r($search_field);
            foreach ($search_field as $val) {
                // print_r($val);
                $this->db->like($val, $search_data);
            }
        }

        if (!empty($orderBy_type) && !empty($orderBy_col)) {
            $this->db->order_by($orderBy_col, $orderBy_type);
        }

        if (!empty($group_by)) {
            $this->db->group_by($group_by);
        }

        if (!empty($limit_cnt)) {
            $this->db->limit($limit_cnt);
        }

        $query = $this->db->get($table);
        // echo $this->db->last_query();
        // exit;
        if (!empty($fetching_type) && $fetching_type == "1") {
            return $query->row();
        } else {
            return $query->result();
        }
    }

    public function insert_data($table = "", $data = "")
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function update_data($table = "", $data = "", $cond = "")
    {
        $this->db->where($cond);
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }

    public function delete_data($table = "", $cond = "")
    {
        $this->db->where($cond);
        $this->db->delete($table);
        return $this->db->affected_rows();
    }
}
