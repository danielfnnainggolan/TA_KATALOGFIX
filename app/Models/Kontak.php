<?php

namespace App\Models;

use CodeIgniter\Model;

class Kontak extends Model
{
  protected $table      = 'kontak';
  protected $primaryKey = 'id';
  protected $returnType     = 'array';
  protected $useSoftDeletes = true;
  protected $deletedField  = 'deleted_at';
  protected $allowedFields = ['id','nama','alamat','email','no_hp'];


}
