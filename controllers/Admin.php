<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Admin extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->model('Sahabat_Skripsi');
			$this->load->helper('url');
			$this->load->library('session');
		}
		public function index(){
			if(isset($this->session->userdata['login_user'])){
				header('location:'.base_url().'kelola_kabar');
			}
			else{
				$data['judul_halaman'] = 'Login | Sahabat Skripsi';
				$data['tipe_login'] = 'admin';
				$data['pesan'] = $this->session->flashdata('message');
				$this->load->view('admin/login', $data);
			}
		}
		public function proses_masuk(){
			if ($this->input->server('REQUEST_METHOD') == 'POST'){
				$username = hash("sha256", $this->input->post('username'));
				$password = hash("sha256", $this->input->post('password'));
				$verify = $this->Sahabat_Skripsi->verify_admin();
				if($username == $verify['username_admin'] && $password == $verify['password_admin']){
					$data_session = array('authority' => 'admin');
					$this->session->set_userdata('login_user', $data_session);
					header('location:'.base_url().'kelola_kabar');
				}
				else{
					$this->session->set_flashdata('message', 'Username atau password salah.');
					header('location:'.base_url().'admin');
				}
			}
			else{
				show_404();
			}
		}
		public function proses_keluar(){
			if(isset($this->session->userdata['login_user'])){
				$this->session->sess_destroy();
				header('location:'.base_url().'admin');
			}
			else{
				show_404();
			}
		}
	}