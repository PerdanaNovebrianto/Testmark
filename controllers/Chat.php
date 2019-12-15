<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Chat extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->model('Sahabat_Skripsi');
			$this->load->helper('url');
			$this->load->library('session');
		}
		public function send_chat(){
			if ($this->input->server('REQUEST_METHOD') == 'POST'){
				$pengirim = $this->input->post('pengirim');
				$penerima = $this->input->post('penerima');
				$pesan = $this->input->post('pesan');
				date_default_timezone_set("Asia/Jakarta");
				$waktu = date('Y-m-d H:i:s');
				$query = $this->Sahabat_Skripsi->send_chat($pengirim, $penerima, $pesan, $waktu);
			}
			else{
				show_404();
			}
		}
		public function get_chat(){
		    if (isset($this->session->userdata['login_pengguna']) || isset($this->session->userdata['login_konsultan'])){
				if(isset($this->session->userdata['login_pengguna'])){
					$pengirim = $this->session->userdata['login_pengguna']['tipe'].$this->session->userdata['login_pengguna']['id'];
				}
				if(isset($this->session->userdata['login_konsultan'])){
					$pengirim = $this->session->userdata['login_konsultan']['tipe'].$this->session->userdata['login_konsultan']['id'];
				}
				$penerima = $this->input->get('penerima');
				$chat = $this->Sahabat_Skripsi->get_chat($pengirim, $penerima);
				foreach ($chat as $item_chat):
					if($item_chat->send_by == $pengirim){
					?>
						<div class="clearfix">
							<div class="sender-chat-text" align="left"><?php echo $item_chat->pesan; ?></div>
						</div>
					<?php
					}
					else{
					?>
						<div class="clearfix">
							<div class="reciever-chat-text" align="right"><?php echo $item_chat->pesan; ?></div>
						</div>
					<?php
					}
				endforeach;
		    }
			else{
				show_404();
			}
		}
	}