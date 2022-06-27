<?php

namespace App\Models;

use CodeIgniter\Model;

class RespondentModel extends Model
{
  protected $table = 'respondent';
  protected $primaryKey = 'id_respondent';
  protected $allowedFields = [
    'respondent', 'position', 'phone', 'rand_auth', 'name', 'street_name', 'city', 'province', 'email', 'status'
  ];
}
