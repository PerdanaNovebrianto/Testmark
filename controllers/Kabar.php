<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Kabar extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->model('Sahabat_Skripsi');
			$this->load->helper('url');
			$this->load->library('session');
		}
		public function index(){
			$this->load->library('pagination');
			$config['base_url'] = base_url().'kabar/index';
			$config['total_rows'] = $this->Sahabat_Skripsi->total_post_data();
			$config['per_page'] = 4;
			$config['uri_segment'] = 3;
			$config['num_links'] = 3;
			$config['full_tag_open']    = '<ul class="pagination pagination_links">';
			$config['full_tag_close']   = '</ul>';
			$config['num_tag_open']     = '<li class="page-item">';
			$config['num_tag_close']    = '</li>';
			$config['cur_tag_open']     = '<li class="page-item"><span class="cur_links">';
			$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
			$config['next_tag_open']    = '<li class="page-item">';
			$config['next_tag_close']   = '<span aria-hidden="true"></span></li>';
			$config['prev_tag_open']    = '<li class="page-item">';
			$config['prev_tag_close']   = '</li>';
			$config['first_tag_open']   = '<li class="page-item">';
			$config['first_tag_close']  = '</li>';
			$config['last_tag_open']    = '<li class="page-item">';
			$config['last_tag_close']   = '</li>';
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$this->pagination->initialize($config);
			$data['links'] = $this->pagination->create_links();
			$data['kabar'] = $this->Sahabat_Skripsi->get_public_post($config["per_page"], $page);
			$data['judul_halaman'] = 'Kabar | Sahabat Skripsi';
			$this->load->view('public/templates/header', $data);
			$this->load->view('public/kabar', $data);
			$this->load->view('public/templates/footer', $data);
		}
	}