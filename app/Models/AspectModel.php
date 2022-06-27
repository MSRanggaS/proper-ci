<?php

namespace App\Models;

use CodeIgniter\Model;

class AspectModel extends Model
{
  protected $table = 'aspectproper';
  protected $primaryKey = 'id_aspectproper';
  protected $allowedFields = [
      'name', 'detail', 'image', 'slug'
  ];

  public function getAspectProper()
  {
    return $this->db->table('aspectproper')
    ->get()->getResultArray();  
  }
}
