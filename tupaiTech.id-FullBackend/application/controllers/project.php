<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Project extends CI_Controller
{

	public function index()
	{
		$data = [
			'base' => 'home/project',
			'partial' => null,
			'title' => 'All Project',
			'projects' => $this->User_m->project(),
			'services' => $this->User_m->service(),
		];

		$this->load->view('base/home', $data);
	}
}
