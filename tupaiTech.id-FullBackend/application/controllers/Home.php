<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data = [
			'base' => 'home/index',
			'partial' => null,
			'title' => 'Home',
			'services' => $this->User_m->service(),
		];

		$this->load->view('base/home', $data);
	}


}
