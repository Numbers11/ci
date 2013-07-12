<?php  if (!defined('BASEPATH')) die();
class Gate extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('gate_model');
	}

 	public function index()
	{
		$vars = $this->input->post();
		$guid = $vars['guid'];
		//load the rest of our vars
		$this->load->library('geoip_lib');
		$this->geoip_lib->InfoIP($_SERVER['REMOTE_ADDR']);
		$countrycity   = $this->geoip_lib->result_city();
		$countrycode   = $this->geoip_lib->result_country_code();
        $countrylong   = $this->geoip_lib->result_country_name();
		$countryregion   = $this->geoip_lib->result_region_name();
		if (!$countryregion) $countryregion = 'Unknown';
		if (!$countrycode) $countrycode = '00';
		if (!$countrylong) $countrylong = 'Unknown';
		if (!$countrycity) $countrycity = 'Unknown';
		$data = array(
				'guid' => $guid,
				'ip'   => $_SERVER['REMOTE_ADDR'],
				'os'   => $vars['os'],
				'build' => $vars['build'],
				'useratpc' => $vars['useratpc'],
				'countrycity' => $countrycity,
				'countrycode' => $countrycode,
				'countrylong' => $countrylong,
				'countryregion' => $countryregion
			);
				print_r($this->geoip_lib->result_array());
		//check if already exists
		echo $this->gate_model->InsertOrUpdateClient($data);
	} 
}