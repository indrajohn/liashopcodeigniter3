<?php
defined('BASEPATH') or exit('No direct script access allowed');
class SubCategory extends CI_Model
{
    public function getSubCategory()
    {
        $data = $this->db->query("SELECT * FROM tbl_sub_category");
        return $data->result_array();
    }
    public function insertSubCategory($data)
    {
        $this->db->insert("tbl_sub_category", $data);
    }
    public function deleteSubCategory($id)
    {
        $this->db->where('sub_category_id', $id);
        $this->db->delete('tbl_sub_category');
    }

    public function editSubCategory($id, $data)
    {
        $this->db->where('sub_category_id', $id);
        $this->db->update('tbl_sub_category', $data);
    }

    public function getSubCategoryById($id)
    {
        $data = $this->db->query("SELECT * FROM tbl_sub_category where sub_category_id = $id");
        return $data->row();
    }
}
