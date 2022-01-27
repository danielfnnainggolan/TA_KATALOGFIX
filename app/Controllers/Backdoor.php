<?php

namespace App\Controllers;
use App\Models\Admin;
use App\Models\Katalog;
use App\Models\Kategori;

use App\Models\CustomModel;
use App\Models\Merek;
use App\Models\Stok;


class Backdoor extends BaseController
{

	public function __construct()
    {
		$this->user = new Admin();
		$this->merek = new Merek();
		$this->stok = new Stok();
        $this->katalog = new Katalog();
		$this->kategori = new Kategori();
		
		
        helper('form', 'url');
    }


	public function index()
	{
      echo view('Backdoor/login');
	}




	public function Login()
	{
			$session = session();
			$username = $this->request->getPost('username');
			$check = $this->user->where('username', $username)->first();
			if(!is_null($check)) {
				$pass_check = $check['password'];
				$password = $this->request->getPost('password');
				if(password_verify($password, $pass_check)) {
					$ses_data = [
						'username'       => $check['username'],
						'id_admin'		=> $check['id_admin'],
						'logged_in'     => TRUE
					];
					$session->set($ses_data);
					return redirect()->to('Backdoor/welcome');
				}
				else {
					$session->setFlashdata('login_message', 'Username atau Password salah');
					return redirect()->to('Backdoor/');
				}
			}

			else {
				$session->setFlashdata('login_message', 'Username atau Password salah');
				return redirect()->to('Backdoor/');
			}
			
			
	}


	public function Logout()
    {
	
      $session = session();
      $session->destroy();
      return redirect()->to('Home/index');
    }

	public function Welcome()
	  {
		
	    echo view('Backdoor/welcome');
		
	  }



	public function Katalog()
		  {
			$model = new CustomModel;
			$data['katalog'] = $model->getKatalog();
			$data['merek'] = $this->merek->findAll();
			$data['kategori'] = $this->kategori->findAll();

		    echo view('Backdoor/katalog', $data);
			
		  }

	public function Edit_Katalog()
			{
				$id_katalog = $this->request->getPost('id_katalog');
					$data = [
    				'nama_barang' => $this->request->getPost('nama_barang'),
						'id_merek' => $this->request->getPost('id_merek'),
						'harga' => (int)preg_replace('/[^\d]/', '', $this->request->getPost('harga')),
						'id_kategori' => $this->request->getPost('id_kategori'),
									];
				$this->katalog->update($id_katalog, $data);		
				$file = $this->request->getFile('gambar_katalog');
				$validation = $this->validate([
					'gambar_katalog' => 'uploaded[gambar_katalog] |is_image[gambar_katalog]',
												]);		

					if($validation) {
						$file->move('uploads', $this->request->getPost('nama_barang').'.jpg');
						$path = $file->getName();
						$data = [
							'image' => $path,
								];
						$this->katalog->update($id_katalog, $data);
					}
				if(ctype_digit($this->request->getPost('stok')) && $this->request->getPost('stok') !== $this->request->getPost('stok1')) {	
					$data = [
						'id_katalog' => $id_katalog,
						'status' => (int) $this->request->getPost('stok') - $this->request->getPost('stok1'),
						'keterangan' => "Pembaruan Stok dari Sistem"
							];		

					$this->stok->insert($data);
					
				
				}
				return redirect()->to('Backdoor/Katalog');

			}

	public function Delete_Katalog()
			{
				$id_katalog = $this->request->getPost('id_katalog');
				$this->katalog->delete($id_katalog);
				$this->stok->where('id_katalog', $id_katalog)->delete();
				return redirect()->to('Backdoor/Katalog');
			}

	public function Add_Katalog()
			{
				$file = $this->request->getFile('gambar_katalog');
				$validation = $this->validate([
					'gambar_katalog' => 'uploaded[gambar_katalog] |is_image[gambar_katalog]',
				]);

				if($validation) {
					$file->move('uploads', $this->request->getPost('nama_barang').'.jpg');
					$path = $file->getName();
					$data = [
		    			'nama_barang' => $this->request->getPost('nama_barang'),
						'id_merek' => $this->request->getPost('id_merek'),
						'harga' => (int)preg_replace('/[^\d]/', '', $this->request->getPost('harga')),
						'id_kategori' => $this->request->getPost('id_kategori'),
						'image' => $path,
								];
	
							
					
					
					if(ctype_digit($this->request->getPost('stok'))) {
						$this->katalog->insert($data);
						$id_katalog = $this->katalog->selectMax('id_katalog')->first();
				
						$data = [
						'id_katalog' => $id_katalog['id_katalog'],
						'status' => (int)$this->request->getPost('stok'),
								];		
				
						$this->stok->insert($data);
					}
					
				}
				
				
				return redirect()->to('Backdoor/Katalog');
			}

	public function Deskripsi()
			{
				$model = new CustomModel;
				$data['katalog'] = $model->getDeskripsi();
				echo view('Backdoor/deskripsi', $data);
				


				
			}

	public function Edit_Deskripsi()
			{
				 $id_katalog = $this->request->getPost('id_katalog');
				 $data = [
					 		'nama_barang' => $this->request->getPost('nama_barang'),
							'deskripsi' => $this->request->getPost('deskripsi'),
									];
				 $this->katalog->update($id_katalog, $data);
				 return redirect()->to('Backdoor/Deskripsi');
					}

	public function Delete_Deskripsi()
			{
				$id_katalog = $this->request->getPost('id_katalog');
				$data = [
						 'deskripsi' => NULL,
								 ];

				$this->katalog->update($id_katalog, $data);
				return redirect()->to('Backdoor/Deskripsi');
			}
	
	public function Add_Deskripsi()
			{
				$id_katalog = $this->request->getPost('id_katalog');
				$data = [
						 'deskripsi' => $this->request->getPost('deskripsi'),
								 ];

				$this->katalog->update($id_katalog, $data);
				return redirect()->to('Backdoor/Deskripsi');
			}
		
	public function Merek()
			{
				$data['merek'] = $this->merek->findAll();
				echo view('Backdoor/merek', $data);
				
			}

	public function Add_Merek()
			{
				$data = ['nama_merek' => $this->request->getPost('nama_merek')];
				$this->merek->insert($data);
				return redirect()->to('Backdoor/Merek');
			}

	public function Edit_Merek()
			{
				 $id_merek = $this->request->getPost('id_merek');
				 $data = [
					 		'nama_merek' => $this->request->getPost('nama_merek'),
									];
				 $this->merek->update($id_merek, $data);
				 return redirect()->to('Backdoor/Merek');
			}

	public function Delete_Merek()
			{
				$id_merek = $this->request->getPost('id_merek');
				$this->merek->delete($id_merek);
				$this->katalog->where('id_merek', $id_merek)->delete();
				return redirect()->to('Backdoor/Merek');
			}

	public function Stok()
			{
				$model = new CustomModel;
				$data['stok'] = $model->getStok();
				$data['katalog'] = $this->katalog->findAll();
				echo view('Backdoor/Stok', $data);
				
			}

	public function History()
			{
				$model = new CustomModel;
				$data['stok'] = $model->getHistory();
				echo view('Backdoor/History', $data);
				
			}

	public function Edit_Stok()
			{
				$id = $this->request->getPost('id_stok');
				$data = [
					'id_katalog' => $this->request->getPost('id_katalog'),
					'status' => $this->request->getPost('status'),
					'keterangan' => $this->request->getPost('keterangan'),
									];

				 $this->stok->update($id, $data);
				 return redirect()->to('Backdoor/Stok');

			}

	public function Delete_Stok()
			{
				$id = $this->request->getPost('id_stok');
				$this->stok->delete($id);
				return redirect()->to('Backdoor/Stok');
			}

	public function Add_Stok()
			{
				if(filter_var($this->request->getPost('status'), FILTER_VALIDATE_INT)) {
					$data = [
						'id_katalog' => $this->request->getPost('id_katalog'), 
						'status' => $this->request->getPost('status'),
						'keterangan' => $this->request->getPost('keterangan'),
								 ];

					$this->stok->insert($data);
				}
								 
				return redirect()->to('Backdoor/Stok');
			}

	

	public function Kategori()
			{
				$model = new CustomModel;
				$data['kategori'] = $model->getKategori();
				
				echo view('Backdoor/Kategori', $data);
				
			}

	public function Add_Kategori()
			{
				$parent_kategori = $this->request->getPost('parent_kategori');
				if(is_null($parent_kategori) || empty($parent_kategori)) 
				{
					$data = [
						'nama_kategori' => $this->request->getPost('nama_kategori'),
						'parent_kategori' => NULL,
								 ];

				}

				else 
				{
				$data = [
						'nama_kategori' => $this->request->getPost('nama_kategori'),
						'parent_kategori' => $this->request->getPost('parent_kategori'),
								 ];
				}
				$this->kategori->insert($data);
				return redirect()->to('Backdoor/Kategori');
			}

	public function Edit_Kategori()
			{
				$id_kategori = $this->request->getPost('id_kategori');
				$parent_kategori = $this->request->getPost('parent_kategori');
				if($parent_kategori == "-") 
				{
					$data = [
						'nama_kategori' => $this->request->getPost('nama_kategori'),
						'parent_kategori' => NULL,
								 ];
				}

				else 
				{
				$data = [
						'nama_kategori' => $this->request->getPost('nama_kategori'),
						'parent_kategori' => $this->request->getPost('parent_kategori'),
								 ];
				}
				
				 $this->kategori->update($id_kategori, $data);
				 return redirect()->to('Backdoor/Kategori');
			}		

	public function Delete_Kategori()
			{
				$id_kategori= $this->request->getPost('id_kategori');
				$id = array();

				$model = new CustomModel;
				$data['kategori'] = $model->getKategori();
				foreach($data['kategori'] as $row) {
					if($row->id_kategori1 == $id_kategori || $row->parent_kategori1 == $id_kategori || $row->id_kategori == $id_kategori) {
						array_push($id, $row->id_kategori);
					}
				}

				$this->kategori->delete($id);
				$this->katalog->where('id_kategori', $id_kategori)->delete();
				return redirect()->to('Backdoor/Kategori');
			}
	public function Account()
	  {
		$data['admin'] = $this->user->find(session()->get('id_admin'));
		
	    echo view('Backdoor/account', $data);
		
	  }

	public function Account_Change()
	  {
		$session = session();
		$username = $this->request->getPost('username');
		$oldPassword = $this->request->getPost('oldPassword');
		$check = $this->user->where('username', $username)->first();
		$pass_check = $check['password'];
		if(password_verify($oldPassword, $pass_check)) {
			$data = [
				'password' => password_hash($this->request->getPost('newPassword'), PASSWORD_DEFAULT),
							];
			$this->user->update($this->user->find(session()->get('id_admin')), $data);
			$session->setFlashdata('change_password', 'Password berhasil diubah');
			$session->setFlashdata('color', 'alert-success');
			return redirect()->to('Backdoor/Account');
		}
		else {
			
			$session->setFlashdata('change_password', 'Password lama salah');
			$session->setFlashdata('color', 'alert-danger');
			return redirect()->to('Backdoor/Account');
		}
	  }
			
	 


}
