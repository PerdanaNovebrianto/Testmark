<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kelola_kabar extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Sahabat_Skripsi');
		$this->load->helper('url');
		$this->load->library('session');
	}
	public function index(){
		if(isset($this->session->userdata['login_user'])){
			$data['kabar'] = $this->Sahabat_Skripsi->get_all_post();
			$data['judul_halaman'] = 'Kelola Kabar | Sahabat Skripsi';
			$data['pesan'] = $this->session->flashdata('message');
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/kelola_kabar', $data);
			$this->load->view('admin/templates/footer', $data);
		}
		else{
			show_404();
		}
	}
	public function tambah_kabar(){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$config['upload_path'] = 'assets/content/kabar/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			date_default_timezone_set("Asia/Jakarta");
			$judul_kabar = $this->input->post('judul_kabar');
			$jenis_lampiran = $this->input->post('jenis_lampiran');
			if($jenis_lampiran == 'gambar'){
				if(!empty($_FILES['gambar_kabar']['name'])){
					if($this->upload->do_upload('gambar_kabar')){
						$data_file = $this->upload->data();
						$lampiran_kabar = $data_file['file_name'];
					}
				}
			}
			if($jenis_lampiran == 'video'){
				$video_url = explode('=', $this->input->post('video_kabar'));
				$lampiran_kabar = $video_url[1];
			}
			$deskripsi_kabar = $this->input->post('deskripsi_kabar');
			$tanggal_kabar = date("Y-m-d");
			$author = 'admin';
			$total_kabar = $this->Sahabat_Skripsi->total_post_data();
			if($total_kabar >= 40){
				$kabar_lama = $this->Sahabat_Skripsi->get_last_post();
				$ext_file = pathinfo($kabar_lama['lampiran_kabar'], PATHINFO_EXTENSION);
				if($ext_file != ''){
					$lampiran_kabar_lama = $_SERVER['DOCUMENT_ROOT'].'/assets/content/kabar/'.$kabar_lama['lampiran_kabar'];
					unlink($lampiran_kabar_lama);
				}
				$this->Sahabat_Skripsi->del_post($kabar_lama['id_kabar']);
				$this->Sahabat_Skripsi->add_post($judul_kabar, $lampiran_kabar, $deskripsi_kabar, $tanggal_kabar, $author);
				$this->session->set_flashdata('message', 'Kabar berhasil ditambahkan.');
				header('location:'.base_url().'kelola_kabar');
			}
			else{
				$this->Sahabat_Skripsi->add_post($judul_kabar, $lampiran_kabar, $deskripsi_kabar, $tanggal_kabar, $author);
				$this->session->set_flashdata('message', 'Kabar berhasil ditambahkan.');
				header('location:'.base_url().'kelola_kabar');
			}
		}
		else{
			show_404();
		}
	}
	public function ubah_kabar($id_kabar){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$config['upload_path'] = './assets/content/kabar/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			$judul_kabar = $this->input->post('judul_kabar'.$id_kabar);
			$lampiran_kabar_lama = $this->input->post('lampiran_kabar_lama'.$id_kabar);
			$lampiran_kabar_baru = $this->input->post('lampiran_kabar_baru'.$id_kabar);
			$jenis_lampiran_lama = $this->input->post('jenis_lampiran_lama'.$id_kabar);
			$jenis_lampiran_baru = $this->input->post('jenis_lampiran_baru'.$id_kabar);
			if(!empty($_FILES['gambar_kabar'.$id_kabar]['name'])){
				$lampiran_kabar_baru = $_FILES['gambar_kabar'.$id_kabar]['name'];
			}
			if(!empty($this->input->post('video_kabar'.$id_kabar))){
				$lampiran_kabar_baru = $this->input->post('video_kabar'.$id_kabar);
			}
			if($lampiran_kabar_lama != $lampiran_kabar_baru){
				if($jenis_lampiran_baru == 'gambar'){
					if($jenis_lampiran_lama == '' || $jenis_lampiran_lama == 'video'){
						if($this->upload->do_upload('gambar_kabar'.$id_kabar)){
							$data_lampiran_baru = $this->upload->data();
							$lampiran_kabar_lama = $data_lampiran_baru['file_name'];
						}
					}
					if($jenis_lampiran_lama == $jenis_lampiran_baru){
						$data_lampiran_lama = $_SERVER['DOCUMENT_ROOT'].'/assets/content/kabar/'.$lampiran_kabar_lama;
						if(unlink($data_lampiran_lama)){
							if(!empty($_FILES['gambar_kabar'.$id_kabar]['name'])){
								if($this->upload->do_upload('gambar_kabar'.$id_kabar)){
									$data_lampiran_baru = $this->upload->data();
									$lampiran_kabar_lama = $data_lampiran_baru['file_name'];
								}
							}
							if(empty($_FILES['gambar_kabar'.$id_kabar]['name'])){
								$lampiran_kabar_lama = '';
							}
						}
					}
				}
				if($jenis_lampiran_baru == 'video'){
					if($jenis_lampiran_lama == '' || $jenis_lampiran_lama == $jenis_lampiran_baru){
						$video_url_baru = explode('=', $this->input->post('video_kabar'.$id_kabar));
						$lampiran_kabar_lama = $video_url_baru[1];
					}
					if($jenis_lampiran_lama == 'gambar'){
						$data_lampiran_lama = $_SERVER['DOCUMENT_ROOT'].'/assets/content/kabar/'.$lampiran_kabar_lama;
						if(unlink($data_lampiran_lama)){
							if(!empty($this->input->post('video_kabar'.$id_kabar))){
								$video_url_baru = explode('=', $this->input->post('video_kabar'.$id_kabar));
								$lampiran_kabar_lama = $video_url_baru[1];
							}
							if(empty($this->input->post('video_kabar'.$id_kabar))){
								$lampiran_kabar_lama = '';
							}
						}
					}
				}
				if($jenis_lampiran_baru == ''){
					if($jenis_lampiran_lama == 'gambar'){
						$data_lampiran_lama = $_SERVER['DOCUMENT_ROOT'].'/assets/content/kabar/'.$lampiran_kabar_lama;
						if(unlink($data_lampiran_lama)){
							$lampiran_kabar_lama = '';
						}
					}
					if($jenis_lampiran_lama == 'video'){
						$lampiran_kabar_lama = '';
					}
				}
			}
			$deskripsi_kabar = $this->input->post('deskripsi_kabar'.$id_kabar);
			$this->Sahabat_Skripsi->edit_post($id_kabar, $judul_kabar, $lampiran_kabar_lama, $deskripsi_kabar);
			$this->session->set_flashdata('message', 'Kabar berhasil diubah.');
			header('location:'.base_url().'kelola_kabar');
		}
		else{
			show_404();
		}
	}
	public function hapus_kabar($id_kabar){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$hapus_kabar = $this->Sahabat_Skripsi->get_post_data($id_kabar);
			$ext_file = pathinfo($hapus_kabar['lampiran_kabar'], PATHINFO_EXTENSION);
			if($ext_file != ''){
				$hapus_lampiran_kabar = $_SERVER['DOCUMENT_ROOT'].'/assets/content/kabar/'.$hapus_kabar['lampiran_kabar'];
				unlink($hapus_lampiran_kabar);
			}
			$this->Sahabat_Skripsi->del_post($hapus_kabar['id_kabar']);
			$this->session->set_flashdata('message', 'Kabar berhasil dihapus.');
			header('location:'.base_url().'kelola_kabar');
		}
		else{
			show_404();
		}
	}
}