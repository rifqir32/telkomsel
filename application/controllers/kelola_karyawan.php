<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kelola_karyawan extends CI_Controller {

	public function index(){
		$data = $this->telkomsel_model->GetKaryawan();
		$this->load->view('table_member', array('data' => $data));
	}

	public function edit_menu($id_karyawan){
		$mn = $this->telkomsel_model->GetKaryawan("where id_karyawan = '$id_karyawan'");
		$data = array(
				'id_karyawan' => $mn[0]['id_karyawan'],
				'nama' => $mn[0]['nama'],
				'nama_divisi' => $mn[0]['nama_divisi'],
				'no_hp_karyawan' => $mn[0]['nomerhp'],
				// 'kategori_makanan' => $mn[0]['kategori_makanan']
			);
		$data2 = $this->telkomsel_model->GetKategoriMenu();
		// $this->load->view('form_menus_edit', $data);
		$this->load->view('form_member_edit', array('data' => $data,'data2' => $data2));
	}

	public function do_update(){
		$this->load->view('form_member_edit');
		
		$id_menu = $_POST['id_menu'];
		$nama_makanan = $_POST['nama_makanan'];
		$desc_makanan = $_POST['deskripsi_makanan'];
		// $pict_makanan = $_POST['gambar_makanan'];
		if (isset($img)) {
			$pict_makanan = $img;
		} else {
			$pict_makanan = "no image";
		}
		$kategori_makanan = $_POST['kategori_makanan'];

		echo "$pict_makanan";

		if ($pict_makanan == "no image") {
			$data_update = array(
				'id_menu' => $id_menu,
				'nama_makanan' => $nama_makanan,
				'desc_makanan' => $desc_makanan,
				'kategori_makanan' => $kategori_makanan
			);
			$where = array('id_menu' => $id_menu);
			$res = $this->telkomsel_model->UpdateData('menu',$data_update, $where);
		} elseif ($pict_makanan != "no image") {
			$data_update = array(
				'id_menu' => $id_menu,
				'nama_makanan' => $nama_makanan,
				'desc_makanan' => $desc_makanan,
				'pict_makanan' => $pict_makanan,
				'kategori_makanan' => $kategori_makanan
			);
			$where = array('id_menu' => $id_menu);
			$res = $this->telkomsel_model->UpdateData('menu',$data_update, $where);
		}

		if($res >= 1){
			redirect('kelola_karyawan');
		}else{
			echo "<h2>Update Data Gagal</h2>";
			echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
		}
	}

	public function do_delete($id_karyawan){
		$where = array('id_karyawan' => $id_karyawan);
		$res = $this->telkomsel_model->DeleteData('karyawan',$where);

		if($res >= 1){
			redirect('kelola_karyawan');
		}else{
			echo "<h2>Delete Data Gagal</h2>";
			echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
		}
	}

}
