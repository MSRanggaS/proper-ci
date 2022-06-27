<?php

namespace App\Models;

use CodeIgniter\Model;

class ShortenslugModel extends Model {
	protected $table = 'shortenslug';
	protected $allowedFields = [
		'slug', 'shorten',
	];
}