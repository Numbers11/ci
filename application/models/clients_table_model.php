<?php
class Clients_Table_Model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		
	}
	public function GetClients()
	{
		$query = $this->db->get('clients');
		return $query->result_array();
	}
}