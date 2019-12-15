<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class kelola_konsultan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Sahabat_Skripsi');
		$this->load->helper('url');
		$this->load->library('session');
	}
	public function index(){
		if(isset($this->session->userdata['login_user'])){
            $data['konsultan'] = $this->Sahabat_Skripsi->get_all_consultant();
			$data['judul_halaman'] = 'Kelola Konsultan | Sahabat Skripsi';
			$data['pesan'] = $this->session->flashdata('message');
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/kelola_konsultan', $data);
			$this->load->view('admin/templates/footer', $data);
		}
		else{
			show_404();
		}
	}
    public function tambah_konsultan(){
        if ($this->input->server('REQUEST_METHOD') == 'POST'){
            $config['upload_path'] = 'assets/content/konsultan/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if(!empty($_FILES['gambar_konsultan']['name'])){
                if($this->upload->do_upload('gambar_konsultan')){
                    $data_file = $this->upload->data();
                    $gambar_konsultan = $data_file['file_name'];
                }
            }
            $nama_konsultan = $this->input->post('nama_konsultan');
            $lulusan_konsultan = $this->input->post('lulusan_konsultan');
            $email_konsultan = $this->input->post('email_konsultan');
            $bidang_kejuruan = $this->input->post('bidang_kejuruan');
            $status_konsultan = $this->input->post('status_konsultan');
            $total_konsultan = $this->Sahabat_Skripsi->total_consultant_data();
            if($total_konsultan == 0){
                $number = 0;
            }
            if($total_konsultan > 0){
                $konsultan_terakhir = $this->Sahabat_Skripsi->get_last_consultant();
                $id_terakhir = (int)$konsultan_terakhir['id_konsultan'];
                $number = $id_terakhir+1;
            }
            $raw_password = 'konsultan'.$number;
            $hashed = hash("sha256", $raw_password);
            $password = substr($hashed, 12, 12);
            $author = 'admin';
            $total_konsultan = $this->Sahabat_Skripsi->total_consultant_data();
            if($total_konsultan >= 90){
                $konsultan_lama = $this->Sahabat_Skripsi->get_first_consultant();
                $ext_file = pathinfo($konsultan_lama['gambar_konsultan'], PATHINFO_EXTENSION);
                if($ext_file != ''){
                    $gambar_konsultan_lama = $_SERVER['DOCUMENT_ROOT'].'/testmark01/assets/content/konsultan/'.$konsultan_lama['gambar_konsultan'];
                    unlink($gambar_konsultan_lama);
                }
                $this->Sahabat_Skripsi->del_consultant($konsultan_lama['id_konsultan']);
                $this->Sahabat_Skripsi->add_consultant($gambar_konsultan, $nama_konsultan, $status_konsultan, $bidang_kejuruan, $lulusan_konsultan, $email_konsultan, $password, $author);
                $this->session->set_flashdata('message', 'Konsultan berhasil ditambahkan.');
                header('location:'.base_url().'kelola_konsultan');
            }
            else{
                $this->Sahabat_Skripsi->add_consultant($gambar_konsultan, $nama_konsultan, $status_konsultan, $bidang_kejuruan, $lulusan_konsultan, $email_konsultan, $password, $author);
                $this->session->set_flashdata('message', 'Konsultan berhasil ditambahkan.');
                header('location:'.base_url().'kelola_konsultan');
            }
        }
        else{
            show_404();
        }
    }
    public function ubah_konsultan($id_konsultan){
        if ($this->input->server('REQUEST_METHOD') == 'POST'){
            $config['upload_path'] = 'assets/content/konsultan/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $konsultan_lama = $this->input->post('gambar_lama'.$id_konsultan);
            $konsultan_baru = $this->input->post('gambar_baru'.$id_konsultan);
            if(!empty($_FILES['gambar_konsultan'.$id_konsultan]['name'])){
                $konsultan_baru = $_FILES['gambar_konsultan'.$id_konsultan]['name'];
            }
            if($konsultan_lama != $konsultan_baru){
                if($konsultan_lama == ''){
                    if($this->upload->do_upload('gambar_konsultan'.$id_konsultan)){
                        $data_konsultan_baru = $this->upload->data();
                        $konsultan_lama = $data_konsultan_baru['file_name'];
                    }
                }
                if($konsultan_lama != ''){
                    if(!empty($_FILES['gambar_konsultan'.$id_konsultan]['name'])){
                        $data_konsultan_lama = $_SERVER['DOCUMENT_ROOT'].'/testmark01/assets/content/konsultan/'.$konsultan_lama;
                        if(unlink($data_konsultan_lama)){
                            if($this->upload->do_upload('gambar_konsultan'.$id_konsultan)){
                                $data_konsultan_baru = $this->upload->data();
                                $konsultan_lama = $data_konsultan_baru['file_name'];
                            }
                        }
                    }
                    if(empty($_FILES['gambar_konsultan'.$id_konsultan]['name'])){
                        $data_konsultan_lama = $_SERVER['DOCUMENT_ROOT'].'/testmark01/assets/content/konsultan/'.$konsultan_lama;
                        if(unlink($data_konsultan_lama)){
                            $konsultan_lama = '';
                        }
                    }
                }
            }
            $nama_konsultan = $this->input->post('nama_konsultan'.$id_konsultan);
            $lulusan_konsultan = $this->input->post('lulusan_konsultan'.$id_konsultan);
            $email_konsultan = $this->input->post('email_konsultan'.$id_konsultan);
            $bidang_kejuruan = $this->input->post('bidang_kejuruan'.$id_konsultan);
            $status_konsultan = $this->input->post('status_konsultan'.$id_konsultan);
            $this->Sahabat_Skripsi->edit_consultant($id_konsultan, $konsultan_lama, $nama_konsultan, $status_konsultan, $bidang_kejuruan, $lulusan_konsultan, $email_konsultan);
            $this->session->set_flashdata('message', 'Konsultan berhasil diubah.');
            header('location:'.base_url().'kelola_konsultan');
        }
        else{
            show_404();
        }
    }
    public function hapus_konsultan($id_konsultan){
        if ($this->input->server('REQUEST_METHOD') == 'POST'){
            $hapus_konsultan = $this->Sahabat_Skripsi->get_consultant_data($id_konsultan);
            $ext_file = pathinfo($hapus_konsultan['gambar_konsultan'], PATHINFO_EXTENSION);
            if($ext_file != ''){
                $hapus_gambar_konsultan = $_SERVER['DOCUMENT_ROOT'].'/testmark01/assets/content/konsultan/'.$hapus_konsultan['gambar_konsultan'];
                unlink($hapus_gambar_konsultan);
            }
            $send_by = 'pengguna'.$hapus_konsultan['id_konsultan'];
            $this->Sahabat_Skripsi->del_chat($send_by);
            $this->Sahabat_Skripsi->del_consultant($hapus_konsultan['id_konsultan']);
            $this->session->set_flashdata('message', 'Konsultan berhasil dihapus.');
            header('location:'.base_url().'kelola_konsultan');
        }
        else{
            show_404();
        }
    }
}