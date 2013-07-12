<?php  if (!defined('BASEPATH')) die();
class Landingpage extends MY_Controller {

   public function index()
	{		
		redirect('/' . $this->config->item('landingpage'), 'refresh');	
	}
   
}