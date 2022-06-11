<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Phpml\Association\Apriori;

class Landing_page extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$samples = [
			['roti', 'selai', 'mentega'],
			['roti', 'mentega'],
			['roti', 'susu', 'mentega'],
			['coklat', 'roti', 'susu', 'mentega'],
			['coklat', 'susu']
		];
		$labels  = [1, 2, 3, 4, 5];

		$associator = new Apriori($support = 0.3, $confidence = 0.8);


		$associator->train($samples, $labels);

		echo "<pre>";
		// PREDIKSI
		var_dump($associator->predict(['roti', 'mentega']));

		// HASIL
		var_dump($associator->getRules());

		// FREQUENT
		// var_dump($associator->apriori());
	}
}
