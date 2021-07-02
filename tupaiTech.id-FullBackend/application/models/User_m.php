<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class User_m extends CI_Model{

 	public function service($id=null)
	{
		// $this->db->order_by('code', 'ASC');
		if ($id != null) {
			$this->db->where('id_service', $id);
		}
		$this->db->limit(5);
		$query = $this->db->get('service');
		return $query->result_array();
	} 

	public function service_detail($nama=null)
	{
		// $this->db->order_by('code', 'ASC');
		if ($nama != null) {
			$this->db->where('link', $nama);
		}
		$query = $this->db->get('service');
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
	public function struktur_detail($id=null)
	{
		// $this->db->order_by('code', 'ASC');
		if ($id != null) {
			$this->db->where('id_struk', $id);
		}
		$query = $this->db->get('struktur');
		return $query->result_array();
	}
	public function project($id=null)
	{
		// $this->db->order_by('code', 'ASC');
		if ($id != null) {
			$this->db->where('id_project', $id);
		}
		$this->db->select('project.*, service.link, service.nama_service');
		$this->db->from('project');
		$this->db->join('service', 'service.id_service = project.service_id');
		$query = $this->db->get();
		return $query->result_array();
	}




	

}