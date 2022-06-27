<?php

namespace App\Controllers;

class Question extends BaseController {
	/**
	 * Instance of the main Request object.
	 *
	 * @var HTTP\IncomingRequest
	 */
	protected $request;

	public function __construct() {
		$this->QuestionModel = model('App\Models\QuestionModel');
		$this->AspectModel = model('App\Models\AspectModel');
		$this->SubaspectModel = model('App\Models\SubaspectModel');
	}

	public function adm_question() {
		$session = \Config\Services::session();
		if (!$session->get('logged_in') == true) {
			session()->setFlashdata('loginfirst', 'login');
			return redirect()->to('/csr_adm');
		}

		$questions = $this->QuestionModel
			->join('subaspect', 'questions.id_subaspect=subaspect.id_subaspect')
			->get()->getResultArray();
		$aspectproper = $this->AspectModel->getAspectProper();
		$subaspect = $this->SubaspectModel->findAll();
		$data = [
			'questions' => $questions,
			'aspect' => $aspectproper,
			'subaspect' => $subaspect,
		];
		return view('csrhealth_adm/question', $data);
	}

	public function store() {
		if ($this->request->getVar('type') == "1") {
			if (!$this->validate([
				'question' => [
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Harus diisi',
					],
				],
				'aspect' => [
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Harus diisi',
					],
				],
				'point' => [
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Harus diisi',
					],
				],
				'handle' => [
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Harus diisi',
					],
				],
			])) {
				session()->setFlashdata('error', $this->validator->listErrors());
				return redirect()->back()->withInput();
			} else {
				$store = [
					'question' => $this->request->getVar('question'),
					'is_parent' => 1,
					'parent' => 0,
					'id_subaspect' => $this->request->getVar('aspect'),
					'point' => $this->request->getVar('point'),
					'handle' => $this->request->getVar('handle'),
				];
				$this->QuestionModel->insert($store);

				return redirect()->to('/csr_adm/adm_question');
			}

		} elseif ($this->request->getVar('type') == "2") {
			if (!$this->validate([
				'question' => [
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Harus diisi',
					],
				],
				'parent' => [
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Harus diisi',
					],
				],
			])) {
				session()->setFlashdata('error', $this->validator->listErrors());
				return redirect()->back()->withInput();
			} else {
				$question = $this->QuestionModel
				->where('id_question', $this->request->getVar('parent'))
				->findAll();
				$store = [
					'question' => $this->request->getVar('question'),
					'is_parent' => 2,
					'parent' => $this->request->getVar('parent'),
					'id_subaspect' => $question[0]['id_subaspect'],
					'point' => 0,
					'handle' => 'label',
				];
				$this->QuestionModel->insert($store);

				return redirect()->to('/csr_adm/adm_question');
			}

		} else {
			if (!$this->validate([
				'question' => [
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Harus diisi',
					],
				],
				'point' => [
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Harus diisi',
					],
				],
				'handle' => [
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Harus diisi',
					],
				],
				'label' => [
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Harus diisi',
					],
				],
			])) {
				session()->setFlashdata('error', $this->validator->listErrors());
				return redirect()->back()->withInput();
			} else {
				$question = $this->QuestionModel
				->where('id_question', $this->request->getVar('label'))
				->findAll();
				$store = [
					'question' => $this->request->getVar('question'),
					'is_parent' => 0,
					'parent' => $this->request->getVar('label'),
					'id_subaspect' => $question[0]['id_subaspect'],
					'point' => $this->request->getVar('point'),
					'handle' => $this->request->getVar('handle'),
				];
				$this->QuestionModel->insert($store);

				return redirect()->to('/csr_adm/adm_question');
			}

		}

	}

	public function edit($id) {
		$edit = $this->QuestionModel
			->join('subaspect', 'questions.id_subaspect=subaspect.id_subaspect')
			->where('id_question', $id)
			->findAll();
		$data = [
			'edit' => $edit,
		];
		return view('csrhealth_adm/question_edit', $data);
	}

	public function store_edit() {
		if (!$this->validate([
			'question' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi',
				],
			],
			'point' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi',
				],
			],
			'handle' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi',
				],
			],
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->back()->withInput();
		} else {
			$this->QuestionModel->update($this->request->getVar('id_question'), [
				'question' => $this->request->getVar('question'),
				'point' => $this->request->getVar('point'),
				'handle' => $this->request->getVar('handle'),
			]);

			return redirect()->to('/csr_adm/adm_question');
		}
	}

	public function destroy($id) {
		$this->QuestionModel->delete($id);
		return redirect()->to('/csr_adm/adm_question');
	}
}