<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data['page'] = 'dashboard';
		$this->load->view('template_dashboard', $data);
	}
}
