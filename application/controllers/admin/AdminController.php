<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	public function dashboard()
	{
		$this->debug->debug('hai');
		$this->load->view('admin/dashboard');
	}
}