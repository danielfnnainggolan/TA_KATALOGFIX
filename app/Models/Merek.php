<?php

namespace App\Models;

use CodeIgniter\Model;

class Merek extends Model
{
  protected $table      = 'merek';
  protected $primaryKey = 'id_merek';
  protected $returnType     = 'array';
  protected $useSoftDeletes = true;
  protected $deletedField  = 'deleted_at';
  protected $allowedFields = ['id_merek','nama_merek'];


}
