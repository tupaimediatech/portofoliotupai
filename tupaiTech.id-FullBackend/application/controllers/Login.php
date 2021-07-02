<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		sudah_login();
		$this->form_validation->set_rules('username', 'Username', 'required|trim', array('required' => 'Mohon masukkan Username anda!'));
		$this->form_validation->set_rules('password', 'Password', 'required|trim', array('required' => 'Mohon masukkan Password anda!'));

		if($this->form_validation->run() == FALSE) {
			$this->load->view('login/index');
		}else {
			$data = [
				'user' => $this->input->post('username', true),
				'pasw' => $this->input->post('password', true)
			];
			$this->Admin_m->cek_login($data);
		}
		
	}
    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Anda Berhasil Logout!</div>');
        redirect('/login');
    }

}
