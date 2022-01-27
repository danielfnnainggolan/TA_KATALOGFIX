<?php namespace App\Models;

use CodeIgniter\Model;

class Stok extends Model
{
  protected $table      = 'stok';
  protected $primaryKey = 'id';
  protected $returnType     = 'array';
  protected $useSoftDeletes = true;
  protected $deletedField  = 'deleted_at';
  protected $allowedFields = ['id','id_katalog','status','keterangan','createdAt'];


  }
