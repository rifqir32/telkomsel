<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kelola_driver extends CI_Controller {

	public function index(){
		$data = $this->telkomsel_model->GetDriver();
		$this->load->view('table_driver', array('data' => $data));
	}

	public function edit_menu($id_menu){
		$mn = $this->telkomsel_model->GetMenu("where id_menu = '$id_menu'");
		$data = array(
				'id_menu' => $mn[0]['id_menu'],
				'nama_makanan' => $mn[0]['nama_makanan'],
				'desc_makanan' => $mn[0]['desc_makanan'],
				'pict_makanan' => $mn[0]['pict_makanan'],
				'kategori_makanan' => $mn[0]['kategori_makanan']
			);
		$data2 = $this->telkomsel_model->GetKategoriMenu();
		// $this->load->view('form_menus_edit', $data);
		$this->load->view('form_member_edit', array('data' => $data,'data2' => $data2));
	}

	public function do_update(){
		$nama_file = $_FILES['gambar_makanan']['name'];
		$ukuran_file = $_FILES['gambar_makanan']['size'];
		$tipe_file = $_FILES['gambar_makanan']['type'];
		$tmp_file = $_FILES['gambar_makanan']['tmp_name'];

		$path = FCPATH."/assets/image/menu/".$nama_file;

		if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
			// Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
			if($ukuran_file <= 1000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
				// Jika ukuran file kurang dari sama dengan 1MB, lakukan :
				// Proses upload
				if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
					// Jika gambar berhasil diupload, Lakukan :
					$img = $nama_file;
				} else {
					// Jika gambar gagal diupload, Lakukan :
					echo "Maaf, Gambar gagal untuk diupload.";
					// echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
				}
			} else {
				// Jika ukuran file lebih dari 1MB, lakukan :
				echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB";
				// echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
			}
		}
		// else {
		// 	// Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
		// 	echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
		// 	// echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
		// }

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

	public function do_delete($id_driver){
		$where = array('id_driver' => $id_driver);
		$res = $this->telkomsel_model->DeleteData('driver',$where);

		if($res >= 1){
			redirect('kelola_driver');
		}else{
			echo "<h2>Delete Data Gagal</h2>";
			echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
		}
	}

}
