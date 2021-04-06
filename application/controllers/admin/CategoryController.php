<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CategoryController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Category');
    }
    public function clear_field_data()
    {
        $_POST = array();
        $this->_field_data = array();
        return $this;
    }
    public function categoryList()
    {
        $data['head'] = 'category';
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

            $this->clear_field_data();
        }
        $this->load->view('admin/category/add-category');
    }

    public function categoryEdit()
    {
        $id = $this->input->post('category_id');
        $data['data'] = $this->Category->getCategoryById($id);
        $this->form_validation->set_rules('categoryname', 'categoryname', 'required');
        if ($this->form_validation->run() != FALSE) {

            $categoryName = $this->input->post("categoryname");
            $dataUpdated = array(
                "category_name" => $categoryName
            );
            $this->Category->editCategory($id, $dataUpdated);

            $this->clear_field_data();
            redirect("admin/category");
        }
        $this->load->view('admin/category/edit-category', $data);
    }
    public function categoryDelete()
    {
        $id = $this->input->post('category_id');

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