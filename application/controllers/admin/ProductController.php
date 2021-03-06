<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProductController extends CI_Controller
{
    var $success = 0;
    function __construct()
    {
        parent::__construct();
        $this->upload_path = $_SERVER['DOCUMENT_ROOT'] . '/liashop/upload/product/';
        $this->load->model('admin/Product');
        $this->load->model('admin/Category');
        $this->load->model('admin/SubCategory');
    }
    private function _uploadImage($nama, $upload_path)
    {
        $config['upload_path'] =  $this->upload_path;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $nama;
        $config['overwrite']            = true;
        $config['max_size']             = 5000;
        $this->upload->initialize($config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }
        if ($this->upload->display_errors() != '') {
            $this->debug->debug("masuk error");
            return $this->upload->display_errors();
        } else {
            if ($this->upload->do_upload('image')) {
                $this->debug->debug("masuk images");
                return $this->upload->data("file_name");
            } else {
                return "default.jpg";
            }
        }
    }

    public function productList()
    {
        $data['head'] = 'product';
        $data['data'] = $this->Product->getProduct();
        $this->load->view('admin/product/list-product', $data);
    }

    public function productAdd1()
    {
        $dataCategory['dataCategory'] = $this->Category->getCategory();
        $dataCategory['status'] = $this->status;
        $this->load->view('admin/product/add-product', $dataCategory);
    }

    public function productAdd()
    {
        $this->form_validation->set_rules('productName', 'Product Name', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('sub_category', 'Sub Category', 'required');
        $this->form_validation->set_rules('discount', 'Discount', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('stock', 'Stock', 'required');

        if ($this->form_validation->run() != FALSE) {
            $productName = $this->input->post("productName");
            $price = $this->input->post("price");
            $category = $this->input->post("category");
            $subCategory = $this->input->post("sub_category");
            $discount = $this->input->post("discount");
            $pod_desc = $this->input->post("pod_desc");
            $stock = $this->input->post("stock");
            $pricefix = str_replace("Rp.","",$price);
            $pricefix = str_replace(".","",$pricefix);
            
            $url_photo = $this->_uploadImage($productName, $this->upload_path);
            $this->debug->debug($url_photo);
            if (str_contains($url_photo, ".jpg") ||
                str_contains($url_photo, ".png") ||
                str_contains($url_photo, ".jpeg") ||
                str_contains($url_photo, ".gif")) {
                $this->debug->debug("masuk contains");
                $data = array(
                    "product_name" => $productName,
                    "product_price" => $pricefix,
                    "category_id" => $category,
                    "product_discount" => $discount,
                    "product_stock" => $stock,
                    "product_desc" => $pod_desc,
                    'product_url' => $url_photo
                );
                $product_id =$this->Product->insertProduct($data);

                $dataRelationshipProduct = array(
                    "product_id" => $product_id,
                    "sub_category_id" => $subCategory
                );

                $this->Product->insertRelationshipProduct($dataRelationshipProduct);
                $this->success = 1;
            } else {
                $this->debug->debug("tidak contains");
                $this->success = $url_photo;
            }
        }

        $data['action'] = 'add';
        $data['category'] = $this->Category->getCategory();
        $data['success'] = $this->success;
        $this->load->view('admin/product/add-product', $data);
    }

    public function get_sub_category()
    {
        $category_id = $this->input->post('id', TRUE);
        $data = $this->SubCategory->getSubCategoryByIdCategory($category_id);
        echo json_encode($data);
    }

    public function productEdit()
    {
        $id = $this->uri->segment(4);

        $this->form_validation->set_rules('productName', 'Product Name', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('sub_category', 'Sub Category', 'required');
        $this->form_validation->set_rules('discount', 'Discount', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('stock', 'Stock', 'required');

        if ($this->form_validation->run() != FALSE) {
            $productName = $this->input->post("productName");
            $price = $this->input->post("price");
            $category = $this->input->post("category");
            $subCategory = $this->input->post("sub_category");
            $discount = $this->input->post("discount");
            $pod_desc = $this->input->post("pod_desc");
            $stock = $this->input->post("stock");
            $pricefix = str_replace("Rp.","",$price);
            $pricefix = str_replace(".","",$pricefix);
            
            if (!empty($_FILES["image"]["name"])) {
                $this->debug->debug("masuk image");
                $url_photo = $this->_uploadImage($productName, $this->upload_path);
            } else {
                $this->debug->debug("tidak masuk image");
                $url_photo = $this->input->post("url_photo");
            }
            $this->debug->debug($url_photo);
            if (str_contains($url_photo, ".jpg") ||
                str_contains($url_photo, ".png") ||
                str_contains($url_photo, ".jpeg") ||
                str_contains($url_photo, ".gif")) {
                    $data = array(
                        "product_id" => $id,
                        "product_name" => $productName,
                        "product_price" => $pricefix,
                        "product_desc" => $pod_desc,
                        "product_discount" => $discount,
                        "category_id" => $category,
                        "product_stock" => $stock,
                        'sub_category_id' => $subCategory,
                        'product_url' => $url_photo
                    );
                    $this->Product->editProduct($data);
                    $this->success = 1;
                } else {
                $this->debug->debug("tidak contains");
                $this->success = $url_photo;
            }
        }
        $data['product'] = $this->Product->getProductById($id);
        $data['action'] = 'edit';
        $data['category'] = $this->Category->getCategory();
        $data['success'] = $this->success;
        $this->load->view('admin/product/add-product', $data);
    }
    public function validateEditProduct()
    {
        $id = $this->input->post('id');
        $data['data'] = $this->Product->getProductById($id);
        $this->form_validation->set_rules('productName', 'productName', 'required');
        $this->form_validation->set_rules('price', 'price', 'required');
        $this->form_validation->set_rules('stock', 'stock', 'required');
        $this->form_validation->set_rules('product_desc', 'product_desc', 'required');
        if ($this->form_validation->run() != FALSE) {
            $productName = $this->input->post("productName");
            $price = $this->input->post("price");
            $product_desc = $this->input->post("product_desc");
            $discount = $this->input->post("discount");
            $category = $this->input->post("category");
            $stock = $this->input->post("stock");
            if (!empty($_FILES["image"]["name"])) {
                $this->debug->debug("masuk image");
                $url_photo = $this->_uploadImage($productName, $this->upload_path);
            } else {
                $this->debug->debug("tidak masuk image");
                $url_photo = $this->input->post("url_photo");
            }
            $this->debug->debug($url_photo);
            $dataUpdated = array(
                "product_name" => $productName,
                "product_price" => $price,
                "product_desc" => $product_desc,
                "product_discount" => $discount,
                "category_id" => $category,
                "product_stock" => $stock,
                'product_url' => $url_photo
            );
            $this->Product->editProduct($id, $dataUpdated);

            redirect("admin/product");
        }
    }
    public function productDelete()
    {
        $id = $this->uri->segment(4);
        $this->Product->deleteProduct($id);
        redirect('admin/product');
    }
   
}
