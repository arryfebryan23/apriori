<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Phpml\Association\Apriori;

require_once FCPATH . '/vendor/autoload.php';
// include_once APPPATH . '/third_party/mpdf/mpdf.php';

class Apriori_c extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login');
		}
		$this->user = $this->ion_auth->user()->row();
	}

	public function index()
	{
		$data['page'] = 'apriori';
		$this->load->view('template_dashboard', $data);
	}

	public function hitung()
	{
		$data['support'] = 0.2;
		$data['confidence'] = 0.6;
		$data['start_date'] = '';
		$data['end_date'] = '';


		// $hasil = $this->analisa_apriori($this->input->post());
		$hasil = $this->analisa_apriori($data);
		$this->_insert_history($hasil);

		echo json_encode($hasil);
	}

	public function export_pdf()
	{
		$data = $this->analisa_apriori($this->input->post());

		$html = $this->load->view('print_analisa_pdf', $data, true);

		$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
		$mpdf->AddPage();
		$mpdf->setFooter(date('d, M Y H:i:s') . ' ~ Peterson Salon - {PAGENO}');
		$mpdf->WriteHTML($html);

		$mpdf->Output();
	}

	public function analisa_apriori($data)
	{
		$support = $data['support'];
		$confidence = $data['confidence'];
		$start_date = $data['start_date'];
		$end_date = $data['end_date'];

		if (!empty($start_date) && !empty($end_date)) {
			$where = "AND SUBSTRING(tanggal, 1, 10) BETWEEN  '${start_date}' AND '${end_date}'";
		} elseif (!empty($start_date)) {
			$where = "AND SUBSTRING(tanggal, 1, 10) >= '${start_date}'";
		} elseif (!empty($end_date)) {
			$where = "AND SUBSTRING(tanggal, 1, 10) <=  '${end_date}'";
		} else {
			$where = '';
		}

		$sql = "SELECT
						t.*
					FROM
						transaksi t
					JOIN transaksi_detail td ON
						td.id_transaksi = t.id
					WHERE
						t.status = '1'
						${where}
						AND td.deleted_at IS NULL
					GROUP BY t.id
					HAVING COUNT(td.id) > 1;";

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
						) AS id_layanan 
					FROM transaksi_detail td
					WHERE td.id_transaksi = {$row['id']};";
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
			'start_date' => $start_date ?? '-',
			'end_date' => $end_date ?? '-',
			'samples' => $data,
			'frequent' => $create_frequents,
			'result' => $result
		];

		return $hasil;
	}

	private function _insert_history($hasil)
	{
		$this->db->trans_start();
		$this->db->trans_strict(FALSE);


		// MASTER ANALISA
		$analisa = [
			'min_support'    => $hasil['support'],
			'min_confidence' => $hasil['confidence'],
			'start_date'     => $hasil['start_date'],
			'end_date'       => $hasil['end_date'],
			'created_at'     => date('Y-m-d H:i:s'),
			'created_by'	 => $this->user->id
		];
		$this->db->insert('analisa_apriori', $analisa);
		$id_analisa = $this->db->insert_id();

		// BEGIN SAMPLES
		$analis_samples = array();
		foreach ($hasil['samples'] as $r) {
			$temp = '';
			foreach ($r['itemset'] as $item) {
				$temp .= $item . ', ';
			}
			$item = substr($temp, 0, strlen($temp) - 2);

			$analis_samples[] = [
				'id_analisa'   => $id_analisa,
				'id_transaksi' => $r['id_transaksi'],
				'nama'         => $r['nama'],
				'tanggal'      => $r['tanggal'],
				'itemset'      => $item
			];
		}
		// END SAMPLES

		// BGEIN FREQUENT
		$analisa_frequent = array();
		$i = 0;
		foreach ($hasil['frequent'] as $row) {
			$i++;
			foreach ($row as $r) {
				$temp = '';
				foreach ($r['itemset'] as $item) {
					$temp .= $item . ', ';
				}
				$item = substr($temp, 0, strlen($temp) - 2);
				$analisa_frequent[] = [
					'id_analisa' => $id_analisa,
					'iterasi'    => $i,
					'item'       => $item,
					'frequency'  => $r['frequency'],
					'support'    => $r['support']
				];
			}
		}
		// END FREQUENT

		// BEGIN HASIL
		$analisa_result = array();
		foreach ($hasil['result'] as $r) {
			$temp = '';
			foreach ($r['antecedent'] as $item) {
				$temp .= $item . ', ';
			}
			$antecedent = substr($temp, 0, strlen($temp) - 2);

			$temp = '';
			foreach ($r['consequent'] as $item) {
				$temp .= $item . ', ';
			}
			$consequent = substr($temp, 0, strlen($temp) - 2);

			$analisa_result[] = [
				'id_analisa' => $id_analisa,
				'antecedent' => $antecedent,
				'consequent' => $consequent,
				'support'    => $r['support'],
				'confidence' => $r['confidence']
			];
		}
		// END HASIL


		$this->db->insert_batch('analisa_apriori_samples',  $analis_samples);
		$this->db->insert_batch('analisa_apriori_result', $analisa_result);
		$this->db->insert_batch('analisa_apriori_frequent', $analisa_frequent);
		$this->db->trans_complete();


		if ($this->db->trans_status() === FALSE) {
			# Something went wrong.
			$this->db->trans_rollback();
			return FALSE;
		} else {
			# Everything is Perfect. 
			# Committing data to the database.
			$this->db->trans_commit();
			return TRUE;
		}
	}
}
