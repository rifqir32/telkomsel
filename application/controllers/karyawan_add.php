<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class karyawan_add extends CI_Controller {

	public function index(){
		// $this->load->view('form_member_add');
		$data = $this->telkomsel_model->GetDivisi();
		$this->load->view('form_member_add', array('data' => $data));
	}

	public function do_insert(){
		$id_karyawan = $_POST['id_karyawan'];
		$nama_karyawan = $_POST['nama_karyawan'];
		$divisi = $_POST['divisi'];
		$password = $_POST['password'];
		$status_akses = $_POST['status_akses'];
		$nomerhp = $_POST['nomerhp'];

		$data_insert = array(
			'id_karyawan' => $id_karyawan,
			'nama' => $nama_karyawan,
			'id_divisi' => $divisi,
			'password' => $password,
			'status_akses' => $status_akses,
			'no_hp_karyawan' => $nomerhp
		);

		$res = $this->telkomsel_model->InsertData('karyawan',$data_insert);

		if($res >= 1){
			redirect('kelola_karyawan');
		}else{
			echo "<h2>Insert Data Gagal</h2>";
		}
	}

}
