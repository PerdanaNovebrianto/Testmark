<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Pendaftaran extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->model('Sahabat_Skripsi');
			$this->load->helper('url');
			$this->load->library('session');
		}
		public function index(){
			$data['konsultan'] = $this->Sahabat_Skripsi->get_all_consultant();
			$data['paket_tempat'] = $this->Sahabat_Skripsi->get_all_place();
			$data['paket_bimbingan'] = $this->Sahabat_Skripsi->get_all_guide();
			$data['pesan'] = $this->session->flashdata('message');
			$data['judul_halaman'] = 'Pendaftaran Peserta | Sahabat Skripsi';
			$this->load->view('public/templates/header', $data);
			$this->load->view('public/pendaftaran', $data);
			$this->load->view('public/templates/footer', $data);
		}
		public function kirim_pendaftaran(){
			if ($this->input->server('REQUEST_METHOD') == 'POST'){
				$nama = $this->input->post('nama_pendaftar');
                $universitas = $this->input->post('universitas_pendaftar');
                $angkatan = $this->input->post('angkatan_pendaftar');
                $email = $this->input->post('email_pendaftar');
                $telepon = $this->input->post('telepon_pendaftar');
                $bidang = $this->input->post('bidang_pendaftar');
                if($bidang == 'saintek'){
                    $id_konsultan = $this->input->post('konsultan_saintek');
                }
                if($bidang == 'soshum'){
                    $id_konsultan = $this->input->post('konsultan_soshum');
                }
                $data_konsultan = $this->Sahabat_Skripsi-> get_konsultan_data($id_konsultan);
                foreach ($data_konsultan as $item_konsultan):
                	$nama_konsultan = $item_konsultan->nama_konsultan;
                endforeach;
                $total_pengguna = $this->Sahabat_Skripsi->total_user();
                if($total_pengguna == 0){
                    $number = 0;
                }
                if($total_pengguna > 0){
                    $pengguna_terakhir = $this->Sahabat_Skripsi->get_last_user();
                    $id_terakhir = (int)$pengguna_terakhir['id'];
                    $number = $id_terakhir+1;
                }
                $raw_password = 'pengguna'.$number;
                $hashed = hash("sha256", $raw_password);
                $password = substr($hashed, 12, 12);
                $status = 'unactive';
                $verify_email = $this->Sahabat_Skripsi->verify_email($email);
                if($verify_email > 0){
                    $this->Sahabat_Skripsi->edit_add_user($email, $universitas, $angkatan, $telepon, $id_konsultan);
                }
                if($verify_email == 0){
                    $this->Sahabat_Skripsi->add_user($nama, $universitas, $angkatan, $email, $telepon, $id_konsultan, $password, $status);
                }
                $tempat = array();
				$nama_tempat = array();
				$jumlah_tempat = count($this->input->post('tempat'));
				for($i=0; $i<$jumlah_tempat; $i++){
					$tempat[$i] = $this->input->post('tempat')[$i];
					$nama_tempat[$i] = $this->input->post('nama_tempat'.$tempat[$i]);
				}
    			$paket_tempat = implode(', ', $nama_tempat);
				$bimbingan = array();
				$nama_bimbingan = array();
				$jumlah_bimbingan = count($this->input->post('bimbingan'));
				for($i=0; $i<$jumlah_bimbingan; $i++){
					$bimbingan[$i] = $this->input->post('bimbingan')[$i];
					$nama_bimbingan[$i] = $this->input->post('nama_bimbingan'.$bimbingan[$i]);
				}
    			$paket_bimbingan = implode(', ', $nama_bimbingan);
    			$keterangan = $this->input->post('keterangan_pendaftar');
                $total = $this->input->post('total_pendaftar');
                $config = array(
                      'mailtype' => 'html',
                      'charset'  => 'utf-8',
                      'priority' => '1'
                );
                $this->load->library('email', $config);
                $dataMail = array(
                    'nama_pendaftar'=>$nama,
                    'universitas_pendaftar'=>$universitas,
                    'angkatan_pendaftar'=>$angkatan,
                    'email_pendaftar'=>$email,
                    'telepon_pendaftar'=>$telepon,
                    'bidang_pendaftar'=>$bidang,
                    'konsultan_pendaftar'=>$nama_konsultan,
                    'tempat_pendaftar'=>$paket_tempat,
                    'bimbingan_pendaftar'=>$paket_bimbingan,
                    'keterangan_pendaftar'=>$keterangan,
                    'total_pendaftar'=>$total
                );
                $this->email->from('daftarkessj@gmail.com', $nama);
                $this->email->to('sahabatskripsijogja@gmail.com');
                $this->email->subject('Daftar Sahabat Skripsi');
                $message = $this->load->view('mail', $dataMail, TRUE);
                $this->email->message($message);
                $this->email->send();
				$this->session->set_flashdata('message', 'Pendaftaran anda berhasil dikirim.');
				header('location:'.base_url().'pendaftaran');
			}
			else{
				show_404();
			}
		}
	}