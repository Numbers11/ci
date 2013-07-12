<?php
class MY_Controller extends CI_Controller
{
	public $sitetitle;
   function __construct()
   {
		parent::__construct();
		//CHECK LOGIN
		$this->load->library('session');
		$loggedin = $this->session->userdata('loggedin');
		if (empty($loggedin)) {
			//not logged in, fuck off
			redirect('/login/', 'refresh');
		};
   }
   //Renders a normal page view
   public function renderpage($content, $title = '') {
		$this->sitetitle = ucfirst($this->router->fetch_class());
		$this->load->view('include/header', array('title' => 'Loader Bot - ' . $this->sitetitle));
		$this->load->view('navbar');
		$data['title'] =  ($title == '') ? $this->sitetitle : $title;
		$data['content'] = $content;
		$this->load->view('content', $data);
		$this->load->view('include/footer');   
   }
}
