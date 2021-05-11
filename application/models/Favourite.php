<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Favourite extends CI_Model
{
    public function getFavourite($user_id)
    {
        $data = $this->db->query("SELECT * from tbl_favourite f join tbl_product p  on p.product_id = f.product_id where user_id = $user_id");
        return $data->result_array();
    }
    public function cekFavourite($data)
    {
        $user_id = $data['user_id']; 
        $product_id = $data['product_id']; 

        $query = $this->db->query("SELECT * from tbl_favourite where user_id = $user_id and product_id= $product_id");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function insertFavourite($data){
        $this->db->insert("tbl_favourite", $data);
    }
    public function deleteFavourite($data)
    {
        $user_id = $data['user_id']; 
        $product_id = $data['product_id']; 
        $this->db->query("DELETE FROM tbl_favourite where user_id = '$user_id' and product_id = '$product_id'");
    }

   
}
