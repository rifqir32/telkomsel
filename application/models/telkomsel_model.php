<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class telkomsel_model extends CI_Model {

	// public function GetMenu($where = ""){
	// 	$data = $this->db->query('select * from menu '.$where);
	// 	return $data->result_array();
	// }

	// public function GetKategoriMenu($where = ""){
	// 	$data = $this->db->query('select distinct kategori_makanan from menu '.$where);
	// 	return $data->result_array();
	// }

	// public function GetPaket($where = ""){
	// 	$data = $this->db->query('select * from paket '.$where);
	// 	return $data->result_array();
	// }

	// public function GetPictPaket($where = ""){
	// 	$data = $this->db->query('select pic.id_pict_paket, pic.id_paket, pic.pict_paket, p.kategori_paket
	// 							from pict_paket pic join paket p
	// 							on pic.id_paket = p.id_paket '.$where);
	// 	return $data->result_array();
	// }

	// public function GetKategoriPaket($where = ""){
	// 	$data = $this->db->query('select distinct kategori_paket from paket '.$where);
	// 	return $data->result_array();
	// }

	// public function GetNamaPaket($where = ""){
	// 	$data = $this->db->query('select distinct id_paket, nama_paket from paket '.$where);
	// 	return $data->result_array();
	// }

	public function GetMenu($where = ""){
		$data = $this->db->query('select * from karyawan '.$where);
		return $data->result_array();
	}

	public function GetKategoriMenu($where = ""){
		$data = $this->db->query('select * from karyawan '.$where);
		return $data->result_array();
	}

	public function GetPaket($where = ""){
		$data = $this->db->query('select p.id_paket, kat.kategori_paket, p.nama_paket, p.isi_paket
								from paket p join kategori_paket kat
								on p.kategori_paket = kat.id_kategori_paket '.$where.' order by kat.id_kategori_paket');
		return $data->result_array();
	}

	public function Getpeminjaman($where = ""){
		$data = $this->db->query('SELECT idpeminjaman, nama,nama_divisi, NOPOL,nama_driver, 
			keperluan, jumlah_penumpang, tempat_tujuan, waktu_pemakaian, 
			waktu_kembali, Kondisi FROM peminjaman P join karyawan K 
			on P.id_karyawan = K.id_karyawan join driver D on P.iddriver = D.id_driver join divisi v on k.id_divisi=v.id_divisi '.$where);
		return $data->result_array();
	}

	public function GetPictPaket($where = ""){
		$data = $this->db->query('select pic.id_pict_paket, pic.id_paket, pic.pict_paket, kat.kategori_paket
								from pict_paket pic join paket p
								on pic.id_paket = p.id_paket
								join kategori_paket kat
								on p.kategori_paket = kat.id_kategori_paket '.$where);
		return $data->result_array();
	}

	public function GetNamaPaket($where = ""){
		$data = $this->db->query('select distinct id_paket, nama_paket from paket '.$where);
		return $data->result_array();
	}

	public function GetKaryawan($where = ""){
		$data = $this->db->query('select id_karyawan,nama,nama_divisi,no_hp_karyawan  from karyawan k join divisi d on k.id_divisi=d.id_divisi '.$where);
		return $data->result_array();
	}

	public function GetDivisi($where = ""){
		$data = $this->db->query('select * from divisi'.$where);
		return $data->result_array();
	}

		public function GetDriver($where = ""){
		$data = $this->db->query('select * from driver '.$where);
		return $data->result_array();
	}
	public function GetLogin($where = ""){
		$data = $this->db->query('select * from karyawan '.$where);
		return $data->result_array();
	}
	public function GetGallery($where = ""){
		$data = $this->db->query('select * from gallery '.$where);
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

	public function DeleteData($tableName, $where){
		$res = $this->db->delete($tableName, $where);
		return $res;
	}
}