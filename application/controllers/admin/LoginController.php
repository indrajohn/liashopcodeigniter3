<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	public function login()
	{
		$data['head'] = ['login'];
		$data['has_error'] = $this->checklogin();
		$this->load->view('admin/auth/login', $data);
	}
	public function register()
	{
		$data['head'] = ['register'];
		$this->load->view('admin/auth/register', $data);
	}
	public function forgotPassword()
	{
		$data['head'] = ['forgot_password'];
		$data['has_error'] = false;
		$this->load->view('admin/auth/forgot-password', $data);
	}
	public function checklogin()
	{

		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		$has_error = false;


		if ($has_error) {
			redirect('/');
		}
		return $has_error;
	}
}