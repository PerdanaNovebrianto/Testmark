<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kelola_pengguna extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Sahabat_Skripsi');
		$this->load->helper('url');
		$this->load->library('session');
	}
	public function index(){
		if(isset($this->session->userdata['login_user'])){
			$data['pengguna'] = $this->Sahabat_Skripsi->get_all_user();
			$data['judul_halaman'] = 'Kelola Pengguna | Sahabat Skripsi';
			$data['pesan'] = $this->session->flashdata('message');
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/kelola_pengguna', $data);
			$this->load->view('admin/templates/footer', $data);
		}
		else{
			show_404();
		}
	}
	public function ubah_pengguna($id){
        if ($this->input->server('REQUEST_METHOD') == 'POST'){
            $status = $this->input->post('status'.$id);
            $this->Sahabat_Skripsi->edit_user($id, $status);
            $this->session->set_flashdata('message', 'Pengguna berhasil diubah.');
            header('location:'.base_url().'kelola_pengguna');
        }
        else{
            show_404();
        }
    }
	public function hapus_pengguna($id){
        if ($this->input->server('REQUEST_METHOD') == 'POST'){
            $this->Sahabat_Skripsi->del_user($id);
            $send_by = 'pengguna'.$id;
            $this->Sahabat_Skripsi->del_chat($send_by);
            $this->session->set_flashdata('message', 'Pengguna berhasil dihapus.');
            header('location:'.base_url().'kelola_pengguna');
        }
        else{
            show_404();
        }
    }
}