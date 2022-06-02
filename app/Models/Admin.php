<?php namespace App\Models;

use CodeIgniter\Model;

class Admin extends Model
{
  protected $table      = 'admin';
  protected $primaryKey = 'id_admin';
  protected $returnType     = 'array';
  protected $useSoftDeletes = true;
  protected $deletedField  = 'deleted_at';
  protected $allowedFields = ['username', 'tipe_user', 'password', 'deleted_at'];


  }
