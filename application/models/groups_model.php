<?php
class Groups_Model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		
	}
	public function getGroupsTable()
	{
		$this->db->group_by('active, name');
		$result = $this->db->get('groups');
		return $result->result_array(); 	
	}
}