<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Testimoni extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->model('Sahabat_Skripsi');
			$this->load->helper('url');
			$this->load->library('session');
		}
		public function index(){
			$data['testimoni'] = $this->Sahabat_Skripsi->get_all_testimoni();
			$data['judul_halaman'] = 'Testimoni | Sahabat Skripsi';
			$this->load->view('public/templates/header', $data);
			$this->load->view('public/testimoni', $data);
			$this->load->view('public/templates/footer', $data);
		}
	}