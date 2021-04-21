<?php
defined('BASEPATH') or exit('No direct script access allowed');
class SubCategory extends CI_Model
{
    public function getSubCategory()
    {
        $data = $this->db->query("SELECT * FROM tbl_sub_category sc
        JOIN tbl_relationship_category rc
        on sc.sub_category_id = rc.sub_category_id
        JOIN tbl_category c
        on c.category_id = rc.category_id");
        return $data->result_array();
    }
    public function insertSubCategory($data)
    {
        $this->db->insert("tbl_sub_category", $data);
        return $this->db->insert_id();
    }
    public function deleteSubCategory($sub_category_id)
    {
        $this->db->query("DELETE sc,rc from tbl_sub_category sc
        JOIN tbl_relationship_category rc ON
        sc.sub_category_id = rc.sub_category_id
        JOIN tbl_category c ON
        c.category_id = rc.category_id
        WHERE sc.sub_category_id = '$sub_category_id'");
    }

    public function editSubCategory($data)
    {
        $category_id = $data['category_id'];
        $name = $data['name'];
        $sub_category_id = $data['sub_category_id']; 
        
       $this->db->query("UPDATE tbl_sub_category sc
        JOIN tbl_relationship_category rc ON
        sc.sub_category_id = rc.sub_category_id
        JOIN tbl_category c ON
        c.category_id = rc.category_id
        SET sc.name = '$name' , rc.category_id = '$category_id'
        WHERE sc.sub_category_id = '$sub_category_id'");
    }

    public function getSubCategoryById($id)
    {
        $data = $this->db->query("SELECT * 
        FROM tbl_sub_category sc
        JOIN tbl_relationship_category rc 
        ON sc.sub_category_id = rc.sub_category_id
        JOIN tbl_category c 
        ON c.category_id = rc.category_id
        WHERE sc.sub_category_id = $id");
         return $data->row();
    }

    public function getSubCategoryByIdCategory($id)
    {
        $data = $this->db->query("SELECT * 
        FROM tbl_sub_category sc
        JOIN tbl_relationship_category rc 
        ON sc.sub_category_id = rc.sub_category_id
        JOIN tbl_category c 
        ON c.category_id = rc.category_id
        WHERE rc.category_id = $id");

         return $data->result_array();
    }
    public function insertRelationshipSubCategory($data)
    {
        $this->db->insert("tbl_relationship_category", $data);
        return $this->db->insert_id();
    }
}
