<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Product extends CI_Model
{
    public function insertProduct($produk)
    {
        $this->db->set($produk);
        $this->db->insert('tbl_product');
    }
    public function getProduct()
    {
        $data = $this->db->query("SELECT p.*,k.category_name FROM tbl_product p left join tbl_category k on k.category_id = p.category_id");
        return $data->result_array();
    }
    public function deleteProduct($id)
    {
        $this->db->where('product_id', $id);
        $this->db->delete('tbl_product');
    }
    public function editProduct($id, $data)
    {
        $this->db->where('product_id', $id);
        $this->db->update('tbl_product', $data);
    }
    public function getProductById($id)
    {
        $data = $this->db->query("SELECT * FROM tbl_product where product_id ='$id'");
        return $data->row();
    }
    public function getSearchByCategory($category_id, $from, $to)
    {
        $data = $this->db->query("SELECT p.*,k.category_name
                                    FROM tbl_product p
                                    left join tbl_category k
                                    on k.category_id = p.category_id
                                    where p.category_id = '$category_id'
                                    limit $from,$to");
        return $data->result_array();
    }
}