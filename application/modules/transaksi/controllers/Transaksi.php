<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
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
		$sql = "SELECT t.*, SUM(td.harga) harga 
					FROM transaksi t 
					JOIN transaksi_detail td ON td.id_transaksi = t.id AND td.deleted_at IS NULL
					GROUP BY t.id ORDER BY t.id DESC;";
		$data['transaksi'] = $this->db->query($sql);

		$data['page'] = 'transaksi';
		$this->load->view('template_dashboard', $data);
	}

	public function tambah()
	{
		$sql = "SELECT * FROM master_layanan WHERE deleted_at IS NULL ORDER BY layanan ASC;";
		$data['master_layanan'] = $this->db->query($sql);

		$data['page'] = 'tambah';
		$this->load->view('template_dashboard', $data);
	}

	public function insert()
	{
		$user     = $this->ion_auth->user()->row();
		$id_trans = $this->_generate_id($_POST['id_transaksi']);
		$post     = $this->input->post();

		// $this->db->trans_start(); # Starting Transaction
		// $this->db->trans_strict(FALSE);

		$transaksi = [
			'id_transaksi' => $id_trans,
			'nama'         => $post['nama'],
			'no_telp'      => $post['no_telp'],
			'email'        => $post['email'],
			'tanggal'      => $post['date'] . ' ' . $post['time'] . ':00',
			'status'       => $post['status'],
			'created_at'   => date('Y-m-d H:i:s'),
			'created_by'   => $user->id
		];

		$this->db->insert('transaksi', $transaksi);
		$insert_id = $this->db->insert_id();

		// GET MASTER LAYANAN
		$master_layanan = $this->db->select('id, layanan, harga')->get('master_layanan')->result();
		$temp = array();
		foreach ($master_layanan as $row) {
			$temp[$row->id] = [
				'layanan' => $row->layanan,
				'harga' => $row->harga,
			];
		}
		$master_layanan = $temp;

		// INSERT DETAIL
		foreach ($post['layanan'] as $row) {
			$insert_detail = [
				'id_transaksi' => $insert_id,
				'id_layanan'   => $row,
				'harga'        => $master_layanan[$row]['harga'],
				'created_at'   => date('Y-m-d H:i:s'),
				'created_by'   => $user->id,
				'updated_at'   => NULL,
				'updated_by'   => NULL,
				'deleted_at'   => NULL,
				'deleted_by'   => NULL
			];
			$this->db->insert('transaksi_detail', $insert_detail);
		}

		// $this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			# Something went wrong.
			$this->db->trans_rollback();
			$message = alert_error('Tambah data transaksi gagal!');
		} else {
			# Everything is Perfect. 
			# Committing data to the database.
			$this->db->trans_commit();
			$message = alert_success('Tambah data transaksi berhasil!');
		}
		$this->session->set_flashdata('message', $message);
		redirect('transaksi');
	}

	public function ubah($id_transaksi)
	{
		$sql = "SELECT *, t.id, SUM(td.harga) harga FROM transaksi t 
					JOIN transaksi_detail td ON t.id = td.id_transaksi AND td.deleted_at IS NULL
					WHERE t.id = '${id_transaksi}'
					GROUP BY t.id;";

		$data['transaksi'] = $this->db->query($sql)->row();

		$sql = "SELECT * FROM transaksi_detail td WHERE id_transaksi = '{$data['transaksi']->id_transaksi}' AND deleted_at IS NULL";
		$data['transaksi_detail'] = $this->db->query($sql)->result_array();
		$data['transaksi_detail'] = array_column($data['transaksi_detail'], 'id_layanan');

		$sql = "SELECT * FROM master_layanan WHERE deleted_at IS NULL ORDER BY layanan ASC;";
		$data['master_layanan'] = $this->db->query($sql);

		$data['page'] = 'ubah';
		$this->load->view('template_dashboard', $data);
	}

	public function update()
	{
		$user = $this->ion_auth->user()->row();
		$post = $this->input->post();

		$this->db->trans_start(); # Starting Transaction
		$this->db->trans_strict(FALSE);

		// DELETE LAYANAN
		$old_trans_detail = $this->db->get_where('transaksi_detail', ['id_transaksi' => $post['id_transaksi']])->result();
		foreach ($old_trans_detail as $row) {
			if (in_array($row->id_layanan, $post['layanan'])) {
				continue;
			};
			$delete_detail = [
				'updated_at' => date('Y-m-d H:i:s'),
				'updated_by' => $user->id,
				'deleted_at' => date('Y-m-d H:i:s'),
				'deleted_by' => $user->id
			];
			$this->db->update('transaksi_detail', $delete_detail, ['id' => $row->id]);
		}

		// GET MASTER LAYANAN
		$master_layanan = $this->db->select('id, layanan, harga')->get('master_layanan')->result();
		$temp = array();
		foreach ($master_layanan as $row) {
			$temp[$row->id] = [
				'layanan' => $row->layanan,
				'harga' => $row->harga,
			];
		}
		$master_layanan = $temp;

		// UPDATE LAYANAN BARU
		$trans_detail_exist = array_column($old_trans_detail, 'id_layanan');
		foreach ($post['layanan'] as $row) {
			if (in_array($row, $trans_detail_exist)) {
				$update_detail = [
					'harga'      => $master_layanan[$row]['harga'],
					'updated_at' => date('Y-m-d H:i:s'),
					'updated_by' => $user->id,
					'deleted_at' => NULL,
					'deleted_by' => NULL
				];
				$this->db->update('transaksi_detail', $update_detail, ['id_transaksi' => $post['id_transaksi'], 'id_layanan' => $row]);
			} else {
				$insert_detail = [
					'id_transaksi' => $post['id_transaksi'],
					'id_layanan'   => $row,
					'harga'        => $master_layanan[$row]['harga'],
					'created_at'   => date('Y-m-d H:i:s'),
					'created_by'   => $user->id,
					'updated_at'   => NULL,
					'updated_by'   => NULL,
					'deleted_at'   => NULL,
					'deleted_by'   => NULL
				];
				$this->db->insert('transaksi_detail', $insert_detail);
			};
		}

		$transaksi = [
			'nama'       => $post['nama'],
			'no_telp'    => $post['no_telp'],
			'email'      => $post['email'],
			'tanggal'    => $post['date'] . ' ' . $post['time'] . ':00',
			'status'     => $post['status'],
			'updated_at' => date('Y-m-d H:i:s'),
			'updated_by' => $user->id
		];
		$this->db->update('transaksi', $transaksi, ['id' => $post['id_transaksi']]);

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			# Something went wrong.
			$this->db->trans_rollback();
			$message = alert_error('Ubah data transaksi gagal!');
		} else {
			# Everything is Perfect. 
			# Committing data to the database.
			$this->db->trans_commit();
			$message = alert_success('Ubah data transaksi berhasil!');
		}
		$this->session->set_flashdata('message', $message);
		redirect('transaksi/ubah/' . $post['id_transaksi']);
	}

	private function _generate_id($id_transaksi = NULL)
	{
		$exist = $this->db->get_where('transaksi', ['id_transaksi' => $id_transaksi])->row();
		if ($exist) {
			$new_id = 'PTRS-' . rand(10000, 99999);
			$this->_generate_id($new_id);
		} else {
			return $id_transaksi;
		}
	}
}
