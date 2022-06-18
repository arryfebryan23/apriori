<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_layanan extends CI_Controller
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
		$data['layanan'] = $this->db->order_by('id', 'DESC')->get('master_layanan');
		$data['page'] = 'master_layanan';
		$this->load->view('template_dashboard', $data);
	}

	public function insert()
	{
		$post = $this->input->post();
		$data = [
			'layanan' => $post['layanan'],
			'harga' => $post['harga'],
			'created_by' => $this->ion_auth->user()->row()->id
		];

		$status = $this->db->insert('master_layanan', $data);

		if ($status) {
			$message = alert_success('Tambah data master layanan berhasil!');
		} else {
			$message = alert_error('Tambah data master layanan gagal!');
		}

		$this->session->set_flashdata('message', $message);
		redirect('master_layanan');
	}

	public function update()
	{

		$user = $this->ion_auth->user()->row();
		$post = $this->input->post();
		$delete = $post['is_aktif'];

		$data = [
			'layanan' => $post['layanan'],
			'harga' => $post['harga'],
			'updated_at' => date('Y-m-d H:i:s'),
			'updated_by' =>  $user->id,
		];

		if ($delete === 'false') {
			$data['deleted_at'] = date('Y-m-d H:i:s');
			$data['deleted_by'] = $user->id;
		} else {
			$data['deleted_at'] = NULL;
			$data['deleted_by'] = NULL;
		}

		$status = $this->db->update('master_layanan', $data, ['id' => $post['id']]);

		if ($status) {
			$message = alert_success('Ubah data master layanan berhasil!');
		} else {
			$message = alert_error('Ubah data master layanan gagal!');
		}

		$this->session->set_flashdata('message', $message);
		redirect('master_layanan');
	}
}
