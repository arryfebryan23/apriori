<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing_page extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$sql = "SELECT * FROM master_layanan WHERE deleted_at IS NULL ORDER BY layanan ASC;";
		$data['master_layanan'] = $this->db->query($sql);

		$this->load->view('landing_page', $data);
	}
}
