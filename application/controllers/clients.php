<?php  if (!defined('BASEPATH')) die();
class Clients extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('clients_table_model');
	}

	public function index()
	{
		//display the clients table
		$sitetitle = ucfirst($this->router->fetch_class());
		$this->load->view('include/header', array('title' => 'Loader Bot - ' . $sitetitle));
		$this->load->view('navbar');
		$data['title'] = $sitetitle;
		$data['content'] = $this->load->view('clients_table', NULL, TRUE);
		$this->load->view('content', $data);
		$this->load->view('include/footer');
	}
    public function ajax()
	{	
		//load the ajax for the table data	//TODO: Make a model maybe?
		$this->load->library('datatables');
		$INTVAL = $this->config->item('timeout');
		    $this->datatables			//useratpc,$victim['Time'] <= (time() - INTVAL)
         ->select('id, IF( lastupdate <= ' . (time() - $INTVAL) . ', "0", "1" ) as online, countrylong, countrycode, countryregion, countrycity, ip, os',false)
         ->from('ldr_clients');
		 $this->datatables->edit_column('countrycode', '<img src="' . base_url() . 'assets/img/flags/$1.gif"/> $2', 'countrycode, countrylong');
		echo $this->datatables->generate(); 
	}
}
