<?php
	Class Sahabat_Skripsi extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		public function verify_admin(){
			$query = $this->db->get_where('admin', array('authority' => 'admin'));
			return $query->row_array();
		}
		public function verify_konsultan($email, $password){
			$query = $this->db->get_where('konsultan', array('email' => $email, 'password' => $password));
			return $query->num_rows();
		}
		public function get_konsultan($email, $password){
			$query = $this->db->get_where('konsultan', array('email' => $email, 'password' => $password));
			return $query->row_array();
		}
		public function get_konsultan_data($id_konsultan){
			$query = $this->db->get_where('konsultan', array('id_konsultan' => $id_konsultan));
			return $query->result();
		}
		public function verify_pengguna($email, $password){
			$query = $this->db->get_where('pengguna', array('email' => $email, 'password' => $password));
			return $query->num_rows();
		}
		public function get_pengguna($email, $password){
			$query = $this->db->get_where('pengguna', array('email' => $email, 'password' => $password));
			return $query->row_array();
		}
		public function get_pengguna_data($id_konsultan){
			$query = $this->db->get_where('pengguna', array('id_konsultan' => $id_konsultan, 'status' => 'active'));
			return $query->result();
		}
		public function change_password($final_password){
			$data = array('password_admin' => $final_password);
			return $this->db->update('admin', $data);
		}
		public function total_post_data(){
			$query = $this->db->get('kabar');
			return $query->num_rows();
		}
		public function get_public_post($limit, $start){
			$this->db->select("*");
			$this->db->from("kabar");
			$this->db->order_by('id_kabar','DESC');
			$this->db->limit($limit, $start);
			$query = $this->db->get();
			return $query->result();
		}
		public function get_all_post(){
			$this->db->select("*");
			$this->db->from("kabar");
			$query = $this->db->get();
			return $query->result();
		}
		public function get_last_post(){
			$this->db->select("*");
			$this->db->from("kabar");
			$this->db->order_by('id_kabar','ASC');
			$this->db->limit(1);
			$query = $this->db->get();
			return $query->row_array();
		}
		public function get_post_data($id_kabar){
			$query = $this->db->get_where('kabar',array('id_kabar' => $id_kabar));
			return $query->row_array();
		}
		public function add_post($judul_kabar, $lampiran_kabar, $deskripsi_kabar, $tanggal_kabar, $author){
			$data = array(
				'judul_kabar' => $judul_kabar,
				'lampiran_kabar' => $lampiran_kabar,
				'deskripsi_kabar' => $deskripsi_kabar,
				'tanggal_kabar' => $tanggal_kabar,
				'author' => $author
			);
			return $this->db->insert('kabar', $data);
		}
		public function edit_post($id_kabar, $judul_kabar, $lampiran_kabar_lama, $deskripsi_kabar){
			$data = array(
				'judul_kabar' => $judul_kabar,
				'lampiran_kabar' => $lampiran_kabar_lama,
				'deskripsi_kabar' => $deskripsi_kabar
			);
			$this->db->where('id_kabar', $id_kabar);
			return $this->db->update('kabar', $data);
		}
		public function del_post($id_kabar){
			return $this->db->delete('kabar',array('id_kabar' => $id_kabar));
		}
		public function total_testimoni_data(){
			$query = $this->db->get('testimoni');
			return $query->num_rows();
		}
		public function get_all_testimoni(){
			$this->db->select("*");
			$this->db->from("testimoni");
			$this->db->order_by('id','DESC');
			$query = $this->db->get();
			return $query->result();
		}
		public function add_testimoni($nama_testimoni, $author){
			$data = array(
				'nama' => $nama_testimoni,
				'author' => $author
			);
			return $this->db->insert('testimoni', $data);
		}
		public function del_testimoni($id_testimoni){
			return $this->db->delete('testimoni',array('id' => $id_testimoni));
		}
		public function total_consultant_data(){
			$query = $this->db->get('konsultan');
			return $query->num_rows();
		}
		public function get_public_consultant($limit, $start){
			$this->db->select("*");
			$this->db->from("konsultan");
			$this->db->order_by('id_konsultan','DESC');
			$this->db->limit($limit, $start);
			$query = $this->db->get();
			return $query->result();
		}
		public function get_all_consultant(){
			$this->db->select("*");
			$this->db->from("konsultan");
			$query = $this->db->get();
			return $query->result();
		}
		public function get_first_consultant(){
			$this->db->select("*");
			$this->db->from("konsultan");
			$this->db->order_by('id_konsultan','ASC');
			$this->db->limit(1);
			$query = $this->db->get();
			return $query->row_array();
		}
		public function get_last_consultant(){
			$this->db->select("*");
			$this->db->from("konsultan");
			$this->db->order_by('id_konsultan','DESC');
			$this->db->limit(1);
			$query = $this->db->get();
			return $query->row_array();
		}
		public function get_consultant_data($id_konsultan){
			$query = $this->db->get_where('konsultan',array('id_konsultan' => $id_konsultan));
			return $query->row_array();
		}
		public function add_consultant($gambar_konsultan, $nama_konsultan, $status_konsultan, $bidang_kejuruan, $lulusan_konsultan, $email_konsultan, $password, $author){
			$data = array(
				'gambar_konsultan' => $gambar_konsultan,
				'nama_konsultan' => $nama_konsultan,
				'status_konsultan' => $status_konsultan,
				'bidang_kejuruan' => $bidang_kejuruan,
				'lulusan_konsultan' => $lulusan_konsultan,
				'email' => $email_konsultan,
				'password' => $password,
				'author' => $author
			);
			return $this->db->insert('konsultan', $data);
		}
		public function edit_consultant($id_konsultan, $konsultan_lama, $nama_konsultan, $status_konsultan, $bidang_kejuruan, $lulusan_konsultan, $email_konsultan){
			$data = array(
				'gambar_konsultan' => $konsultan_lama,
				'nama_konsultan' => $nama_konsultan,
				'status_konsultan' => $status_konsultan,
				'bidang_kejuruan' => $bidang_kejuruan,
				'lulusan_konsultan' => $lulusan_konsultan,
				'email' => $email_konsultan
			);
			$this->db->where('id_konsultan', $id_konsultan);
			return $this->db->update('konsultan', $data);
		}
		public function del_consultant($id_konsultan){
			return $this->db->delete('konsultan',array('id_konsultan' => $id_konsultan));
		}
		public function get_all_place(){
			$this->db->select("*");
			$this->db->from("paket");
			$this->db->where('jenis_paket','tempat');
			$query = $this->db->get();
			return $query->result();
		}
		public function get_all_guide(){
			$this->db->select("*");
			$this->db->from("paket");
			$this->db->order_by('id_paket','DESC');
			$this->db->where('jenis_paket','bimbingan');
			$query = $this->db->get();
			return $query->result();
		}
		public function add_package($nama_paket, $harga_paket, $deskripsi_paket, $jenis_paket, $author){
			$data = array(
				'nama_paket' => $nama_paket,
				'harga_paket' => $harga_paket,
				'deskripsi_paket' => $deskripsi_paket,
				'jenis_paket' => $jenis_paket,
				'author' => $author
			);
			return $this->db->insert('paket', $data);
		}
		public function edit_package($id_paket, $nama_paket, $harga_paket, $deskripsi_paket){
			$data = array(
				'nama_paket' => $nama_paket,
				'harga_paket' => $harga_paket,
				'deskripsi_paket' => $deskripsi_paket
			);
			$this->db->where('id_paket', $id_paket);
			return $this->db->update('paket', $data);
		}
		public function del_package($id_paket){
			return $this->db->delete('paket',array('id_paket' => $id_paket));
		}
		public function total_user(){
			$this->db->select("*");
			$this->db->from("pengguna");
			$query = $this->db->get();
			return $query->num_rows();
		}
		public function get_all_user(){
			$this->db->select("*");
			$this->db->from("pengguna");
			$query = $this->db->get();
			return $query->result();
		}
		public function get_last_user(){
			$this->db->select("*");
			$this->db->from("pengguna");
			$this->db->order_by('id','DESC');
			$this->db->limit(1);
			$query = $this->db->get();
			return $query->row_array();
		}
		public function verify_email($email){
			$query = $this->db->get_where('pengguna', array('email' => $email));
			return $query->row_array();
		}
		public function add_user($nama, $universitas, $angkatan, $email, $telepon, $id_konsultan, $password, $status){
			$data = array(
				'nama' => $nama,
				'universitas' => $universitas,
				'angkatan' => $angkatan,
				'email' => $email,
				'phone' => $telepon,
				'id_konsultan' => $id_konsultan,
				'password' => $password,
				'status' => $status
			);
			return $this->db->insert('pengguna', $data);
		}
		public function edit_add_user($email, $universitas, $angkatan, $telepon, $id_konsultan){
			$data = array(
				'universitas' => $universitas,
				'angkatan' => $angkatan,
				'phone' => $telepon,
				'id_konsultan' => $id_konsultan
			);
			$this->db->where('email', $email);
			return $this->db->update('pengguna', $data);
		}
		public function edit_user($id, $status){
			$data = array(
				'status' => $status
			);
			$this->db->where('id', $id);
			return $this->db->update('pengguna', $data);
		}
		public function del_user($id){
			return $this->db->delete('pengguna',array('id' => $id));
		}
		public function send_chat($pengirim, $penerima, $pesan, $waktu){
			$data = array(
				'send_by' => $pengirim,
				'send_to' => $penerima,
				'pesan' => $pesan,
				'waktu' => $waktu
			);
			return $this->db->insert('chat', $data);
		}
		public function get_chat($pengirim, $penerima){
			$this->db->select("*");
			$this->db->from("chat");
			$condition = "`send_by`= '$pengirim' AND `send_to` = '$penerima' OR `send_by`= '$penerima' AND `send_to` = '$pengirim'";
			$this->db->where($condition);
			$query = $this->db->get();
			return $query->result();
		}
		public function del_chat($send_by){
			return $this->db->delete('chat',array('send_by' => $send_by));
		}
	}
?>