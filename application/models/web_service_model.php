<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web_service_model extends CI_Model {

	public function __construct() {
			parent::__construct();
			
		}
	public function kegiatan($where = "") {
			$data = $this->db->query("select k.id_kegiatan, k.nama_kegiatan, kat.nama_kategori as kategori, w.nama_wilayah as wilayah, d.nama_desa as lokasi, k.waktu_pelaksanaan, k.batas_registrasi as batas_konfirmasi, k.jumlah_relawan, k.maks_relawan as jumlah_relawan_estimasi, k.jumlah_dana as jumlah_dana_masuk, k.kebutuhan_dana as jumlah_dana_estimasi, k.longitude, k.latitude, k.img, k.deskripsi
									from kegiatan k
									join desa d
									on k.id_desa = d.id_desa
									join wilayah w
									on d.id_wilayah = w.id_wilayah
									join kategori kat
									on k.id_kategori = kat.id_kategori ".$where);
			return $data->result_array();
		}

		public function user($where = "") {
			$data = $this->db->query("select id_relawan, password, nama_relawan from relawan ".$where);
			return $data->result_array();
		}

		public function partisipasi($where = "") {
			$data = $this->db->query("select id_partisipasi, id_relawan, id_kegiatan from partisipasi ".$where);
			return $data->result_array();
		}

		public function jumlah_relawan($where = "") {
			$data = $this->db->query("select jumlah_relawan from kegiatan ".$where);
			return $data->result_array();
		}

		public function jumlah_dana($where = "") {
			$data = $this->db->query("select jumlah_dana from kegiatan ".$where);
			return $data->result_array();
		}

		public function idForImage($where = ""){
			$data = $this->db->query("select id_kegiatan from kegiatan ".$where." order by id_kegiatan asc");
			return $data->result_array();
		}

		public function InsertData($tableName, $data){
			$res = $this->db->insert($tableName, $data);
			return $res;
		}

		public function UpdateData($tableName, $data, $where){
			$res = $this->db->update($tableName, $data, $where);
			return $res;	
		}


}