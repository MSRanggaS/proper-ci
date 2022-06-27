<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
  protected $table = 'user_admin';
  protected $allowedFields = [
      'name', 'email', 'password', 'status',
  ];
}
