<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

	public function index()
	{
		redirect(base_url());
		
		$data = [
			'base' => 'home/service',
			'partial' => null,
			'title' => 'Service',
			'services' => $this->User_m->service(),
		];

		$this->load->view('base/home', $data);
	}

	public function detail()
	{
		$data = [
			'base' => 'home/detail_service',
			'partial' => null,
			'title' => 'Service',
			'services' => $this->User_m->service(),
		];

		$this->load->view('base/home', $data);
	}


}
