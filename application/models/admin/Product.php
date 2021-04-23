<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Product extends CI_Model
{
    public function insertProduct($produk)
    {
        $this->db->set($produk);
        $this->db->insert('tbl_product');
        return $this->db->insert_id();
    }
    public function getProduct()
    {
        $data = $this->db->query("SELECT p.*,sc.sub_category_id,sc.name,c.category_id,c.category_name FROM tbl_product p 
        left join tbl_relationship_product rp on rp.product_id = p.product_id
        left join tbl_sub_category sc on rp.sub_category_id = sc.sub_category_id
        left join tbl_relationship_category rc on rc.sub_category_id = sc.sub_category_id
        left join tbl_category c on rc.category_id = c.category_id");
        return $data->result_array();
    }
    public function deleteProduct($id)
    {
        $this->db->query("DELETE p,rp from tbl_product p
        JOIN tbl_relationship_product rp ON
        p.product_id = rp.product_id where p.product_id = $id");
    }
    public function editProduct($data)
    {
        $product_id = $data['product_id']; 
        $product_name = $data['product_name'];
        $product_desc = $data['product_desc']; 
        $product_url = $data['product_url'];
        $product_price = $data['product_price'];
        $product_discount = $data['product_discount']; 
        $product_stock = $data['product_stock'];
        $sub_category_id = $data['sub_category_id']; 
        
       $this->db->query("UPDATE tbl_product p
        JOIN tbl_relationship_product rp ON
        p.product_id = rp.product_id
        SET p.product_name = '$product_name' ,
        p.product_desc = '$product_desc' ,
        p.product_url = '$product_url' ,
        p.product_price = '$product_price' ,
        p.product_discount = '$product_discount' ,
        p.product_stock = '$product_stock' ,
        rp.sub_category_id = '$sub_category_id'
        WHERE p.product_id = '$product_id'");
    }
    public function getProductById($id)
    {
        $data = $this->db->query("SELECT p.*,sc.sub_category_id,sc.name,c.category_id,c.category_name FROM tbl_product p 
        left join tbl_relationship_product rp on rp.product_id = p.product_id
        left join tbl_sub_category sc on rp.sub_category_id = sc.sub_category_id
        left join tbl_relationship_category rc on rc.sub_category_id = sc.sub_category_id
        left join tbl_category c on rc.category_id = c.category_id
        where p.product_id = $id");
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

    public function insertRelationshipProduct($data)
    {
        $this->db->insert("tbl_relationship_product", $data);
        return $this->db->insert_id();
    }
}
