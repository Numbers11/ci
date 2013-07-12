<?php
class Gate_Model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		
	}
	public function InsertOrUpdateClient($data)
	{
	//TODO: ON DUPLICATE KEY UPDATE WOULD BE BETTER
		$this->db->from('clients');
		$this->db->where('guid', $data['guid']);
		if ($this->db->count_all_results() == 0) {
			echo 'doesnt exist';
			//doesnt exist, insert
			$data['lastupdate']  = time();
			$data['firstupdate'] = time();
			$query = $this->db->insert('ldr_clients', $data);
			return $this->db->_error_message();
		} else {
			//already exists, update
			echo 'exists';
			$data['lastupdate']  = time();
			$query = $this->db->update('ldr_clients', $data, array('guid'=>$data['guid']));
			return $this->db->_error_message();
		}
	}
	public function getOSList()
	{
		$this->db->select('os');
		$this->db->from('clients');
		$this->db->group_by("os"); 
		$query = $this->db->get();
		return $query->result_array();

	}
}