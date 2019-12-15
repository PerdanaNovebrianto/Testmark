<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Pengguna extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->model('Sahabat_Skripsi');
			$this->load->helper('url');
			$this->load->library('session');
		}
		public function index(){
			if(isset($this->session->userdata['login_pengguna'])){
				header('location:'.base_url().'chat_pengguna');
			}
			else{
				$data['judul_halaman'] = 'Login | Sahabat Skripsi';
				$data['tipe_login'] = 'pengguna';
				$data['pesan'] = $this->session->flashdata('message');
				$this->load->view('chat/login', $data);
			}
		}
		public function proses_masuk(){
			if ($this->input->server('REQUEST_METHOD') == 'POST'){
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$verify = $this->Sahabat_Skripsi->verify_pengguna($email, $password);
				if($verify > 0){
					$data_pengguna = $this->Sahabat_Skripsi->get_pengguna($email, $password);
					if($data_pengguna['status'] == 'active'){
						$data_session = array(
							'id' => $data_pengguna['id'],
							'nama' => $data_pengguna['nama'],
							'email' => $data_pengguna['email'],
							'id_konsultan' => $data_pengguna['id_konsultan'],
							'tipe' => 'pengguna'
						);
						$this->session->set_userdata('login_pengguna', $data_session);
						header('location:'.base_url().'chat_pengguna');
					}
					else{
						echo $data_pengguna->status;
						$this->session->set_flashdata('message', 'Status anda non-aktif');
						header('location:'.base_url().'pengguna');
					}
				}
				else{
					$this->session->set_flashdata('message', 'Email atau password salah.');
					header('location:'.base_url().'pengguna');
				}
			}
			else{
				show_404();
			}
		}
		public function proses_keluar(){
			if(isset($this->session->userdata['login_pengguna'])){
				$this->session->unset_userdata('login_pengguna');
				header('location:'.base_url().'pengguna');
			}
			else{
				show_404();
			}
		}
	}