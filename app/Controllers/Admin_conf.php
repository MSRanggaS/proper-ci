<?php

namespace App\Controllers;

class Admin_conf extends BaseController {
	/**
	 * Instance of the main Request object.
	 *
	 * @var HTTP\IncomingRequest
	 */
	protected $request;

	public function __construct()
	{
		$this->session = \Config\Services::session();
	}
	

	public function conf_admin() {
	    $session = \Config\Services::session();
		if (!$session->get('logged_in') == true) {
			session()->setFlashdata('loginfirst', 'login');
			return redirect()->to('/csr_adm');
		}
		$AdminModel = model('App\Models\AdminModel');
		$account = $AdminModel->findAll();
		$data = [
			'account' => $account,
		];
		return view('csrhealth_adm/conf_admin', $data);
	}

	public function register() {
		$AdminModel = model('App\Models\AdminModel');
		$session = \Config\Services::session();

		if (!$this->validate([
			'name' => [
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
			'password' => [
				'rules' => 'required|min_length[8]',
				'errors' => [
					'required' => '{field} Harus diisi',
				],
			],
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->back()->withInput();
		} else {
			$store = [
				'name' => $this->request->getVar('name'),
				'email' => $this->request->getVar('email'),
				'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
				'status' => 'active',
			];

			$AdminModel->insert($store);

			return redirect()->to('/csr_adm/conf_admin');
		}
	}

	public function login() {
		$AdminModel = model('App\Models\AdminModel');
		$session = \Config\Services::session();

		$email = $this->request->getVar('email');
		$password = $this->request->getVar('password');

		$user = $AdminModel->where('email', $email)->findAll();

		if (count($user) == 0) {
			session()->setFlashdata('wrongpass', 'login');
			return redirect()->to('/csr_adm');
		} else {
			if (password_verify($password, $user[0]['password'])) {
				$account = [
					'id' => $user[0]['id'],
					'email' => $user[0]['email'],
					'name' => $user[0]['name'],
					'logged_in' => true,
				];
				$session->set($account);
				return redirect()->to('/csr_adm/adm_index');
			} else {
				session()->setFlashdata('wrongpass', 'login');
				return redirect()->to('/csr_adm');
			}
		}
	}

	public function logout() {
		$session = \Config\Services::session();
		$session->destroy();

		return redirect()->to('/csr_adm');
	}
}