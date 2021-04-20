<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SubCategoryController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/SubCategory');
    }
    public function clear_field_data()
    {
        $_POST = array();
        $this->_field_data = array();
        return $this;
    }
    public function subCategoryList()
    {
        $data['head'] = 'subcategory';
        $data['data'] = $this->SubCategory->getSubCategory();
        $this->load->view('admin/sub_category/list-sub-category', $data);
    }
    public function subCategoryAdd()
    {
        $this->form_validation->set_rules('subcategoryname', 'subcategoryname', 'required');
        if ($this->form_validation->run() != FALSE) {
            $categoryName = $this->input->post("subcategoryname");
            $this->debug->debug($categoryName);
            $data = array(
                "name" => $categoryName
            );
            $this->Category->insertCategory($data);

            $this->clear_field_data();
        }
        $this->load->view('admin/sub_category/add-sub-category');
    }

    public function subCategoryEdit()
    {
        $id = $this->input->post('sub_category_id');
        $data['data'] = $this->Category->getCategoryById($id);
        $this->form_validation->set_rules('subcategoryname', 'subcategoryname', 'required');
        if ($this->form_validation->run() != FALSE) {

            $categoryName = $this->input->post("subcategoryname");
            $dataUpdated = array(
                "name" => $categoryName
            );
            $this->Category->editCategory($id, $dataUpdated);

            $this->clear_field_data();
            redirect("admin/sub-category");
        }
        $this->load->view('admin/category/edit-category', $data);
    }
    public function subCategoryDelete()
    {
        $id = $this->input->post('sub_category_id');

        if ($id != NULL) {
            echo "<script type='text/javascript'> if(confirm('Are You Sure Want To Delete This Data ? ')){
				" . $this->Category->deleteCategory($id) . " console.log('NOT OKE');
			}
			else{
				console.log('NOT OKE');
			} </script>";
        }
        redirect('admin/category');
    }
}
