<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CategoryController extends CI_Controller
{
    public $success = 0;
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Category');
    }
    public function categoryList()
    {
        $data['data'] = $this->Category->getCategory();
        $this->load->view('admin/category/list-category', $data);
    }
    public function categoryAdd()
    {
        $this->form_validation->set_rules('categoryname', 'categoryname', 'required');
        if ($this->form_validation->run() != FALSE) {
            $categoryName = $this->input->post("categoryname");
            $this->debug->debug($categoryName);
            $data = array(
                "category_name" => $categoryName
            );
            $this->Category->insertCategory($data);
            $this->success = 1;
        }
        $data['action'] = 'add';
        $data['success'] = $this->success;
        $this->load->view('admin/category/add-category',$data);
    }

    public function categoryEdit()
    {
        $id = $this->uri->segment(4);
        $this->form_validation->set_rules('categoryname', 'categoryname', 'required');
        if ($this->form_validation->run() != FALSE) {
            $categoryName = $this->input->post("categoryname");
            $data = array(
                "category_name" => $categoryName
            );
            $this->Category->editCategory($id,$data);
            $this->success = 1;
            
        }
        $data['action'] = 'edit';
        $data['success'] = $this->success;
        $data['data'] = $this->Category->getCategoryById($id);
        $this->load->view('admin/category/add-category',$data);
    }
    public function categoryDelete()
    {
        $id = $this->uri->segment(4);
        $this->Category->deleteCategory($id);
        redirect('admin/category');
    }
}
