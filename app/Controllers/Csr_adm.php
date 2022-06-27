<?php

namespace App\Controllers;

class Csr_adm extends BaseController {
	
	public function __construct()
	{
		$this->session = \Config\Services::session();
	}

	public function index() {
		return view('csrhealth_adm/page_login');
	}

	public function adm_index() {
		if (!$this->session->get('logged_in') == true) {
			session()->setFlashdata('loginfirst', 'login');
			return redirect()->to('/csr_adm');
		}
		return view('csrhealth_adm/index');
	}

	public function adm_result() {
		if (!$this->session->get('logged_in') == true) {
			session()->setFlashdata('loginfirst', 'login');
			return redirect()->to('/csr_adm');
		}
		return view('csrhealth_adm/result');
	}

}