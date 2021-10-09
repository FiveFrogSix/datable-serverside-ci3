<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('config_model');
		$this->load->model('query_model');
	}

	public function index()
	{
		$this->config_model->check_session('login');
		$this->load->view('inc/header');
		$this->load->view('home');
        $this->load->view('inc/footer');
	}
	
	public function topsecret(){
		echo md5('Bic-Ben Company Limited');
	}
}
