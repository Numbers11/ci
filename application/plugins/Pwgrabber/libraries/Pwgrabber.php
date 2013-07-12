<?php if ( ! defined('BASEPATH')) die(); 

class PwGrabber {
	private $ci;
	public $pluginname;
    public function __construct()
    {
		$this->ci =& get_instance();
		$this->pluginname = get_called_class();
		$this->ci->load->add_package_path(APPPATH. 'plugins/' . get_called_class() . '/');
		$this->ci->load->database();
		$this->ci->config->load(get_called_class());
		
    }
    public function isinstalled()
    {
		return $this->ci->db->table_exists('plugins_' . strtolower($this->pluginname) . '_reports');
    }
	
    public function install()
    {
	//this styling is purely optional
		$echo ='<div class="well well-large"><i class="icon-terminal icon-4x pull-left icon-muted"></i>';
		$sql = 'CREATE TABLE `plugins_' . strtolower($this->pluginname) . '_reports` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `application` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
				  `site` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
				  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
				  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
				  `client_id` int(11) NOT NULL,
				  PRIMARY KEY (`id`)
				) CHARSET=utf8 COLLATE=utf8_unicode_ci;';
		$echo = $echo  . $sql . "</div>";
		$this->ci->db->query($sql);	//TODO: real error handling
		$echo = $echo . '<div class="alert alert-success"> Table created!</div>';
		return $echo;
    }
    public function uninstall()
    {
		$echo ='<div class="well well-large"><i class="icon-terminal icon-4x pull-left icon-muted"></i>';
		$sql = 'DROP TABLE `plugins_' . strtolower($this->pluginname) . '_reports`;';
		$echo = $echo  . $sql . "</div>";
		$this->ci->db->query($sql);	//TODO: real error handling
		$echo = $echo . '<div class="alert alert-success"> Table deleted!</div>';
		return $echo;
    }
    public function run($settings)
    {
		echo 'hello from ' . get_called_class();
    }
}
