<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class LibPlugins {
	public $ci;
	public $plugins;
    public function __construct()
    {
		$this->ci =& get_instance();
		$this->ci->load->helper('directory');
		//get list of all available plugins
		$map = directory_map('./application/plugins/', 1);
		foreach($map as $key => &$plugin) {
			if(!file_exists(APPPATH. 'plugins/' . $plugin . '/libraries/' . $plugin . '.php')){
				//not a real plugin, get lost
				unset($map[$key]);
				continue;
			}
			//load all plugins
			$this->ci->load->add_package_path(APPPATH. 'plugins/' . $plugin . '/');
			$this->ci->load->library($plugin);
			$this->ci->config->load($plugin, TRUE);
			//build array of plugin info
			$plugin = array(
						intval($this->ci->{strtolower($plugin)}->isinstalled()),
						$plugin,
						$this->ci->config->item('version', $plugin),
						$this->ci->config->item('author', $plugin),
						$this->ci->config->item('info', $plugin),
						$this->ci->config->item('site', $plugin)//,
					);
		}	
		$this->plugins = $map;
    }
	
}
