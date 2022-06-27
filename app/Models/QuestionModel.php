<?php

namespace App\Models;

use CodeIgniter\Model;

class QuestionModel extends Model
{
  protected $table = 'questions';
  protected $primaryKey = 'id_question';
  protected $allowedFields = [
      'parent', 'id_subaspect', 'question', 'point', 'is_parent', 'handle'
  ];
}
