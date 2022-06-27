<?php

namespace App\Controllers;

class Respondent extends BaseController {
	/**
	 * Instance of the main Request object.
	 *
	 * @var HTTP\IncomingRequest
	 */
	protected $request;
	
	public function __construct()
	{
		$this->session = \Config\Services::session();
		$this->RespondentModel = model('App\Models\RespondentModel');
		$this->ResultModel = model('App\Models\ResultModel');
	}
	

	public function review() {
		if (!$this->session->get('logged_in') == true) {
			session()->setFlashdata('loginfirst', 'login');
			return redirect()->to('/csr_adm');
		}
		$respondents = $this->RespondentModel
			->join('attemp', 'attemp.id_respondent=respondent.id_respondent')
			->where('status', 'review')
			->findAll();
		$data = [
			'respondents' => $respondents,
		];
		return view('csrhealth_adm/respondent_review', $data);
	}

	public function valid() {
		if (!$this->session->get('logged_in') == true) {
			session()->setFlashdata('loginfirst', 'login');
			return redirect()->to('/csr_adm');
		}
		$respondents = $this->RespondentModel
			->join('attemp', 'attemp.id_respondent=respondent.id_respondent')
			->where('status', 'verified')
			->findAll();
		$data = [
			'respondents' => $respondents,
		];
		return view('csrhealth_adm/respondent_valid', $data);
	}

	public function draft() {
		if (!$this->session->get('logged_in') == true) {
			session()->setFlashdata('loginfirst', 'login');
			return redirect()->to('/csr_adm');
		}
		$respondents = $this->RespondentModel
			->where('status', 'draft')
			->findAll();
		$data = [
			'respondents' => $respondents,
		];
		return view('csrhealth_adm/respondent_draft', $data);
	}

	public function store_user() {
		$id = $this->request->getVar('province');
		$url = "https://dev.farizdotid.com/api/daerahindonesia/provinsi/$id";
		$get_url = file_get_contents($url);
		$province = json_decode($get_url, true);
		$prov = $province['nama'];

		// generate random
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 10; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

		if (!$this->validate([
			'respondent' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi',
				],
			],
			'position' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi',
				],
			],
			'phone' => [
				'rules' => 'required|min_length[10]',
				'errors' => [
					'required' => '{field} Harus diisi',
					'min_length' => 'No telepon tidak valid',
				],
			],
			'name' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi',
				],
			],
			'street_name' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi',
				],
			],
			'city' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi',
				],
			],
			'province' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi',
				],
			],
			'email' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi',
				],
			],
			'agreement' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus disetujui',
				],
			],
			'emailcheck' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus disetujui',
				],
			],
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->back()->withInput();
		} else {
			$store = [
				'rand_auth' => $randomString,
				'respondent' => $this->request->getVar('respondent'),
				'position' => $this->request->getVar('position'),
				'phone' => $this->request->getVar('phone'),
				'name' => $this->request->getVar('name'),
				'street_name' => $this->request->getVar('street_name'),
				'street_number' => $this->request->getVar('street_number'),
				'city' => $this->request->getVar('city'),
				'province' => $prov,
				'email' => $this->request->getVar('email'),
				'status' => 'draft',
			];

			$s = [
				'rand_auth' => $randomString,
				'email' => $this->request->getVar('email'),
				'is_legal' => true,
			];

			$this->session->set($s);

			$this->RespondentModel->insert($store);
			$slug = $this->request->getVar('slug');
			return redirect()->to("/attemp/$slug");
		}
	}

	public function drop($id) {
		$this->RespondentModel->delete(['id' => $id]);
		return redirect()->back();
	}

	public function val($id) {
		$this->RespondentModel->update($id, [
			'status' => 'verified'
		]);
		return redirect()->back();
	}

	public function inval($id) {
		$this->RespondentModel->update($id, [
			'status' => 'review'
		]);
		return redirect()->back();
	}
}