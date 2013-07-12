<?php if ( ! defined('BASEPATH')) die(); 

class Core {
	
    public function __construct()
    {
    }
    public function isinstalled()
    {
		return true; //needs no initialization
    }
    public function install()
    {
		return "You can't do that, dummy :^)";
    }
    public function uninstall()
    {
		return "You can't do that, dummy :^)";		
    }
	/////////////
	public function setsettings($firsttime = false)
	{
		//called when a group with your plugin gets created or changed
	}
    public function run()
    {
		//What to send to our clients
		return 'hello from Core';
    }
	public function response($data) {
		//what we get back from them, save it to a report or whatever.
		echo $data;
	}
}
