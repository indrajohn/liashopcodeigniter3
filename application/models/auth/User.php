<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Model
{
    public function getUser()
    {
        $data = $this->db->query("SELECT * FROM tbl_user");
        return $data->result_array();
    }
    public function insertUser($data)
    {
        $this->db->insert("tbl_user", $data);
    }
    public function deleteUser($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('tbl_user');
    }

    public function editUser($id, $data)
    {
        $this->db->where('user_id', $id);
        $this->db->update('tbl_user', $data);
    }

    public function getUserById($id)
    {
        $data = $this->db->query("SELECT * FROM tbl_user where user_id = $id");
        return $data->row();
    }
    public function getUserIdByUsername($username)
    {
        $data = $this->db->query("SELECT * FROM tbl_user where username = '$username'");
        return $data->row();
    }
    public function can_login($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('tbl_user');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function is_admin($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->where('role', 'admin');
        $query = $this->db->get('tbl_user');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}