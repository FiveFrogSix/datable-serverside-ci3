<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// $this->load->model('config_model');
		// $this->load->model('query_model');
	}

	public function index()
	{
		echo 'not found 404';
	}
	
	public function get_path(){
        $array = array(
            'method' => $this->router->fetch_class()
        );
        echo json_encode($array); 
	}

    public function collpase_sidebar($a){
        if($a == 1){
            delete_cookie('sidebar');
        }else{
            $cookie = array(
                'name' => 'sidebar',
                'value' => 'sidebar-expand',
                'expire' => 32400,
            );
            $this->input->set_cookie($cookie);
        }
	}
}
