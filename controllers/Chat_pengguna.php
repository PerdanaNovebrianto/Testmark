<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Chat_pengguna extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->model('Sahabat_Skripsi');
			$this->load->helper('url');
			$this->load->library('session');
		}
		public function index(){
			if(!isset($this->session->userdata['login_pengguna'])){
				header('location:'.base_url().'pengguna');
			}
			else{
				$data['id'] = $this->session->userdata['login_pengguna']['id'];
				$data['nama'] = $this->session->userdata['login_pengguna']['nama'];
				$data['email'] = $this->session->userdata['login_pengguna']['email'];
				$id_konsultan = $this->session->userdata['login_pengguna']['id_konsultan'];
				$data['konsultan'] = $this->Sahabat_Skripsi->get_konsultan_data($id_konsultan);
				$data['tipe'] = $this->session->userdata['login_pengguna']['tipe'];
				$this->load->view('chat/chat', $data);
			}
		}
	}