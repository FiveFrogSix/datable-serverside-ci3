<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class P extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('config_model');
		$this->load->model('query_model');
	}

	public function index()
	{
		echo 'Not Found 404';
	}

    //Start Admin System (Login Blah Blah)

    public function login(){
		$this->config_model->check_session('loging');
        $this->load->view('inc/header');
        $this->load->view('login');
        $this->load->view('inc/footer');
    }
	public function logout(){
		unset($_SESSION['bbp_token']);
		return header("Location: ".base_url('p/login'));
	}
    

    //End Admin System (Login Blah Blah)

	//หน้า list email
	public function list(){
		$this->config_model->check_session('login');
        $this->load->view('inc/header');
        $this->load->view('list');
        $this->load->view('inc/footer');
    }
	//หน้า list email
	public function group(){
		$this->config_model->check_session('login');
        $this->load->view('inc/header');
        $this->load->view('group');
        $this->load->view('inc/footer');
    }
	//หน้า list email
	public function filter_spam(){
		$this->config_model->check_session('login');
        $this->load->view('inc/header');
        $this->load->view('filter_spam');
        $this->load->view('inc/footer');
    }

}
