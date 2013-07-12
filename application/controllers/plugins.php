<?php  if (!defined('BASEPATH')) die();
class Plugins extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('libplugins');
	}

	public function index()
	{
		$this->renderpage($this->load->view('plugins_table', array('plugins' => $this->libplugins->plugins), true));
	}
	
	public function install($pluginname) {
		$pluginname = strtolower($pluginname);
		if (!$pluginname || !property_exists($this->libplugins->ci, $pluginname)) {
			echo 'missing or invalid plugin name';	
			return;
		}
		$sitetitle = ucfirst($this->router->fetch_class());
		$this->load->view('include/header', array('title' => 'Loader Bot - ' . $sitetitle));
		$this->load->view('navbar');
		$result = $this->{$pluginname}->install();
		$data['title'] = 'Install Plugin: ' . $pluginname;
		$data['content'] = $result . '<br><a href="' . site_url($this->uri->segment(1)) . '" class="btn btn-primary"><i class="icon-chevron-left"></i> Back</a>';
		$this->load->view('content', $data);
		$this->load->view('include/footer');		
	}	//TODO: Condense into one function ^-- --v
	public function uninstall($pluginname) {
		$pluginname = strtolower($pluginname);
		if (!$pluginname || !property_exists($this->libplugins->ci, $pluginname)) {
			echo 'missing or invalid plugin name';	
			return;
		}
		$sitetitle = ucfirst($this->router->fetch_class());
		$this->load->view('include/header', array('title' => 'Loader Bot - ' . $sitetitle));
		$this->load->view('navbar');
		$result = $this->libplugins->ci->{$pluginname}->uninstall();
		$data['title'] = 'Uninstall Plugin: ' . $pluginname;		//Todo: this is kinda ugly.
		$data['content'] = $result . '<br><a href="' . site_url($this->uri->segment(1)) . '" class="btn btn-primary"><i class="icon-chevron-left"></i> Back</a>';
		$this->load->view('content', $data);
		$this->load->view('include/footer');		
	}
}