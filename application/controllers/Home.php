<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
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
		$data = [
			"head" => "product"
		];
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
