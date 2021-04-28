<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{
	var $user = '';
	var $pass = '';
	var $has_error = '';

	function __construct()
	{
		parent::__construct();
		$this->load->model('auth/User');
	}
	public function login()
	{
		$this->user = $this->input->post('username');
		$this->pass = $this->input->post('password');
		$email = $this->input->get('email');
		if($email!=''){
			$this->sendEmail($email);
		}
		$data['head'] = ['login'];

		$this->checklogin();
		if($this->checkAdmin() && $this->has_error == 'false'){
			redirect('admin/dashboard');
		}
		else{
			if($this->isEmailConfirm() && $this->has_error == 'false'){
				redirect('/');
			}else if($this->has_error == 'false'){
				$this->has_error = 'email';
				$email = $this->User->getEmail($this->user,$this->pass);
				$this->debug->debug($email);
				$data['email'] = $email;
			}
			$data['has_error'] = $this->has_error;
			$this->load->view('admin/auth/login', $data);
		}
	}
	public function Complete(){
		$email = $this->input->get('email');
		$data['head'] = ['complete'];
		$data['has_error'] = $this->has_error;
		$dataUpdate = array(
			"emailConfirmYn" => "Y"
		);
		$this->User->updateEmailConfirmation($email,$dataUpdate);
		$this->load->view('admin/auth/email_complete', $data);
	}
	public function register()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_email_check');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[20]');
        $this->form_validation->set_rules('confirm-password', 'Confirm Password', 'trim|required|callback_checkpassword|min_length[8]|max_length[20]');
		if (count($_POST) != 0){
			if($this->form_validation->run() != FALSE){
					$username = $this->input->post('username');
					$email = $this->input->post('email');
					$password = $this->input->post('password');
					$confirmPassword = $this->input->post('confirm-password');
					$this->debug->debug($password);
					$this->debug->debug($confirmPassword);
					if($password == $confirmPassword){
						$error_password = null;
					}
				}
			else{
				$this->debug->debug("masuk sini");
			}
		}
		
		$data['head'] = ['register'];
		$this->load->view('admin/auth/register', $data);
	}
	
	public function checkpassword()
	{
		$password = $this->input->post('password');
		$confirmPassword = $this->input->post('confirm-password');
		
		if($password != $confirmPassword){
			$this->form_validation->set_message('checkpassword', 'The Confirm Password not match');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	public function email_check($str)
	{
		$email = $this->User->checkEmail($str);
		$this->debug->debug("email: ".$email);
		if($email == true){
			$this->form_validation->set_message('email_check', 'Email is already taken');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	public function sendEmail1(){
		$email = $this->input->get('email');
		$this->sendEmail($email);
	}
	public function sendEmail($email){
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'idbuatdijual0001@gmail.com', // change it to yours
			'smtp_pass' => 'Bajingan1~', // change it to yours
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
		);
		$this->load->library('email', $config);
		$message = "Registration Success<br>Please click this link for confirmation <a href='".base_url()."email-confirmation/complete?email=$email'>Click Here</a>";
		$this->email->set_newline("\r\n");
		$this->email->from('indrajohn2@gmail.com'); // change it to yours
		$this->email->to($email);// change it to yours
		$this->email->subject('Email Confirmation for Lia Shop');
		$this->email->message($message);
		if($this->email->send())
		{
			redirect("email-confirmation?email=$email");
		}
		else
		{
			show_error($this->email->print_debugger());
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
		$email = $this->input->get('email');
		$data['head'] = ['email_confirmation'];
		$data['email'] = $email;
		$this->load->view('admin/auth/email_confirmation', $data);
	}
	private function checkAdmin(){
		return $this->User->is_admin($this->user,$this->pass);
	}
	private function checklogin()
	{
		if($this->user!='' && $this->pass!=''){
			$this->has_error = $this->User->can_login($this->user,$this->pass) ? 'false' : 'user';
		}
	}
	private function isEmailConfirm(){
		return $this->User->is_email_confirm($this->user,$this->pass);
	}
	
}
