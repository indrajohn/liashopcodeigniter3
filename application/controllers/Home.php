<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/SubCategory');
		$this->load->model('admin/Category');
		$this->load->model('admin/Product');
	}
	public function index()
	{
		$data = [
			"head" => "home"
		];
		$this->load->view('home/home', $data);
	}
	public function aboutUs()
	{
		$data = [
			"head" => "aboutus"
		];
		$this->load->view('home/about-us', $data);
	}
	public function contactUs()
	{
		$data = [
			"head" => "contactus"
		];
		$this->load->view('home/contact-us', $data);
	}
	public function product()
	{
		$category_id = $this->input->get('category_id');
		$sub_category_id = $this->input->get('sub_category_id');
		
		$data = [
			"head" => "product"
		];
		if($category_id != "" && $sub_category_id != ""){
			$data['dataProduct'] = $this->Product->getProductBySubCategory($sub_category_id);
		}
		else{
			$data['dataProduct'] = $this->Product->getProduct();
		}
		
		$data['dataCategory'] = $this->Category->getCategory();
		$dataSubCategory = $this->SubCategory->getSubCategory();
		$data['dataSubCategory'] = $dataSubCategory;
		$data['subCategoryNow'] = $sub_category_id;
		$data['dataCategoryNow'] = $category_id;
		$this->load->view('home/product', $data);
	}
	public function shopCart()
	{
		$data = [
			"head" => "cart"
		];
		$this->load->view('home/shop-cart', $data);
	}
	public function checkout()
	{
		$data = [
			"head" => "checkout"
		];
		$this->load->view('home/checkout', $data);
	}
	public function favourite()
	{
		$data = [
			"head" => "favourite"
		];
		$this->load->view('home/favourite', $data);
	}
	public function productDetails()
	{
		$data = [
			"head" => "productDetails"
		];
		$this->load->view('home/product-details', $data);
	}
}
