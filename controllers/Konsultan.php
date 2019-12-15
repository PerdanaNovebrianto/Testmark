<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Konsultan extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->model('Sahabat_Skripsi');
			$this->load->helper('url');
			$this->load->library('session');
		}
		public function index(){
			if(isset($this->session->userdata['login_konsultan'])){
				header('location:'.base_url().'chat_konsultan');
			}
			else{
				$data['judul_halaman'] = 'Login | Sahabat Skripsi';
				$data['tipe_login'] = 'konsultan';
				$data['pesan'] = $this->session->flashdata('message');
				$this->load->view('chat/login', $data);
			}
		}
		public function proses_masuk(){
			if ($this->input->server('REQUEST_METHOD') == 'POST'){
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$verify = $this->Sahabat_Skripsi->verify_konsultan($email, $password);
				if($verify > 0){
					$data_konsultan = $this->Sahabat_Skripsi->get_konsultan($email, $password);
					if($data_konsultan['status_konsultan'] == 'available'){
						$data_session = array(
							'id' => $data_konsultan['id_konsultan'],
							'nama' => $data_konsultan['nama_konsultan'],
							'gambar' => $data_konsultan['gambar_konsultan'],
							'email' => $data_konsultan['email'],
							'tipe' => 'konsultan'
						);
						$this->session->set_userdata('login_konsultan', $data_session);
						header('location:'.base_url().'chat_konsultan');
					}
					else{
						echo $data_konsultan->status;
						$this->session->set_flashdata('message', 'Status anda unavailable');
						header('location:'.base_url().'konsultan');
					}
				}
				else{
					$this->session->set_flashdata('message', 'Email atau password salah.');
					header('location:'.base_url().'konsultan');
				}
			}
			else{
				show_404();
			}
		}
		public function proses_keluar(){
			if(isset($this->session->userdata['login_konsultan'])){
				$this->session->unset_userdata('login_konsultan');
				header('location:'.base_url().'konsultan');
			}
			else{
				show_404();
			}
		}
	}