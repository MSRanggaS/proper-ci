<?php

namespace App\Controllers;

class Result extends BaseController {
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
		$this->RespondentModel = model('App\Models\RespondentModel');
		$this->ResultModel = model('App\Models\ResultModel');
		$this->AttempdetailModel = model('App\Models\AttempdetailModel');
		$this->QuestionModel = model('App\Models\QuestionModel');
		$this->email = \Config\Services::email();
	}

	public function adm_result() {
		if (!$this->session->get('logged_in') == true) {
			session()->setFlashdata('loginfirst', 'login');
			return redirect()->to('/csr_adm');
		}
		$ResultModel = model('App\Models\ResultModel');
		$result = $ResultModel->getResult();
		$data = [
			'result' => $result,
		];
		return view('csrhealth_adm/result', $data);
	}

	public function getRandom($digit) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $digit; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	public function store_attemp() {
		$totalpoint = 0;
		$slug = $this->getRandom(20);
		$ap = $this->request->getVar('aspectproper');
		$db_aspect = $this->AspectModel->where('slug', $ap)->findAll();

		//checking slug
		if (!empty($this->ResultModel->where('slug', $slug)->findAll())) {
			$slug = $this->getRandom(20);
		}

		//get id_respondent
		$db_user = $this->RespondentModel->where('rand_auth', $this->session->get('rand_auth'))->findAll();
		$uid = $db_user[0]['id_respondent'];

		//create attemp to get id
		$attemp_data = [
			'id_respondent' => $uid,
			'aspect' => $db_aspect[0]['name'],
			'slug' => $slug,
		];
		$this->ResultModel->insert($attemp_data);

		//get id_attemp
		$db_attemp = $this->ResultModel->where('slug', $slug)->findAll();
		$aid = $db_attemp[0]['id_attemp'];

		//checking point + add database
		for ($i = 0; $i < $this->request->getVar('jmlsoal'); $i++) {
			$point = 0;
			$id_question = $this->request->getVar('idquestion-' . $i);
			$db_question = $this->QuestionModel->where('id_question', $id_question)->findAll();
			$question_point = $db_question[0]['point'];
			if ($this->request->getVar('qanswer-' . $i) == 1) {
				$point = $question_point;
				$totalpoint += $question_point;
			}

			$store = [
				'id_attemp' => $aid,
				'id_question' => $id_question,
				'answer' => $this->request->getVar('qanswer-' . $i),
				'getpoint' => $point,
			];
			$this->AttempdetailModel->insert($store);
		}

		for ($i = 0; $i < $this->request->getVar('jmlsubsoal'); $i++) {
			$point = 0;
			$id_question = $this->request->getVar('idsquestion-' . $i);
			$db_question = $this->QuestionModel->where('id_question', $id_question)->findAll();
			$question_point = $db_question[0]['point'];
			$checkanswer = $this->request->getVar('sqanswer-' . $i);
			if ($checkanswer == 1) {
				$point = $question_point;
				$totalpoint += $question_point;
			} else {
				$checkanswer = 0;
			}

			$this->AttempdetailModel->insert([
				'id_attemp' => $aid,
				'id_question' => $id_question,
				'answer' => $checkanswer,
				'getpoint' => $point,
			]);
		}

		//update attemp
		$this->ResultModel->update($aid, [
			"attemppoints" => $totalpoint,
		]);

		//update respondent
		$this->RespondentModel->update($uid, [
			"status" => 'review',
		]);
		
		//send email
		$link = 'http://proper.olahkarsa.com/result_mail/view/detail/'.$db_aspect[0]['slug'].'/'.$slug;
		$this->sendmail($db_user[0]['email'], $db_user[0]['respondent'], $link, $db_aspect[0]['name']);

		//remove session user
		$rem = ['rand_auth', 'name', 'email', 'is_legal'];
		$this->session->remove($rem);

		//set session for verification
		$hash = md5($slug);
		$this->session->set('hash', $hash);
		$this->session->markAsTempdata('hash', 300);

		return redirect()->to("/result/$ap/$aid");
	}
	
	public function testmail(){
	    $this->sendmail('tukangkode7@gmail.com', 'Irfanda', 'olahkarsa.com', 'Test');
	}

	private function sendmail($mailto, $name, $link, $aspek) {
		$this->email->setFrom('official@olahkarsa.com', 'Olahkarsa Official');
		$this->email->setTo($mailto);

		$this->email->setSubject('Hasil cek persiapan proper');
		$this->email->setMessage('
		<!DOCTYPE html>
		<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
			xmlns:o="urn:schemas-microsoft-com:office:office">

		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="x-apple-disable-message-reformatting">
			<title>Hasil Cek Persiapan Proper</title>

			<link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@400;500;700&display=swap" rel="stylesheet">

			<style>
				html,
				body {
					margin: 0 auto !important;
					padding: 0 !important;
					height: 100% !important;
					width: 100% !important;
				}

				* {
					-ms-text-size-adjust: 100%;
					-webkit-text-size-adjust: 100%;
				}

				div[style*="margin: 16px 0"] {
					margin: 0 !important;
				}

				table,
				td {
					mso-table-lspace: 0pt !important;
					mso-table-rspace: 0pt !important;
				}

				table {
					border-spacing: 0 !important;
					border-collapse: collapse !important;
					table-layout: fixed !important;
					margin: 0 auto !important;
				}

				img {
					-ms-interpolation-mode: bicubic;
				}

				a {
					text-decoration: none;
				}

				*[x-apple-data-detectors],
				.unstyle-auto-detected-links *,
				.aBn {
					border-bottom: 0 !important;
					cursor: default !important;
					color: inherit !important;
					text-decoration: none !important;
					font-size: inherit !important;
					font-family: inherit !important;
					font-weight: inherit !important;
					line-height: inherit !important;
				}

				.a6S {
					display: none !important;
					opacity: 0.01 !important;
				}

				.im {
					color: inherit !important;
				}

				img.g-img+div {
					display: none !important;
				}

				@media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
					u~div .email-container {
						min-width: 320px !important;
					}
				}
				@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
					u~div .email-container {
						min-width: 375px !important;
					}
				}

				@media only screen and (min-device-width: 414px) {
					u~div .email-container {
						min-width: 414px !important;
					}
				}
			</style>

			<style>
				.primary {
					background: #009ffd;
				}

				.bg_white {
					background: #ffffff;
				}

				.bg_light {
					background: #f7fafa;
				}

				.bg_black {
					background: #000000;
				}

				.bg_dark {
					background: rgba(0, 0, 0, .8);
				}

				.email-section {
					padding: 2.5em;
				}

				.blueline {
					background-color: #009ffd;
					height: 5px;
				}

				.btn {
					padding: 10px 15px;
					display: inline-block;
				}

				.btn.btn-primary {
					background: #009ffd;
					color: #ffffff;
				}

				.btn.btn-white {
					border-radius: 5px;
					background: #ffffff;
					color: #000000;
				}

				.btn.btn-white-outline {
					border-radius: 5px;
					background: transparent;
					border: 1px solid #fff;
					color: #fff;
				}

				.btn.btn-black-outline {
					border-radius: 0px;
					background: transparent;
					border: 2px solid #000;
					color: #000;
					font-weight: 700;
				}

				.btn-custom {
					color: rgba(0, 0, 0, .3);
					text-decoration: underline;
				}

				h1,
				h2,
				h3,
				h4,
				h5,
				h6 {
					font-family: \'Red Hat Display\', sans-serif;
					color: #000000;
					margin-top: 0;
					font-weight: 400;
				}

				body {
					font-family: \'Red Hat Display\', sans-serif;
					font-weight: 400;
					font-size: 15px;
					line-height: 1.8;
					color: rgba(0, 0, 0, .4);
				}

				a {
					color: #009ffd;
				}

				p {
					color: #000;
				}

				.logo h1 {
					margin: 0;
				}

				.logo h1 a {
					color: #009ffd;
					font-size: 24px;
					font-weight: 700;
					font-family: \'Red Hat Display\', sans-serif;
				}

				.hero {
					position: relative;
					z-index: 0;
				}

				.hero .text {
					color: rgba(0, 0, 0, .3);
				}

				.hero .text h2 {
					color: #000;
					font-size: 34px;
					margin-bottom: 0;
					font-weight: 200;
					line-height: 1.4;
				}

				.hero .text h3 {
					font-size: 24px;
					font-weight: 300;
				}

				.hero .text h2 span {
					font-weight: 600;
					color: #000;
				}

				.text-author {
					bordeR: 1px solid rgba(0, 0, 0, .05);
					max-width: 75%;
					margin: 0 auto;
					padding: 2em;
				}

				.text-author h3 {
					margin-bottom: 0;
				}

				ul.social {
					padding: 0;
				}

				ul.social li {
					display: inline-block;
					margin-right: 10px;
				}

				.footer {
				    font-family: \'Red Hat Display\', sans-serif;
				    text-align: center;
					font-size: 14px;
					color: #7a7a7a;
				}

				@media screen and (max-width: 500px) {}
			</style>


		</head>

		<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly;">
			<center style="width: 100%;">
				<div
					style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
					&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
				</div>
					<br>
				<div style="max-width: 600px; margin: 0 auto; border: solid 1px #009ffd;" class="email-container">
					<table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"
						style="margin: auto;">
						<tr>
							<div class="blueline"></div>
						</tr>
						<tr>
							<td valign="top" class="bg_white" style="padding: 1em 2.5em 0 2.5em;">
								<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
									<tr>
										<td class="logo" style="text-align: center;">
											<a href="https://olahkarsa.com" target="_blank">
												<img src="https://olahkarsa.com/resources/img/logo-olahkarsa.png" alt="Logo"
													style="width:300px; border:0;" />
											</a>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td valign="middle" class="hero bg_white" style="padding: 2em 0 4em 0;">
								<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
									<tr>
										<td style="padding: 0 2.5em; text-align: center; padding-bottom: 3em;">
											<div class="text">
												<h2>Hasil Cek Persiapan Proper</h2>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="text-author">
												<h3 class="name">Hi, '.$name.'</span></h3>
												<p>Terima kasih telah melakukan testing CSR aspek <strong>'.$aspek.'</strong> di CSR
													Health. Untuk hasil lengkapnya silahkan klik tombol dibawah ini. Hasil dapat diakses kapanpun dari
													tombol dibawah ini.</p>
												<p align="center"><a href="'.$link.'" class="btn btn-primary"><strong>Lihat Hasil Lengkap</strong></a>
												</p>
												<p>Atau jika Anda kesulitan mengklik tombol "Lihat Hasil Lengkap", copy dan paste URL di bawah ke
													dalam
													browser Anda:</p>
												<p id="url">'.$link.'</p>
											</div>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<div style="padding: 0 3.5rem;">
                        <tr><p class="footer">Silahkan simpan hasil ini. Print hasil cek kesehatan proper dapat dilakukan pada link yang tertera.
                          Pertanyaan lebih lanjut silahkan hubungi <a href="mailto:contact@olahkarsa.com">contact@olahkarsa.com</a></p>
                        </tr>
                        <tr>
                          <p class="footer">PT Olahkarsa Inovasi Indonesia | Jalan Bukit Raya Barat, No. 206, Ciumbuleuit, Cidadap, Kota Bandung</p>
                        </tr>
                    </div>

				</div>
			</center>
		</body>

		</html>
		');

		$this->email->send();

		if ($this->email->send()) {
			echo 'email sent!';
		} else {
			echo $this->email->printDebugger();
			return false;
		}

	}
}