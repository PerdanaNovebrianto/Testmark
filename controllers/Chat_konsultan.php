<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Chat_konsultan extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->model('Sahabat_Skripsi');
			$this->load->helper('url');
			$this->load->library('session');
		}
		public function index(){
			if(!isset($this->session->userdata['login_konsultan'])){
				header('location:'.base_url().'konsultan');
			}
			else{
				$id = $this->session->userdata['login_konsultan']['id'];
				$data['id'] = $id;
				$data['nama'] = $this->session->userdata['login_konsultan']['nama'];
				$data['email'] = $this->session->userdata['login_konsultan']['email'];
				$data['gambar'] = $this->session->userdata['login_konsultan']['gambar'];
				$data['pengguna'] = $this->Sahabat_Skripsi->get_pengguna_data($id);
				$data['tipe'] = $this->session->userdata['login_konsultan']['tipe'];
				$this->load->view('chat/chat', $data);
			}
		}
	}