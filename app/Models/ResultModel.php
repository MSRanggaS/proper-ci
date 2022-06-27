<?php

namespace App\Models;

use CodeIgniter\Model;

class ResultModel extends Model
{
  protected $table = 'attemp';
  protected $primaryKey = 'id_attemp';
  protected $allowedFields = [
      'id_respondent', 'aspect', 'attemppoints', 'slug'
  ];

  public function getResult()
  {
    return $this->db->table('respondent')
    ->join('attemp','attemp.id_respondent=respondent.id_respondent')
    ->get()->getResultArray();  
  }
}