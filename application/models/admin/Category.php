<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Category extends CI_Model
{
    public function getCategory()
    {
        $data = $this->db->query("SELECT * FROM tbl_category");
        return $data->result_array();
    }
    public function insertCategory($data)
    {
        $this->db->insert("tbl_category", $data);
    }
    public function deleteCategory($id)
    {
        $this->db->where('category_id', $id);
        $this->db->delete('tbl_category');
    }

    public function editCategory($id, $data)
    {
        $this->db->where('category_id', $id);
        $this->db->update('tbl_category', $data);
    }

    public function getCategoryById($id)
    {
        $data = $this->db->query("SELECT * FROM tbl_category where category_id = $id");
        return $data->row();
    }
}