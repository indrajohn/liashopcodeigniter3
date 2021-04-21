<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SubCategoryController extends CI_Controller
{
    public $success = 0;
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/SubCategory');
        $this->load->model('admin/Category');
    }
    public function subCategoryList()
    {
        $data['data'] = $this->SubCategory->getSubCategory();
        $this->load->view('admin/sub_category/list-sub-category', $data);
    }
    public function subCategoryAdd()
    {
        
        $this->form_validation->set_rules('subcategoryname', 'subcategoryname', 'required');
        $this->form_validation->set_rules('category', 'category', 'required');
        if ($this->form_validation->run() != FALSE) {
            $subCategoryName = $this->input->post("subcategoryname");
            $category_id = $this->input->post("category");
            $dataCategory = array(
                "name" => $subCategoryName
            );
          
            $sub_category_id = $this->SubCategory->insertSubCategory($dataCategory);
            $dataRelationshipCategory = array(
                "category_id" => $category_id,
                "sub_category_id" => $sub_category_id
            );
            $this->SubCategory->insertRelationshipSubCategory($dataRelationshipCategory);
            $this->success = 1;
        }
        $data['action'] = 'add';
        $data['category'] = $this->Category->getCategory();
        $data['success'] = $this->success;
        $this->load->view('admin/sub_category/add-sub-category',$data);
    }

    public function subCategoryEdit()
    {
      
        $id = $this->uri->segment(4);
        $this->form_validation->set_rules('subcategoryname', 'subcategoryname', 'required');
        $this->form_validation->set_rules('category', 'category', 'required');
        if ($this->form_validation->run() != FALSE) {
            $subCategoryName = $this->input->post("subcategoryname");
            $category_id = $this->input->post("category");

            $data = array(
                "name" => $subCategoryName,
                "category_id" => $category_id,
                "sub_category_id" => $id
            );
            $this->SubCategory->editSubCategory($data);
            $this->success = 1;
        }

        $data['data'] = $this->SubCategory->getSubCategoryById($id);
        $data['action'] = 'edit';
        $data['category'] = $this->Category->getCategory();
        $data['success'] = $this->success;
        $this->load->view('admin/sub_category/add-sub-category', $data);
    }
    public function subCategoryDelete()
    {
        $id = $this->uri->segment(4);
        $this->SubCategory->deleteSubCategory($id);
        redirect('admin/sub-category');
    }
}
