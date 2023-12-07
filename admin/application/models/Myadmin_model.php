<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Myadmin_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->database();
    }


    public function get_data($specific_col = "", $table = "", $cond = "", $join = "", $fetching_type = "", $orderBy_type = "", $orderBy_col = "")
    {
        if (!empty($specific_col)) {
            $this->db->select($specific_col);
        } else {
            $this->db->select('*');
        }

        if (!empty($cond)) {
            $this->db->where($cond);
        }

        if (!empty($join)) {
            $this->db->join($join['table'], $join['condition']);
        }

        if (!empty($orderBy_type) && !empty($orderBy_col)) {
            $this->db->order_by($orderBy_col, $orderBy_type);
        }

        $query = $this->db->get($table);
        // echo $this->db->last_query();
        // exit;
        if (!empty($fetching_type) && $fetching_type == "single") {
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
