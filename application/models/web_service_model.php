<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web_service_model extends CI_Model {

	
	public function GetMenu($where = ""){
		$data = $this->db->query('select * from karyawan '.$where);
		return $data->result_array();
	}

	public function getAllPeminjaman(){
		$data = $this->db->query('select * from peminjaman');
		return $data->result_array();

	}
}