<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing_page extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index_bak()
	{
		$sql = "SELECT * FROM master_layanan WHERE deleted_at IS NULL ORDER BY layanan ASC;";
		$data['master_layanan'] = $this->db->query($sql);

		$this->load->view('landing_page', $data);
	}

	public function index()
	{
		$sql = "SELECT * FROM master_layanan WHERE deleted_at IS NULL ORDER BY layanan ASC;";
		$data['master_layanan'] = $this->db->query($sql);

		$sql = "SELECT td.id_transaksi, ml.layanan FROM transaksi t 
					JOIN transaksi_detail td ON t.id = td.id_transaksi
					JOIN master_layanan ml ON td.id_layanan = ml.id
					WHERE SUBSTR(t.tanggal,1,10) = '" . date('Y-m-d') . "';";

		$detail_transaksi = $this->db->query($sql)->result();

		$temp = array();
		foreach ($detail_transaksi as $row) {
			$temp[$row->id_transaksi][] = $row->layanan;
		}

		$data['detail_transaksi'] = $temp;

		$sql = "SELECT t.*, SUM(td.harga)  
					FROM transaksi t 
					JOIN transaksi_detail td ON td.id_transaksi = t.id AND td.deleted_at IS NULL
					WHERE SUBSTR(t.tanggal,1,10) = '" . date('Y-m-d') . "' 
					GROUP BY t.id ORDER BY t.id DESC LIMIT 5;";

		$data['transaksi'] = $this->db->query($sql);
		$this->load->view('landing_page_2', $data);
	}

	public function jadwal_transaksi()
	{
		$tanggal = $this->input->post('tanggal');

		$sql = "SELECT td.id_transaksi, ml.layanan FROM transaksi t 
					JOIN transaksi_detail td ON t.id = td.id_transaksi
					JOIN master_layanan ml ON td.id_layanan = ml.id
					WHERE SUBSTR(t.tanggal,1,10) = '${tanggal}';";

		$detail_transaksi = $this->db->query($sql)->result();

		$temp = array();
		foreach ($detail_transaksi as $row) {
			$temp[$row->id_transaksi][] = $row->layanan;
		}

		$data['detail_transaksi'] = $temp;

		$sql = "SELECT t.*, SUM(td.harga)  
					FROM transaksi t 
					JOIN transaksi_detail td ON td.id_transaksi = t.id AND td.deleted_at IS NULL
					WHERE SUBSTR(t.tanggal,1,10) = '${tanggal}'
					GROUP BY t.id ORDER BY t.id DESC LIMIT 5;";

		$data['transaksi'] = $this->db->query($sql)->result();

		echo json_encode($data);
	}
}
