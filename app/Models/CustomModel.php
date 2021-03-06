<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomModel extends Model
{
  protected $table;
  protected $returnType     = 'array';
  public function getKatalog()
  {
    $builder = $this->db->table('daftar_katalog');
    $builder->select('id_katalog, nama_barang, id_merek, nama_merek,stok, harga, nama_kategori, id_kategori, image');
    $query = $builder->get()->getResult();
    return $query;
  }


  public function getDeskripsi()
  {
    $builder = $this->db->table('daftar_katalog');
    $builder->select('id_katalog, nama_barang, deskripsi');
    $query = $builder->get()->getResult();
    
    return $query;
  }


  public function getKategori()
  {
    $builder = $this->db->table('kategori k1');
    $builder->select('k2.id_kategori AS id_kategori, k2.nama_kategori AS nama_kategori, k1.nama_kategori AS parent_kategori, k1.id_kategori AS id_kategori1, k1.parent_kategori AS parent_kategori1');
    $builder->join('kategori k2', 'k1.id_kategori = k2.parent_kategori', 'right');
    $builder->where('k2.deleted_at = ', NULL);
    $query = $builder->get()->getResult();
    
    return $query;
  }


  public function getKontak()
  {
    $builder = $this->db->table('kontak');
    $query = $builder->where('deleted_at', NULL)->get()->getResult();
    return $query;
  }

  public function getSearch($array, $perPage, $offset)
  {
    $builder = $this->db->table('daftar_katalog');
    $builder->select('id_katalog, deskripsi, nama_barang, id_merek, nama_merek,stok, harga, nama_kategori, id_kategori');
    $builder->orLike($array);  
    $query = $builder->get($perPage, $offset)->getResult();
    return $query;
  }


  public function getSearchTotal($array)
  {
    $builder = $this->db->table('daftar_katalog');
    $builder->select('id_katalog, deskripsi, nama_barang, id_merek, nama_merek,stok, harga, nama_kategori, id_kategori');
    $builder->orLike($array, 'before');
    $query = $builder->get()->getResult();
    return $query;
  }


  public function getProduct($id_katalog)
  {
    $builder = $this->db->table('katalog');
    $builder->select('katalog.id_katalog, katalog.nama_barang, katalog.deskripsi, katalog.id_merek, merek.nama_merek,SUM(stok.status) AS stok, katalog.harga, kategori.nama_kategori, katalog.id_kategori, katalog.image');
    $builder->join('merek', 'merek.id_merek = katalog.id_merek', 'left');
    $builder->join('kategori', 'kategori.id_kategori = katalog.id_kategori', 'left');
    $builder->join('stok', 'stok.id_katalog = katalog.id_katalog', 'left');
    $builder->groupBy('stok.id_katalog');
    $builder->where('katalog.id_katalog', $id_katalog);
    $query = $builder->get()->getResult();
    return $query;
  }

  public function getProCat($category, $perPage, $offset)
  {
    $builder = $this->db->table('katalog');
    $builder->select('katalog.id_katalog, katalog.nama_barang, katalog.deskripsi, kategori.nama_kategori, katalog.harga,kategori.parent_kategori');
    $builder->join('kategori', 'kategori.id_kategori = katalog.id_kategori', 'left');
    $builder->where('kategori.parent_kategori', $category);
    $builder->where('katalog.deleted_at = ', NULL);
    $query = $builder->get($perPage, $offset)->getResult();
    return $query;
  }

  public function getProCatTotal($category)
  {
    $builder = $this->db->table('katalog');
    $builder->select('katalog.id_katalog, katalog.nama_barang, katalog.deskripsi, kategori.nama_kategori,katalog.harga,kategori.parent_kategori');
    $builder->join('kategori', 'kategori.id_kategori = katalog.id_kategori', 'left');
    $builder->where('kategori.parent_kategori', $category);
    $builder->where('katalog.deleted_at = ', NULL);
    $query = $builder->get()->getResult();
    return $query;
  }

  public function getCategoryID($category)
  {
    $builder = $this->db->table('kategori');
    $builder->select('nama_kategori');
    $builder->where('kategori.id_kategori', $category);
    $query = $builder->get()->getResult();
    return $query;
  }

  public function getHistory()
  {
    $builder = $this->db->table('katalog');
    $builder->select('stok.id_katalog, stok.id, SUM(stok.status) AS stok,  stok.keterangan, katalog.nama_barang, stok.createdAt');
    $builder->join('stok', 'stok.id_katalog = katalog.id_katalog', 'left');
    $builder->groupBy('stok.id_katalog');


    $query = $builder->get()->getResult();
    return $query;
  }

  
  public function getStok()
  {
    $builder = $this->db->table('katalog');
    $builder->select('daftar_stok.id_katalog, daftar_stok.id, daftar_stok.status, katalog.id_katalog,  daftar_stok.keterangan, katalog.nama_barang, daftar_stok.createdAt');
    $builder->join('daftar_stok', 'daftar_stok.id_katalog = katalog.id_katalog', 'left');
    $builder->orderBy('daftar_stok.createdAt', 'DESC');
    $builder->where('katalog.deleted_at = ', NULL);
    

    $query = $builder->get()->getResult();
    return $query;
  }



  




}
