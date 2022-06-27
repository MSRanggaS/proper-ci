<?php

namespace App\Models;

use CodeIgniter\Model;

class AttempdetailModel extends Model
{
  protected $table = 'attempdetail';
  protected $primaryKey = 'id_attempdetail';
  protected $allowedFields = [
      'id_attemp', 'id_question', 'answer', 'getpoint',
  ];
}
