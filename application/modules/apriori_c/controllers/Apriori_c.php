<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Phpml\Association\Apriori;

class Apriori_c extends CI_Controller
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
		$data['page'] = 'apriori';
		$this->load->view('template_dashboard', $data);
	}

	public function hitung()
	{
		$support = $this->input->post('support');
		$confidence = $this->input->post('confidence');
		$start_date = $this->input->post('start_date');
		$end_date = $this->input->post('end_date');


		if (!empty($start_date) && !empty($end_date)) {
			$where = "AND SUBSTRING(tanggal, 1, 10) BETWEEN  '${start_date}' AND '${end_date}';";
		} elseif (!empty($start_date)) {
			$where = "AND SUBSTRING(tanggal, 1, 10) >= '${start_date}';";
		} elseif (!empty($end_date)) {
			$where = "AND SUBSTRING(tanggal, 1, 10) <=  '${end_date}';";
		} else {
			$where = '';
		}

		$sql = "SELECT * FROM transaksi 
					WHERE status = '1'
					${where}";
		$data = $this->db->query($sql);
		$data = $data->result_array();

		$arr_sample = array();
		foreach ($data as $key => $row) {
			$sql = "SELECT 	(
							SELECT
								layanan
							FROM
								master_layanan ml
							WHERE
								ml.id = td.id_layanan
						)AS id_layanan FROM transaksi_detail td
					WHERE id_transaksi = {$row['id_transaksi']}";
			$res = $this->db->query($sql)->result_array();

			$arr_tmp = array();
			foreach ($res as $r) {
				$arr_tmp[] = $r['id_layanan'];
			}
			$arr_sample[] = array_values($arr_tmp);
			$data[$key]['itemset'] = $arr_tmp;
		}


		// $support = 0.3;
		// $confidence = 0.8;

		// Analisis pola frekuensi tinggi
		// Pembentukan aturan asosiatif

		$samples = $arr_sample;
		// $samples = [
		// 	['roti', 'selai', 'mentega'],
		// 	['roti', 'mentega'],
		// 	['roti', 'susu', 'mentega'],
		// 	['coklat', 'roti', 'susu', 'mentega'],
		// 	['coklat', 'susu']
		// ];
		$labels  = [];

		$associator = new Apriori($support, $confidence);
		$associator->train($samples, $labels);

		$frequent = $associator->apriori();
		$result = $associator->getRules();

		$create_frequents = array();
		foreach ($frequent as $key => $row) {
			foreach ($row as $k => $r) {
				$frequency_item = $associator->frequency($r);
				$support_item = $associator->support($r);

				$create_frequents[$key][$k]['itemset'] = $r;
				$create_frequents[$key][$k]['frequency'] = $frequency_item;
				$create_frequents[$key][$k]['support'] = $support_item;
			}
		}


		$hasil = [
			'support' => $support,
			'confidence' => $confidence,
			'start_date' => '2020-02-23',
			'end_date' => '2020-02-24',
			'samples' => $data,
			'frequent' => $create_frequents,
			'result' => $result
		];

		echo json_encode($hasil);
	}

	public function support()
	{
		// megandung A dibagi Total transaksi
	}
}
