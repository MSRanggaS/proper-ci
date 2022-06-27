<?php

namespace App\Controllers;

class Aspect extends BaseController {
	/**
	 * Instance of the main Request object.
	 *
	 * @var HTTP\IncomingRequest
	 */
	protected $request;

	
	public function __construct()
	{
		$this->session = \Config\Services::session();
		$this->AspectModel = model('App\Models\AspectModel');
		$this->SubaspectModel = model('App\Models\SubaspectModel');
	}

	public function adm_aspect() {
		if (!$this->session->get('logged_in') == true) {
			session()->setFlashdata('loginfirst', 'login');
			return redirect()->to('/csr_adm');
		}
		$aspectproper = $this->AspectModel->getAspectProper();
		$data = [
			'aspectproper' => $aspectproper,
		];
		return view('csrhealth_adm/aspect', $data);
	}

	public function subaspect($id) {
		if (!$this->session->get('logged_in') == true) {
			session()->setFlashdata('loginfirst', 'login');
			return redirect()->to('/csr_adm');
		}
		$subaspect = $this->SubaspectModel
			->where('id_aspectproper', $id)
			->findAll();
		$aspect = $this->AspectModel
			->where('id_aspectproper', $id)
			->findAll();
		$data = [
			'subaspect' => $subaspect,
			'aspect' => $aspect,
		];
		return view('csrhealth_adm/subaspect', $data);
	}

	public function addaspect() {
		if (!$this->validate([
			'name' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi',
				],
			],
			'detail' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi',
				],
			],
			'image' => [
				'rules' => 'uploaded[image]|mime_in[image,image/jpg,image/jpeg,image/png]|max_size[image,5120]',
				'errors' => [
					'uploaded' => 'Harus Ada File yang diupload',
					'mime_in' => 'File Extention Harus Berupa jpg,jpeg, atau png',
					'max_size' => 'Ukuran File Maksimal 5 MB',
				],
			],
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->back()->withInput();
		} else {
			$dataImage = $this->request->getFile('image');
			$fileName = $dataImage->getRandomName();
			$slug = preg_replace('/[^a-z0-9]+/i', '', trim(strtolower($this->request->getVar('name'))));
			$store = [
				'name' => $this->request->getVar('name'),
				'detail' => $this->request->getVar('detail'),
				'image' => $fileName,
				'slug' => $slug,
			];
			$dataImage->move('uploads/image/', $fileName);
			$this->AspectModel->insert($store);

			return redirect()->to("/csr_adm/adm_aspect");
		}
	}

	public function addsubaspect() {
		if (!$this->validate([
			'name' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi',
				],
			],
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->back()->withInput();
		} else {
			$id_aspectproper = $this->request->getVar('id_aspectproper');
			$store = [
				'id_aspectproper' => $id_aspectproper,
				'name' => $this->request->getVar('name'),
			];

			$this->SubaspectModel->insert($store);

			return redirect()->to("/csr_adm/adm_aspect/$id_aspectproper");
		}
	}

	public function delaspect($id) {
		if ($this->request->getVar('valid-true') == $this->request->getVar('valid-input')) {
			$line = $this->AspectModel->find($id);
			unlink("uploads/image/".$line['image']);
			$this->AspectModel->delete($id);
			session()->setFlashdata('successdelete', 'success');
			return redirect()->back();
		} else {
			session()->setFlashdata('faildelete', 'failed');
			return redirect()->back();
		}
	}

	public function delsubaspect($id) {
		if ($this->request->getVar('valid-true') == $this->request->getVar('valid-input')) {
			$this->SubaspectModel->delete($id);
			session()->setFlashdata('successdelete', 'success');
			return redirect()->back();
		} else {
			session()->setFlashdata('faildelete', 'failed');
			return redirect()->back();
		}
	}
}