<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kelola_testimoni extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Sahabat_Skripsi');
		$this->load->helper('url');
		$this->load->library('session');
	}
	public function index(){
		if(isset($this->session->userdata['login_user'])){
			$data['total_testimoni'] = $this->Sahabat_Skripsi->total_testimoni_data();
			$data['testimoni'] = $this->Sahabat_Skripsi->get_all_testimoni();
			$data['judul_halaman'] = 'Kelola Testimoni | Sahabat Skripsi';
			$data['pesan'] = $this->session->flashdata('message');
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/kelola_testimoni', $data);
			$this->load->view('admin/templates/footer', $data);
		}
		else{
			show_404();
		}
	}
	public function kelola_testimoni(){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
        	$author = 'admin';
            $uploadPath = './assets/content/testimoni/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $uploaded = $this->Sahabat_Skripsi->total_testimoni_data();
            for($i=0; $i<$uploaded; $i++){
            	$id_testimoni = $this->input->post('id_testimoni'.$i);
            	$testimoni_lama = $this->input->post('testimoni_lama'.$i);
            	$testimoni_baru = $this->input->post('testimoni_baru'.$i);
            	if($testimoni_baru != $testimoni_lama){
            		$hapus_testimoni = $_SERVER['DOCUMENT_ROOT'].'/assets/content/testimoni/'.$testimoni_lama;
					unlink($hapus_testimoni);
            		$this->Sahabat_Skripsi->del_testimoni($id_testimoni);
            	}
            }
			$jumlah_testimoni = count($_FILES['gambar_testimoni']['name']);
            for($i=0; $i<$jumlah_testimoni; $i++){
                $_FILES['testimoni']['name']     = $_FILES['gambar_testimoni']['name'][$i];
                $_FILES['testimoni']['type']     = $_FILES['gambar_testimoni']['type'][$i];
                $_FILES['testimoni']['tmp_name'] = $_FILES['gambar_testimoni']['tmp_name'][$i];
                $_FILES['testimoni']['error']    = $_FILES['gambar_testimoni']['error'][$i];
                $_FILES['testimoni']['size']     = $_FILES['gambar_testimoni']['size'][$i];
                if($this->upload->do_upload('testimoni')){
                    $data_testimoni = $this->upload->data();
                    $nama_testimoni = $data_testimoni['file_name'];
                    $this->Sahabat_Skripsi->add_testimoni($nama_testimoni, $author);
                }
            }
            $this->session->set_flashdata('message', 'Testimoni berhasil diubah.');
            header('location:'.base_url().'kelola_testimoni');
		}
		else{
			show_404();
		}
	}
}