<?php

namespace App\Models;

use CodeIgniter\Model;

class SubaspectModel extends Model
{
  protected $table = 'subaspect';
  protected $primaryKey = 'id_subaspect';
  protected $allowedFields = [
      'id_aspectproper', 'name'
  ];
}
