<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Beranda extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('session');
		}
		public function index(){
			$data['judul_halaman'] = 'Beranda | Sahabat Skripsi';
			$this->load->view('public/templates/header', $data);
			$this->load->view('public/index', $data);
			$this->load->view('public/templates/footer', $data);
		}
	}