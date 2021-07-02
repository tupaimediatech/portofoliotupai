<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_us extends CI_Controller {

	public function index()
	{
		$data = [
			'base' => 'home/aboutus',
			'partial' => null,
			'title' => 'About Us',
			'teams' => $this->User_m->team(),
		];

		$this->load->view('base/home', $data);
	}

}
