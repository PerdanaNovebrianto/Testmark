<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pengaturan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Sahabat_Skripsi');
		$this->load->helper('url');
		$this->load->library('session');
	}
	public function index(){
		$data['judul_halaman'] = 'Pengaturan | Sahabat Skripsi';
		$data['pesan'] = $this->session->flashdata('message');
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/pengaturan', $data);
		$this->load->view('admin/templates/footer', $data);
	}
	public function ubah_password(){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$old_password = hash("sha256", $this->input->post('old_password'));
			$new_password = $this->input->post('new_password');
			$conf_new_password = $this->input->post('conf_new_password');
			$verify = $this->Sahabat_Skripsi->verify_admin();;
			if($old_password == $verify['password_admin']){
				if($new_password == $conf_new_password){
					$final_password = hash("sha256", $new_password);
					$this->Sahabat_Skripsi->change_password($final_password);
					$this->session->sess_destroy();
					header('location:'.base_url().'admin');
				}
				else{
					$this->session->set_flashdata('message', 'Konfirmasi password baru tidak sesuai dengan password baru.');
					header('location:'.base_url().'pengaturan');
				}
			}
			else{
				$this->session->set_flashdata('message', 'Password lama salah.');
				header('location:'.base_url().'pengaturan');
			}
		}
		else{
			show_404();
		}
	}
}