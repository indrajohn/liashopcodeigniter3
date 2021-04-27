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
		$this->sendEmail();
		$data['head'] = ['register'];
		$this->load->view('admin/auth/register', $data);
	}

	private function sendEmail(){
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'indrajohn2@gmail.com', // change it to yours
			'smtp_pass' => 'Bajingan1~', // change it to yours
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
		);
		$this->load->library('email', $config);
		$message = 'Registration Success';
		$this->email->set_newline("\r\n");
		$this->email->from('indrajohn2@gmail.com'); // change it to yours
		$this->email->to('indrajohn2@gmail.com');// change it to yours
		$this->email->subject('Resume from JobsBuddy for your Job posting');
		$this->email->message($message);
		if($this->email->send())
		{
			echo 'Email sent.';
		}
		else
		{
			echo 'Email Not sent.';
		}
	}
	public function forgotPassword()
	{
		$data['head'] = ['forgot_password'];
		$data['has_error'] = false;
		$this->load->view('admin/auth/forgot-password', $data);
	}
	public function emailConfirmation()
	{
		$data['head'] = ['email_confirmation'];
		$this->load->view('admin/auth/email_confirmation', $data);
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
