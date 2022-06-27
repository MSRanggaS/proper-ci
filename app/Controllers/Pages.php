<?php

namespace App\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;

class Pages extends BaseController {
	/**
	 * Instance of the main Request object.
	 *
	 * @var HTTP\IncomingRequest
	 */
	protected $request;

	public function __construct() {
		$this->session = \Config\Services::session();
		$this->AspectModel = model('App\Models\AspectModel');
		$this->SubaspectModel = model('App\Models\SubaspectModel');
		$this->QuestionModel = model('App\Models\QuestionModel');
		$this->ResultModel = model('App\Models\ResultModel');
		$this->AttempdetailModel = model('App\Models\AttempdetailModel');
	}

	public function index() {
		$aspect = $this->AspectModel->findAll();
		$data = [
			'title' => 'Persiapan Aspek Proper | Welcome!',
			'aspectproper' => $aspect,
		];
		return view('index', $data);
	}

	public function form($slug) {
		$aspect = $this->AspectModel
			->where('slug', $slug)
			->findAll();
		$subaspect = $this->SubaspectModel
			->where('id_aspectproper', $aspect[0]['id_aspectproper'])
			->findAll();
		$url = "https://dev.farizdotid.com/api/daerahindonesia/provinsi";
		$get_url = file_get_contents($url);
		$province = json_decode($get_url, true);
		$data = [
			'title' => 'Persiapan Aspek Proper | Start Test!',
			'province' => $province,
			'aspectproper' => $aspect,
			'subaspect' => $subaspect,
		];
		return view('form', $data);
	}

	public function attemp($slug) {
		if (!$this->session->get('is_legal') == true) {
			session()->setFlashdata('loginfirst', 'login');
			return redirect()->to('/');
		}

		$db_aspect = $this->AspectModel
			->where('slug', $slug)
			->findAll();
		$subaspect = $this->SubaspectModel
			->where('id_aspectproper', $db_aspect[0]['id_aspectproper'])
			->findAll();
		$questions = $this->QuestionModel
			->join('subaspect', 'questions.id_subaspect=subaspect.id_subaspect')
			->get()->getResultArray();

		$data = [
			'title' => 'Persiapan Aspek Proper | Testing',
			'aspectproper' => $db_aspect,
			'subaspect' => $subaspect,
			'questions' => $questions,
		];
		return view('attemp', $data);
	}

	public function result($ap, $idattemp) {
		$db_result = $this->ResultModel
			->join('respondent', 'respondent.id_respondent=attemp.id_respondent')
			->where('id_attemp', $idattemp)
			->findAll();

		//verification
		$hash = md5($db_result[0]['slug']);
		if (!$this->session->get('hash') == $hash) {
			session()->setFlashdata('notlegal', 'notlegal');
			return redirect()->to('/');
		}

		$db_attempdetail = $this->AttempdetailModel
			->join('questions', 'questions.id_question=attempdetail.id_question')
			->where('id_attemp', $db_result[0]['id_attemp'])->findAll();
		$db_aspect = $this->AspectModel->where('slug', $ap)->findAll();
		$db_saspect = $this->SubaspectModel->where('id_aspectproper', $db_aspect[0]['id_aspectproper'])->findAll();

		//get total points
		$totalpoints = 0;
		foreach ($db_saspect as $id_sa) {
			$questions = $this->QuestionModel->where('id_subaspect', $id_sa['id_subaspect'])->findAll();
			foreach ($questions as $point) {
				$totalpoints += $point['point'];
			}
		}

		//get total attemp points
		$attemppoints = 0;
		foreach ($db_attempdetail as $ad) {
			$attemppoints += $ad['getpoint'];
		}

		for ($z = 0; $z < count($db_saspect); $z++) {
			$label[$z] = $db_saspect[$z]['name'];
			$atp = 0;
			$qtp = 0;
			$qaspect = $this->QuestionModel->where('id_subaspect', $db_saspect[$z]['id_subaspect'])->findAll();
			foreach ($qaspect as $qa) {
				$qtp += $qa['point'];
			}

			foreach ($db_attempdetail as $atd) {
				if ($atd['id_subaspect'] == $db_saspect[$z]['id_subaspect']) {
					$atp += $atd['getpoint'];
				}
			}

			$per_point[$z] = $atp / $qtp * 100;
		}
		$js_label = json_encode($label);
		$js_perpoint = json_encode($per_point);

		$data = [
			'title' => 'Persiapan Aspek Proper | Result',
			'aspectproper' => $db_aspect,
			'attemp' => $db_result,
			'totalpoints' => $totalpoints,
			'attemppoints' => $attemppoints,
			'js_label' => $js_label,
			'js_perpoint' => $js_perpoint,
		];

		return view('result', $data);
	}

	public function resultdetail($ap, $slug) {
		$db_result = $this->ResultModel
			->join('respondent', 'respondent.id_respondent=attemp.id_respondent')
			->where('slug', $slug)
			->findAll();
		$db_attempdetail = $this->AttempdetailModel
			->join('questions', 'questions.id_question=attempdetail.id_question')
			->where('id_attemp', $db_result[0]['id_attemp'])->findAll();
		$db_aspect = $this->AspectModel->where('slug', $ap)->findAll();
		$db_saspect = $this->SubaspectModel->where('id_aspectproper', $db_aspect[0]['id_aspectproper'])->findAll();

		//get total points
		$totalpoints = 0;
		foreach ($db_saspect as $id_sa) {
			$questions = $this->QuestionModel->where('id_subaspect', $id_sa['id_subaspect'])->findAll();
			foreach ($questions as $point) {
				$totalpoints += $point['point'];
			}
		}

		//get total attemp points
		$attemppoints = 0;
		foreach ($db_attempdetail as $ad) {
			$attemppoints += $ad['getpoint'];
		}

		for ($z = 0; $z < count($db_saspect); $z++) {
			$label[$z] = $db_saspect[$z]['name'];
			$atp = 0;
			$qtp = 0;
			$qaspect = $this->QuestionModel->where('id_subaspect', $db_saspect[$z]['id_subaspect'])->findAll();
			foreach ($qaspect as $qa) {
				$qtp += $qa['point'];
			}

			foreach ($db_attempdetail as $atd) {
				if ($atd['id_subaspect'] == $db_saspect[$z]['id_subaspect']) {
					$atp += $atd['getpoint'];
				}
			}

			$attemppointaspect[$z] = $atp;
			$questionpointaspect[$z] = $qtp;
			$per_point[$z] = $atp / $qtp * 100;
		}
		$js_label = json_encode($label);
		$js_perpoint = json_encode($per_point);

		$handle = $this->AttempdetailModel
			->join('questions', 'questions.id_question=attempdetail.id_question')
			->join('subaspect', 'questions.id_subaspect=subaspect.id_subaspect')
			->where('id_attemp', $db_result[0]['id_attemp'])
			->where('answer', '0')->findAll();

		$data = [
			'title' => 'Persiapan Aspek Proper | Result',
			'aspectproper' => $db_aspect,
			'attemp' => $db_result,
			'handle' => $handle,
			'totalpoints' => $totalpoints,
			'attemppoints' => $attemppoints,
			'js_label' => $js_label,
			'js_perpoint' => $js_perpoint,
			'attemppointaspect' => $attemppointaspect,
			'questionpointaspect' => $questionpointaspect,
		];

		return view('resultdetail', $data);
	}

	function printpdf() {
		$options = new Options();
		$options->set('isRemoteEnabled', true);
		$dompdf = new Dompdf($options);

		$ap = $this->request->getGet('ap');
		$slug = $this->request->getGet('slug');

		$db_result = $this->ResultModel
			->join('respondent', 'respondent.id_respondent=attemp.id_respondent')
			->where('slug', $slug)
			->find();
		$db_attempdetail = $this->AttempdetailModel
			->join('questions', 'questions.id_question=attempdetail.id_question')
			->where('id_attemp', $db_result[0]['id_attemp'])->findAll();
		$db_aspect = $this->AspectModel->where('name', $ap)->findAll();
		$db_saspect = $this->SubaspectModel->where('id_aspectproper', $db_aspect[0]['id_aspectproper'])->findAll();

		//get total points
		$totalpoints = 0;
		foreach ($db_saspect as $id_sa) {
			$questions = $this->QuestionModel->where('id_subaspect', $id_sa['id_subaspect'])->findAll();
			foreach ($questions as $point) {
				$totalpoints += $point['point'];
			}
		}

		//get total attemp points
		$attemppoints = 0;
		foreach ($db_attempdetail as $ad) {
			$attemppoints += $ad['getpoint'];
		}

		for ($z = 0; $z < count($db_saspect); $z++) {
			$label[$z] = $db_saspect[$z]['name'];
			$atp = 0;
			$qtp = 0;
			$qaspect = $this->QuestionModel->where('id_subaspect', $db_saspect[$z]['id_subaspect'])->findAll();
			foreach ($qaspect as $qa) {
				$qtp += $qa['point'];
			}

			foreach ($db_attempdetail as $atd) {
				if ($atd['id_subaspect'] == $db_saspect[$z]['id_subaspect']) {
					$atp += $atd['getpoint'];
				}
			}

			$attemppointaspect[$z] = $atp;
			$questionpointaspect[$z] = $qtp;
			$per_point[$z] = $atp / $qtp * 100;
		}

		$handle = $this->AttempdetailModel
			->join('questions', 'questions.id_question=attempdetail.id_question')
			->join('subaspect', 'questions.id_subaspect=subaspect.id_subaspect')
			->where('id_attemp', $db_result[0]['id_attemp'])
			->where('answer', '0')->findAll();

		$ipaddress = $this->get_client_ip();
		$browser = $this->get_client_browser();
		$time = date('l, d-M-Y H:i:s a');
		$access = 'http://' . $_SERVER['HTTP_HOST'] . '/result_mail/view/detail/' . $db_aspect[0]['slug'] . '/' . $slug;

		$data = [
			'attemp' => $db_result,
			'handle' => $handle,
			'totalpoints' => $totalpoints,
			'attemppoints' => $attemppoints,
			'label' => $label,
			'perpoint' => $per_point,
			'attemppointaspect' => $attemppointaspect,
			'questionpointaspect' => $questionpointaspect,
			'ipaddress' => $ipaddress,
			'browser' => $browser,
			'time' => $time,
			'access' => $access,
		];

		$html = view('pdf_result', $data);
		$dompdf->loadHtml($html);

		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('A4', 'potrait');

		// Render the HTML as PDF
		$dompdf->render();

		// Output the generated PDF to Browser
		$dompdf->stream('Cek-persiapan-proper_by-olahkarsa_' . $db_result[0]['name'], array('Attachment' => 0));
		exit;
	}

	function get_city() {
		$request = \Config\Services::request();
		$id = $request->getVar('id');
		$url = "https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=$id";
		$get_url = file_get_contents($url);
		$kota = json_decode($get_url, true);
		$data = $kota['kota_kabupaten'];
		echo json_encode($data);
	}

	function get_client_ip() {
		$ipaddress = '';
		if (isset($_SERVER['HTTP_CLIENT_IP'])) {
			$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		} else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
			$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
		} else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
			$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
		} else if (isset($_SERVER['HTTP_FORWARDED'])) {
			$ipaddress = $_SERVER['HTTP_FORWARDED'];
		} else if (isset($_SERVER['REMOTE_ADDR'])) {
			$ipaddress = $_SERVER['REMOTE_ADDR'];
		} else {
			$ipaddress = 'IP tidak dikenali';
		}

		return $ipaddress;
	}

	function get_client_browser() {
		$browser = '';
		if (strpos($_SERVER['HTTP_USER_AGENT'], 'Netscape')) {
			$browser = 'Netscape';
		} else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox')) {
			$browser = 'Firefox';
		} else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome')) {
			$browser = 'Chrome';
		} else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera')) {
			$browser = 'Opera';
		} else if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE')) {
			$browser = 'Internet Explorer';
		} else {
			$browser = 'Other';
		}

		return $browser;
	}
}