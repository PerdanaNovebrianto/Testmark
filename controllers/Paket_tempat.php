<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Paket_tempat extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Sahabat_Skripsi');
		$this->load->helper('url');
		$this->load->library('session');
	}
	public function index(){
		if(isset($this->session->userdata['login_user'])){
            $data['paket'] = $this->Sahabat_Skripsi->get_all_place();
			$data['judul_halaman'] = 'Kelola Tempat | Sahabat Skripsi';
			$data['pesan'] = $this->session->flashdata('message');
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/paket_tempat', $data);
			$this->load->view('admin/templates/footer', $data);
		}
		else{
			show_404();
		}
	}
    public function tambah_paket(){
        if ($this->input->server('REQUEST_METHOD') == 'POST'){
            $nama_paket = $this->input->post('nama_paket');
            $harga_paket = $this->input->post('harga_paket');
            $deskripsi_paket = $this->input->post('deskripsi_paket');
            $jenis_paket = 'tempat';
            $author = 'admin';
            $this->Sahabat_Skripsi->add_package($nama_paket, $harga_paket, $deskripsi_paket, $jenis_paket, $author);
            $this->session->set_flashdata('message', 'Paket berhasil ditambahkan.');
            header('location:'.base_url().'paket_tempat');
        }
        else{
            show_404();
        }
    }
    public function ubah_paket($id_paket){
        if ($this->input->server('REQUEST_METHOD') == 'POST'){
            $nama_paket = $this->input->post('nama_paket'.$id_paket);
            $harga_paket = $this->input->post('harga_paket'.$id_paket);
            $deskripsi_paket = $this->input->post('deskripsi_paket'.$id_paket);
            $this->Sahabat_Skripsi->edit_package($id_paket, $nama_paket, $harga_paket, $deskripsi_paket);
            $this->session->set_flashdata('message', 'Paket berhasil diubah.');
            header('location:'.base_url().'paket_tempat');
        }
        else{
            show_404();
        }
    }
    public function hapus_paket($id_paket){
        if ($this->input->server('REQUEST_METHOD') == 'POST'){
            $this->Sahabat_Skripsi->del_package($id_paket);
            $this->session->set_flashdata('message', 'Paket berhasil dihapus.');
            header('location:'.base_url().'paket_tempat');
        }
        else{
            show_404();
        }
    }
}