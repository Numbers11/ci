<?php  if (!defined('BASEPATH')) die();
class Login extends CI_Controller {

   public function index()
	{

		
		$this->load->library('session');
		$loggedin = $this->session->userdata('loggedin');
		if (!empty($loggedin)) {
			//log us out
			$this->session->sess_destroy();
		};
		if ($this->input->post('username') == $this->config->item('username') && $this->input->post('password') == $this->config->item('password')) {
			$this->session->set_userdata(array('loggedin' => true) );
			redirect('/', 'refresh');
		}
		$this->load->view('include/header', array('title' => 'Login'));
		$this->load->view('templates/login');		
		$this->load->view('include/footer');		
		
	}
   
}