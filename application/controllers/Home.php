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
		$this->load->model('Favourite');
		$this->load->model('Cart');
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
		if ($category_id != "" && $sub_category_id != "") {
			$dataProductReal = $this->Product->getProductBySubCategory($sub_category_id);
		} else {
			$dataProductReal = $this->Product->getProduct();
		}
		$user_id = $this->session->userdata('user_id');
		$is_favourite = false;
		if($user_id != NULL ){
			$dataFavourite = $this->Favourite->getFavourite($user_id);
			if(sizeof($dataProductReal)>0){
				for($i=0;$i<sizeof($dataProductReal);$i++){
					if(sizeof($dataFavourite)>0){
						for($z=0;$z<sizeof($dataFavourite);$z++){
							if($dataProductReal[$i]['product_id'] === $dataFavourite[$z]['product_id']){
								$dataProductReal[$i]['isFavourite'] = true;
							}
							else{
								$dataProductReal[$i]['isFavourite'] = false;
							}
						}
					}
					else{
						$dataProductReal[$i]['isFavourite'] = false;
					}
				}	
			}
		}
		$data['dataProduct'] = $dataProductReal;
		$data['dataCategory'] = $this->Category->getCategory();
		$dataSubCategory = $this->SubCategory->getSubCategory();
		$data['dataSubCategory'] = $dataSubCategory;
		$data['subCategoryNow'] = $sub_category_id;
		$data['dataCategoryNow'] = $category_id;
		$this->load->view('home/product', $data);
	}
	public function addWishlist(){
		$product_id = $this->input->post('product_id');
		$user_id = $this->session->userdata('user_id');
		$data = array(
			"user_id" => $user_id,
			"product_id" => $product_id
		);
		$is_favourite = $this->Favourite->cekFavourite($data);
		if($is_favourite){
			$this->Favourite->deleteFavourite($data);
		}
		else{
			$this->Favourite->insertFavourite($data);
		}
		echo json_encode($is_favourite);
	}
	public function shopCart()
	{
		$data = [
			"head" => "cart"
		];
		$this->load->view('home/shop-cart', $data);
	}
	public function insertShopCart()
	{
		$product_id = $this->input->post('product_id');
		$user_id = $this->input->post('user_id');
		$quantity = $this->input->post('quantity');
		if ($product_id != NULL) {
			$data = array(
				"category_name" => $product_id,
				"user_id" => $user_id,
				"product_total" => $quantity
			);
			$this->Cart->addCart($data);
		} else {
		}
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
		$user_id = $this->session->userdata('user_id');
		$dataFavourite = $this->Favourite->getFavourite($user_id);
		$data = array(
			"head" => "favourite",
			"dataFavourite" => $dataFavourite,
		);
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
