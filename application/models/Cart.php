<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Cart extends CI_Model
{
    public function getCart($username)
    {
        $data = $this->db->query("SELECT c.*,p.product_id,p.product_name,p.product_price,p.product_discount,p.product_url
                                 FROM tbl_cart c 
                                 join tbl_user u 
                                 on c.user_id=u.user_id
                                 join tbl_product p 
                                 on c.product_id = p.product_id 
                                 where u.username='$username'");
        return $data->result_array();
    }
    public function getCountCart($username, $id)
    {
        $data = $this->db->query("SELECT c.product_id
                                    FROM tbl_cart c
                                    join tbl_user u 
                                    on c.user_id=u.user_id
                                    where u.username='$username' and c.product_id='$id'");
        return $data->num_rows();
    }
    public function deleteCartByID($username, $id)
    {
        $this->db->query("DELETE c.* 
                                    FROM tbl_cart c 
                                    join tbl_user u 
                                    on c.user_id=u.user_id
                                    where u.username='$username' and c.product_id='$id'");
    }
    public function updateTotalProduct($username, $id, $total_product)
    {
        $this->db->query("UPDATE tbl_cart c
                            join tbl_user u 
                            on c.user_id=u.id 
                            set c.product_total = '$total_product'
                         where u.username='$username' and c.product_id='$id'");
    }
    public function addCart($data)
    {
        $this->db->insert("tbl_cart", $data);
    }
    public function getTotalProduct($username, $id)
    {
        $data = $this->db->query("SELECT c.product_total
        FROM tbl_cart c 
        join tbl_user u 
        on c.user_id=u.user_id
        where u.username='$username' and c.product_id='$id'");
        $result = $data->row();
        return $result->total_produk;
    }
}