<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		belum_login();
	}


	public function index()
	{
		$data = [
			'base' => 'admin/dashboard',
			'partial' => null,
			'title' => 'Dashboard'
		];

		$this->load->view('base/base', $data);
	}


	// service //
	public function service()
	{

		$masuk = $this->input->post(null, true);
		
		if (isset($masuk['TambahService'])) {
			$val_service = $this->Admin_m->val_service();
			if ($val_service == true) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Service Berhasil Dimasukkan</div>');
				redirect('admin/service/');
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Mohon masukkan data yang sesuai</div>');
				redirect('admin/service/');
			}
		}elseif (isset($masuk['UbahService'])) {
			$val_edit_service = $this->Admin_m->val_service();
			if ($val_edit_service == true) {

				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Materi Berhasil DiUbah</div>');
				redirect('admin/service/');
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Mohon masukkan data yang sesuai</div>');
				redirect('admin/service/');
			}
		}else{
			$data = [
				'base' => 'admin/service',
				'partial' => null,
				'title' => 'Service',
				'service' => $this->Admin_m->service()
			];
			$this->load->view('base/base',$data);
		}
		 
	}
	public function hapus_service($id=null)
	{
		if ($id == null) {
			redirect('admin/service/');
		}
		$this->Admin_m->service_del($id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Service Berhasil DiHapus</div>');
		redirect('admin/service/');
	}

	// Service //


	// Project .///
	public function project()
	{
		$masuk = $this->input->post(null, true);
		
		if (isset($masuk['TambahProject'])) {
			// var_dump($masuk);
			// die();
			$val_project = $this->Admin_m->val_project();
			if ($val_project == true) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Project Berhasil Dimasukkan</div>');
				redirect('admin/project/');
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Mohon masukkan data yang sesuai</div>');
				redirect('admin/project/');
			}
		}elseif (isset($masuk['UbahProject'])) {
			$val_edit_project = $this->Admin_m->val_project();
			if ($val_edit_project == true) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Project Berhasil DiUbah</div>');
				redirect('admin/project/');
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Mohon masukkan data yang sesuai</div>');
				redirect('admin/project/');
			}
		}else{
			$data = [
				'base' => 'admin/project',
				'partial' => 'partial/project',
				'title' => 'Project',
				'projects' => $this->Admin_m->project(),
				'services' => $this->Admin_m->service()
			];

			$this->load->view('base/base', $data);
		}
		
	}
	public function project_selesai()
	{
		$masuk = $this->input->post(null, true);


		$this->form_validation->set_rules('id_done', 'Id', 'required');
		if ($this->form_validation->run() == false) {
			redirect('admin/project/');
		}else{
			$tanggal = $masuk['selesai'] == null ? date('Y-m-d') : date('Y-m-d', strtotime($masuk['selesai']));
			$id =[
				'id_project' => $masuk['id_done']
			];
			$data =[
				'status' => 'Done',
				'tanggal_selesai' => date('Y-m-d', strtotime($masuk['selesai'])),
			];
			$this->Admin_m->update('project', $data, $id);
			$namaproject = $this->Admin_m->project($masuk['id_done'])[0]['nama_project'];
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Project '.$namaproject.' Telah Selesai dikerjakan</div>');
			redirect('admin/project/');
		}
	}

	public function project_del($id=null)
	{
		if ($id == null) {
			redirect('admin/project/');
		}
		$this->Admin_m->project_del($id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Project Berhasil DiHapus</div>');
		redirect('admin/project/');
	}

	// Project .///



	// Team //
	public function team()
	{
		$masuk = $this->input->post(null, true);
		
		if (isset($masuk['TambahTeam'])) {
			$val_team = $this->Admin_m->val_team();
			if ($val_team == true) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Team Berhasil Dimasukkan</div>');
				redirect('admin/team/');
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Mohon masukkan data yang sesuai</div>');
				redirect('admin/team/');
			}
		}elseif (isset($masuk['UbahTeam'])) {
			// var_dump($masuk);
			// die();
			$val_edit_team = $this->Admin_m->val_team();
			if ($val_edit_team == true) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Team Berhasil DiUbah</div>');
				redirect('admin/team/');
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Mohon masukkan data yang sesuai</div>');
				redirect('admin/team/');
			}
		}else{
			$data = [
				'base' => 'admin/team',
				'partial' => 'partial/project',
				'title' => 'Team',
				'teams' => $this->Admin_m->team(),
			];

			$this->load->view('base/base', $data);
		}
		
	}

	public function team_del($id=null)
	{
		if ($id == null) {
			redirect('admin/team/');
		}
		$this->Admin_m->team_del($id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Team Berhasil DiHapus</div>');
		redirect('admin/team/');
	}

	// Team //


	// User //
	public function user()
	{
		$masuk = $this->input->post(null, true);
		
		if (isset($masuk['TambahUser'])) {
			$val_user = $this->Admin_m->val_user();
			if ($val_user == true) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User Berhasil Dimasukkan</div>');
				redirect('admin/user/');
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Mohon masukkan data yang sesuai</div>');
				redirect('admin/user/');
			}
		}elseif (isset($masuk['UbahUser'])) {
			$val_user = $this->Admin_m->val_user();
			if ($val_user == true) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">User Berhasil DiUbah</div>');
				redirect('admin/user/');
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Mohon masukkan data yang sesuai</div>');
				redirect('admin/user/');
			}
		}else{
			$data = [
				'base' => 'admin/user',
				'partial' => 'partial/project',
				'title' => 'User',
				'users' => $this->Admin_m->user(),
			];

			$this->load->view('base/base', $data);
		}
	}


	public function user_del($id=null)
	{
		if ($id == null) {
			redirect('admin/user/');
		}
		$this->Admin_m->user_del($id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User Berhasil DiHapus</div>');
		redirect('admin/user/');
	}
	// User //




	public function gallery()
	{
		$masuk = $this->input->post(null, true);
		
		if (isset($masuk['TambahGallery'])) {
			$val_galery = $this->Admin_m->val_galery();
			if ($val_galery == true) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Gallery Berhasil Dimasukkan</div>');
				redirect('admin/gallery/');
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Mohon masukkan data yang sesuai</div>');
				redirect('admin/gallery/');
			}
		}elseif (isset($masuk['UbahGallery'])) {
			$val_galery = $this->Admin_m->val_galery();
			if ($val_galery == true) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Gallery Berhasil DiUbah</div>');
				redirect('admin/gallery/');
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Mohon masukkan data yang sesuai</div>');
				redirect('admin/gallery/');
			}
		}else{
			$data = [
				'base' => 'admin/gallery',
				'partial' => 'partial/project',
				'title' => 'Gallery',
				'gallerys' => $this->Admin_m->gallery_servis(),
				'services' => $this->Admin_m->service()

			];

			$this->load->view('base/base', $data);
		}
		
	}
	public function gallery_del($id=null)
	{
		if ($id == null) {
			redirect('admin/gallery/');
		}
		$this->Admin_m->gallery_del($id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Gallery Berhasil DiHapus</div>');
		redirect('admin/gallery/');
	}
}
