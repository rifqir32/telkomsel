<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kelola_pinjaman extends CI_Controller {

	public function index(){
		$data = $this->telkomsel_model->GetPeminjaman();
		$this->load->view('table_peminjaman', array('data' => $data));
	}

	public function edit_menu($id_kategori_makanan){
		$mn = $this->telkomsel_model->GetKategoriMenu("where id_kategori_makanan = '$id_kategori_makanan'");
		$data = array(
				'id_kategori_makanan' => $mn[0]['id_kategori_makanan'],
				'kategori_makanan' => $mn[0]['kategori_makanan']
			);
		$this->load->view('form_posting_edit', array('data' => $data));
	}
	public function approve_peminjaman($idpeminjaman){
		$ubah_status = $this->telkomsel_model->GetPeminjaman("where idpeminjaman = '$idpeminjaman'");


	}

	public function do_update(){
		$id_kategori_makanan = $_POST['id_kategori_makanan'];
		$kategori_makanan = $_POST['kategori_makanan'];

		$data_update = array(
			'id_kategori_makanan' => $id_kategori_makanan,
			'kategori_makanan' => $kategori_makanan
		);

		$where = array('id_kategori_makanan' => $id_kategori_makanan);
		$res = $this->telkomsel_model->UpdateData('kategori_makanan',$data_update, $where);


		if($res >= 1){
			redirect('kelola_posting');
		}else{
			echo "<h2>Update Data Gagal</h2>";
			echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
		}
	}

	public function do_delete($id_kategori_makanan){
		$where = array('id_kategori_makanan' => $id_kategori_makanan);
		$res = $this->telkomsel_model->DeleteData('kategori_makanan',$where);

		if($res >= 1){
			redirect('kelola_posting');
		}else{
			echo "<h2>Delete Data Gagal</h2>";
			echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
		}
	}

}
