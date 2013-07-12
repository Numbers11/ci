<?php  if (!defined('BASEPATH')) die();
class Groups extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('libplugins');
		$this->load->model('groups_model');
		$this->load->model('gate_model');
	}

	public function index()
	{
		$this->renderpage($this->load->view('groups_table', 
			array('groups' => $this->groups_model->getGroupsTable(),
				  'plugins' => $this->libplugins->plugins)
			, TRUE));
	}

	public function newgroup($groupname)		//"new" is reserved, lol
	{
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		if ($this->form_validation->run() == FALSE)
		{
			$this->renderpage($this->load->view('groups_newgroup', 	
				array('os' => $this->gate_model->getOSList(),
				  'plugins' => $this->libplugins->plugins), true),
			 'New group: ' . $groupname);
		}
		else
		{
			$this->load->view('formsuccess');
		}	
	}	
}