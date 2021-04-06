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
}