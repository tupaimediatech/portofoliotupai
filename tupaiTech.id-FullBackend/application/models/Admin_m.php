<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Admin_m extends CI_Model{
 
	// Model Login Nitip
	public function cek_login($data){
		$q = $this->db->get_where('user', ['username' => $data['user']])->row_array();
		if (count($q) != 0) {
			if (password_verify($data['pasw'], $q['password'])) {
				$user = [
					'ud' => $q['id_user'],
					'user' => $q['username'],
					'level' => $q['posisi'],
					'nama' => $q['nama']
				];
				$this->session->set_userdata($user);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat datang di Dashboard E-Learning '. $this->session->userdata('nama') .'!</div>');
				redirect('admin');
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password yang anda masukkan salah!</div>');
				redirect('login');
			}
		}else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Username Yang Anda Masukkan Tidak Terdaftar!</div>');
			redirect('login');
		}
	}


 	public function service($id=null)
	{
		// $this->db->order_by('code', 'ASC');
		if ($id != null) {
			$this->db->where('id_service', $id);
		}
		$query = $this->db->get('service');
		return $query->result_array();
	} 
 	public function project($id=null)
	{
		// $this->db->order_by('id_project', 'DESC');
		if ($id != null) {
			$this->db->where('id_project', $id);
		}
		$query = $this->db->get('project');
		return $query->result_array();
	} 
	public function team($id=null)
	{
		// $this->db->order_by('code', 'ASC');
		if ($id != null) {
			$this->db->where('id_team', $id);
		}
		$query = $this->db->get('team');
		return $query->result_array();
	} 
	public function user($id=null)
	{
		// $this->db->order_by('code', 'ASC');
		if ($id != null) {
			$this->db->where('id_user', $id);
		}
		$query = $this->db->get('user');
		return $query->result_array();
	} 
	public function update($table, $data=null , $id = null)
	{
		$this->db->where($id);
		$this->db->update($table, $data);
	} 
	

	// Join //
	public function gallery_servis($id=null)
	{
		// $this->db->order_by('code', 'ASC');
		if ($id != null) {
			$this->db->where('id_gallery', $id);
		}

		$this->db->select('gallery.*, service.nama_service');
		$this->db->from('gallery');
		$this->db->join('service', 'service.id_service = gallery.kategory');

		$query = $this->db->get();
		return $query->result_array();
	} 



	// Join //






	// Upload File //
	public function proses($path = null){

		if ($path == 'service') {
			$config['upload_path']          = './assets/images/service/';
		}elseif ($path == 'project') {
			$config['upload_path']          = './assets/images/project/';
		}elseif ($path == 'team') {
			$config['upload_path']          = './assets/images/team/';
		}elseif ($path == 'user') {
			$config['upload_path']          = './assets/images/user/';
		}elseif ($path == 'gallery') {
			$config['upload_path']          = './assets/images/gallery/';
		}
	    
	    $config['allowed_types']        = 'gif|jpg|png|docx|pdf';
	    $config['overwrite']			= true;
	    $config['max_size']             = 50024; // 50MB

	    $this->load->library('upload', $config);

	    if (isset($_FILES['img']['name']) != "") {
		    if ($this->upload->do_upload('img')) {
		        return $this->upload->data("file_name");
		    }  
	    }elseif (isset($_FILES['img2']['name']) != "") {
	    	if ($this->upload->do_upload('img2')) {
		        return $this->upload->data("file_name");
		    } 
	    }
	}



	function deleteDirectory($dir) {
	    if (!file_exists($dir)) {
	        return true;
	    }

	    if (!is_dir($dir)) {
	        return unlink($dir);
	    }

	    foreach (scandir($dir) as $item) {
	        if ($item == '.' || $item == '..') {
	            continue;
	        }

	        if (!$this->deleteDirectory($dir . '/' . $item)) {
	            return false;
	        }

	    }

	    return rmdir($dir);
	}



	// Upload File //
  


  	// Service // 
	public function val_service()
	{
		$this->form_validation->set_rules('nama_service', 'Nama Service', 'required|trim');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
		$this->form_validation->set_message('required', '{field} mohon diisi');
		if ($this->form_validation->run() == false) {
			return false;
		}else{
			$data = $this->input->post(null, true);
			if (isset($data['TambahService'])) {
				$this->TambahService();
			}elseif (isset($data['UbahService'])) {
				$this->EditService();
			}
			
			return true;
		}
	}


	public function TambahService()
	{
		$data = $this->input->post(null, true);
		$params = [
			'nama_service' => ucwords($data['nama_service']),
			'deskripsi' => ucfirst($data['deskripsi']),
			'link' => strtolower(rep2($data['nama_service'])),
			
		];
		$upload = null;
		if ($_FILES['img']['name'] != null) {
			$upload = $this->proses('service');
		}
		$params['img'] = $upload != null ? $upload : 'default.jpg';
		$this->db->insert('service', $params);
	}

	public function EditService()
	{
		$data = $this->input->post(null, true);
		$params = [
			'nama_service' => ucwords($data['nama_service']),
			'deskripsi' => ucfirst($data['deskripsi']),
			'link' => strtolower(rep2($data['nama_service'])),
			
		];

		if ($_FILES['img']['name'] != null) {
			$upload = $this->proses('service');
			$params['img'] = $upload != null ? $upload : $this->service($data['id'])[0]['img'];
			if ($this->service($data['id'])[0]['img'] != 'default.jpg') {
				chdir('./assets/images/service/');
				$this->deleteDirectory($this->service($data['id'])[0]['img']);
			}
		}

		$this->db->where('id_service', $data['id']);
		$this->db->update('service', $params);
	}

	public function service_del($id=null)
	{
		if ($this->service($id)[0]['img'] != 'default.jpg') {
			chdir('./assets/images/service/');
			$this->deleteDirectory($this->service($id)[0]['img']);
		}
		$this->db->where('id_service', $id);
		$this->db->delete('service');
	}


  	// Service //



  	// Berita // 
	public function val_project()
	{
		$this->form_validation->set_rules('nama', 'Nama Project', 'required|trim');
		$this->form_validation->set_rules('desc', 'Deskripsi', 'required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required');
		$this->form_validation->set_rules('mulai', 'Tanggal Mulai', 'required');
		$this->form_validation->set_message('required', '{field} mohon diisi');
		if ($this->form_validation->run() == false) {
			return false;
		}else{
			$data = $this->input->post(null, true);
			if (isset($data['TambahProject'])) {
				$this->TambahProject();
			}elseif (isset($data['UbahProject'])) {
				// var_dump($data);
				// die();
				$this->UbahProject();
			}
			return true;
		}
	}

	public function TambahProject()
	{
		$data = $this->input->post(null, true);

		$params = [
			'nama_project' => ucwords($data['nama']),
			'service_id' => $data['kategori'],
			'deskripsi' => $data['desc'],
			'tanggal_mulai' => date('Y-m-d', strtotime($data['mulai'])),
			'status' => 'InProgress'
			
		];
		// var_dump($params);
		// die();
		$upload = null;
		if ($_FILES['img']['name'] != null) {
			$upload = $this->proses('project');
		}
		$params['img'] = $upload != null ? $upload : 'default.jpg';
		$this->db->insert('project', $params);
	}

	public function UbahProject()
	{
		$data = $this->input->post(null, true);
		$params = [
			'nama_project' => ucwords($data['nama']),
			'service_id' => $data['kategori'],
			'deskripsi' => $data['desc'],
			'tanggal_mulai' => date('Y-m-d', strtotime($data['mulai'])),
			'status' => 'InProgress'
			
		];

		if ($_FILES['img']['name'] != null) {
			$upload = $this->proses('project');
			$params['img'] = $upload != null ? $upload : $this->project($data['id'])[0]['img'];
			if ($this->project($data['id'])[0]['img'] != 'default.jpg') {
				chdir('./assets/images/project/');
				$this->deleteDirectory($this->project($data['id'])[0]['img']);
			}
		}

		$this->db->where('id_project', $data['id']);
		$this->db->update('project', $params);
	}

	public function project_del($id=null)
	{
		if ($this->project($id)[0]['img'] != 'default.jpg') {
			chdir('./assets/images/project/');
			$this->deleteDirectory($this->project($id)[0]['img']);
		}
		$this->db->where('id_project', $id);
		$this->db->delete('project');
	}


  	// Berita //



  	// Tetimoni // 
	public function val_team()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('posisi', 'Posisi', 'required');
		$this->form_validation->set_message('required', '{field} mohon diisi');
		if ($this->form_validation->run() == false) {
			return false;
		}else{
			$data = $this->input->post(null, true);
			if (isset($data['TambahTeam'])) {
				// var_dump($data);
				// die();
				$this->Tambahteam();
			}elseif (isset($data['UbahTeam'])) {
				$this->Editteam();
			}
			
			return true;
		}
	}


	public function Tambahteam()
	{
		$data = $this->input->post(null, true);
		$params = [
			'nama' => ucfirst($data['nama']),
			'posisi' => strtoupper($data['posisi']),
			'deskripsi' => ucfirst($data['desc']),
			'ig' => $data['ig'],
			'fb' => $data['fb'],
			'twt' => $data['twt']
		];
		if ($_FILES['img']['name'] != null) {
			$upload = $this->proses('team');
		}
		$params['img'] = $upload != null ? $upload : 'default.jpg';
		$this->db->insert('team', $params);
	}

	public function Editteam()
	{
		$data = $this->input->post(null, true);
		// var_dump($data);
		// die();
		$params = [
			'nama' => ucwords($data['nama']),
			'posisi' => strtoupper($data['posisi']),
			'deskripsi' => ucfirst($data['desc']),
			'ig' => $data['ig'],
			'fb' => $data['fb'],
			'twt' => $data['twt']
		];

		if ($_FILES['img']['name'] != null) {
			$upload = $this->proses('team');
			// var_dump($upload);
			// die();
			$params['img'] = $upload != null ? $upload : $this->team($data['id'])[0]['img'];
			if ($this->team($data['id'])[0]['img'] != 'default.jpg') {
				chdir('./assets/images/team/');
				$this->deleteDirectory($this->team($data['id'])[0]['img']);
			}
		}

		$this->db->where('id_team', $data['id']);
		$this->db->update('team', $params);
	}

	public function team_del($id=null)
	{
		if ($this->team($id)[0]['img'] != 'default.jpg') {
			chdir('./assets/images/team/');
			$this->deleteDirectory($this->team($id)[0]['img']);
		}
		$this->db->where('id_team', $id);
		$this->db->delete('team');
	}

	  	
	// Tetimoni // 
	public function val_user()
	{
		$data = $this->input->post(null, true);
		if (isset($data['TambahUser'])) {
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
		}if (isset($data['UbahUser'])) {
			$this->form_validation->set_rules('username', 'Username', 'required|trim');
		}
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('posisi', 'Posisi', 'required');
		$this->form_validation->set_message('required', '{field} mohon diisi');
		if ($this->form_validation->run() == false) {

			return false;
		}else{
			if (isset($data['TambahUser'])) {
				$this->TambahUser();
			}elseif (isset($data['UbahUser'])) {
				$this->EditUser();
			}
			return true;
		}
	}


	public function TambahUser()
	{
		$data = $this->input->post(null, true);
		$params = [
			'username' => strtolower($data['username']),
			'nama' => ucfirst($data['nama']),
			'posisi' => ucfirst($data['posisi']),
			'password' => password_hash(strtolower($data['password']), PASSWORD_DEFAULT),
		];
		if ($_FILES['img']['name'] != null) {
			$upload = $this->proses('user');
		}
		$params['img'] = $upload != null ? $upload : 'default.jpg';
		$this->db->insert('user', $params);
	}

	public function EditUser()
	{
		$data = $this->input->post(null, true);
		$params = [
			'username' => strtolower($data['username']),
			'nama' => ucfirst($data['nama']),
			'posisi' => ucfirst($data['posisi']),
			
		];
		if ($data['password'] != null) {
			$params['password'] = password_hash(strtolower($data['password']), PASSWORD_DEFAULT);
		}

		if ($_FILES['img']['name'] != null) {
			$upload = $this->proses('user');
			$params['img'] = $upload != null ? $upload : $this->user($data['id'])[0]['img'];
			if ($this->user($data['id'])[0]['img'] != 'default.jpg') {
				$this->deleteDirectory('./assets/images/user/'.$this->user($data['id'])[0]['img']);
			}
		}

		$this->db->where('id_user', $data['id']);
		$this->db->update('user', $params);
	}



	public function user_del($id=null)
	{
		if ($this->user($id)[0]['img'] != 'default.jpg') {
			$this->deleteDirectory('./assets/images/user/'.$this->user($id)[0]['img']);
		}
		$this->db->where('id_user', $id);
		$this->db->delete('user');
	}
	// Usernyaa //


	// Gallery // 
	public function val_galery()
	{
		$this->form_validation->set_rules('caption', 'Caption', 'required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_message('required', '{field} mohon diisi');
		if ($this->form_validation->run() == false) {
			return false;
		}else{
			$data = $this->input->post(null, true);
			if (isset($data['TambahGallery'])) {
				$this->TambahGallery();
			}elseif (isset($data['UbahGallery'])) {
				$this->UbahGallery();
			}
			return true;
		}
	}


	public function TambahGallery()
	{
		$data = $this->input->post(null, true);
		$params = [
			'caption' => ucfirst($data['caption']),
			'kategory' => $data['kategori'],
			'tanggal' => date('Y-m-d', strtotime($data['tanggal']))
		];
		if ($_FILES['img']['name'] != null) {
			$upload = $this->proses('gallery');
		}
		$params['foto'] = $upload != null ? $upload : 'default.jpg';
		$this->db->insert('gallery', $params);
	}

	public function UbahGallery()
	{
		$data = $this->input->post(null, true);
		$params = [
			'caption' => ucfirst($data['caption']),
			'kategory' => $data['kategori'],
			'tanggal' => date('Y-m-d', strtotime($data['tanggal']))
		];

		if ($_FILES['img']['name'] != null) {
			$upload = $this->proses('gallery');
			$params['foto'] = $upload != null ? $upload : $this->gallery($data['id'])[0]['foto'];
			if ($this->gallery($data['id'])[0]['foto'] != 'default.jpg') {
				$this->deleteDirectory('./assets/images/gallery/'.$this->gallery($data['id'])[0]['foto']);
			}
		}

		$this->db->where('id_gallery', $data['id']);
		$this->db->update('gallery', $params);
	}

	public function gallery_del($id=null)
	{
		if ($this->gallery($id)[0]['foto'] != 'default.jpg') {
			$this->deleteDirectory('./assets/images/gallery/'.$this->gallery($id)[0]['foto']);
		}
		$this->db->where('id_gallery', $id);
		$this->db->delete('gallery');
	}


  	// Gallery //






}