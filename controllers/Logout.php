<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Logout extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->model('Puskesmas');
			$this->load->helper('url');
			$this->load->library('session');
		}
		public function index(){
			if(isset($this->session->userdata['login_user'])){
				$this->session->sess_destroy();
				header('location:'.base_url().'admin/login');
			}
			else{
				show_404();
			}
		}
	}