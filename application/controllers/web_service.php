<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web_service extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function getSemuaPeminjaman(){
		$pinjam=$this->web_service_model->getAllPeminjaman();
		echo json_encode($pinjam);
	}
	public function get_kegiatan($id_kegiatan = "") {
			if ($id_kegiatan != "") {
				$data = $this->Papb_model->kegiatan("where id_kegiatan = ".$id_kegiatan);
				echo json_encode($data);
			} else  {
				$data = $this->Papb_model->kegiatan();
				echo json_encode($data);
			}
		}

		public function get_kategori($kategori = "", $wilayah = "") {
			if ($kategori != "" && $wilayah != "") {
				$data = $this->Papb_model->kegiatan("where kat.nama_kategori = '".$kategori."' and w.nama_wilayah = '".$wilayah."'");
				echo json_encode($data);
			} else  {
				$data = $this->Papb_model->kegiatan();
				echo json_encode($data);
			}
		}

		public function getRelawan($username = "", $pass = "") {
			if ($username != "" && $pass != "") {
				$data = $this->Papb_model->user("where id_relawan='".$username."' and password='".$pass."'");
				echo json_encode($data);
			}
		}

		public function addRelawan($id_relawan = "", $password = "", $nama_relawan = "", $email = "", $alamat = "") {
			$check = $this->Papb_model->user("where id_relawan='".$id_relawan."' and password='".$password."'");
			if (!empty($check)) {
				$out = array('res' => false);
				echo json_encode($out);
			} else {
				$id_relawan_fix = utf8_decode(urldecode($id_relawan));
				$password_fix = utf8_decode(urldecode($password));
				$nama_relawan_fix = utf8_decode(urldecode($nama_relawan));
				$email_fix = utf8_decode(urldecode($email));
				$alamat_fix = utf8_decode(urldecode($alamat));

				$data_insert = array(
					'id_relawan' => $id_relawan_fix,
					'password' => $password_fix,
					'nama_relawan' => $nama_relawan_fix,
					'email' => $email_fix,
					'alamat' => $alamat_fix
				);

				$res = $this->Papb_model->InsertData('relawan', $data_insert);
				$out = array('res' => $res);
				if($res >= 1) {
					echo json_encode($out);
				} else {
					echo json_encode($out);
				}
			}
		}

		public function joinKegiatan($id_relawan = "", $id_kegiatan = "") {
			$check = $this->Papb_model->partisipasi("where id_relawan='".$id_relawan."' and id_kegiatan=".$id_kegiatan);
			$jml_relawan = $this->Papb_model->jumlah_relawan("where id_kegiatan=".$id_kegiatan);
			if (!empty($check)) {
				$out = array('res' => false);
				echo json_encode($out);
			} else {
				$data_insert = array(
					'id_relawan' => $id_relawan,
					'id_kegiatan' => $id_kegiatan
				);
				$res = $this->Papb_model->InsertData('partisipasi', $data_insert);
				$out = array('res' => $res);

				$jml = (int)$jml_relawan[0]['jumlah_relawan'];
				$data_update = array(
					'jumlah_relawan' => $jml + 1
					);
				$where = array('id_kegiatan' => $id_kegiatan);
				$upd = $this->Papb_model->UpdateData('kegiatan', $data_update, $where);

				if($res >= 1) {
					echo json_encode($out);
				} else {
					echo json_encode($out);
				}
			}
		}

		public function donasi($id_relawan = "", $id_kegiatan = "", $donasi = "") {
			$check = $this->Papb_model->partisipasi("where id_relawan='".$id_relawan."' and id_kegiatan=".$id_kegiatan);
			$jml_dana = $this->Papb_model->jumlah_dana("where id_kegiatan=".$id_kegiatan);
			print_r($check);
			if (empty($check)) {
				$out = array('res' => false);
				echo json_encode($out);
			} else {
				// $data_insert = array(
				// 	'id_relawan' => $id_relawan,
				// 	'id_kegiatan' => $id_kegiatan
				// );
				// $res = $this->Papb_model->InsertData('partisipasi', $data_insert);
				// $out = array('res' => $res);

				$jml = (int)$jml_dana[0]['jumlah_dana'];
				$data_update = array(
					'jumlah_dana' => $jml + $donasi
					);
				$where = array('id_kegiatan' => $id_kegiatan);
				$res = $this->Papb_model->UpdateData('kegiatan', $data_update, $where);
				$out = array('res' => $res);
				if($res >= 1) {
					echo json_encode($out);
				} else {
					echo json_encode($out);
				}
			}
		}

		public function addKegiatan($id_desa = "", $id_kategori = "", $nama_kegiatan = "", $waktu_pelaksanaan = "", $batas_registrasi = "", $jumlah_relawan = "", $maks_relawan ="", $jumlah_dana = "", $kebutuhan_dana = "", $latitude = "", $longitude = "", $img = "", $deskripsi = "") {
			
			$nama_kegiatan_fix = utf8_decode(urldecode($nama_kegiatan));
			$waktu_pelaksanaan_fix = utf8_decode(urldecode($waktu_pelaksanaan));
			$batas_registrasi_fix = utf8_decode(urldecode($batas_registrasi));
			$latitude_fix = utf8_decode(urldecode($latitude));
			$longitude_fix = utf8_decode(urldecode($longitude));
			$img_fix = utf8_decode(urldecode($img));
			$deskripsi_fix = utf8_decode(urldecode($deskripsi));


			$data_insert = array(
				'id_desa' => $id_desa,
				'id_kategori' => $id_kategori,
				'nama_kegiatan' => $nama_kegiatan_fix,
				'waktu_pelaksanaan' => $waktu_pelaksanaan_fix,
				'batas_registrasi' => $batas_registrasi_fix,
				'jumlah_relawan' => $jumlah_relawan,
				'maks_relawan' => $maks_relawan,
				'jumlah_dana' => $jumlah_dana,
				'kebutuhan_dana' => $kebutuhan_dana,
				'latitude' => $latitude_fix,
				'longitude' => $longitude_fix,
				'img' => "http://foto2.data.kemdikbud.go.id/getImage/20517304/3.jpg",
				'deskripsi' => $deskripsi_fix
			);

			$res = $this->Papb_model->InsertData('kegiatan', $data_insert);
			$out = array('res' => $res);
			if($res >= 1) {
				echo json_encode($out);
			} else {
				echo json_encode($out);
			}
			
		}

		// public function uploadGambar() {
		// 	if($_SERVER['REQUEST_METHOD']=='POST') {
		// 		// $image = $_POST['image'];
		// 		// $name = $_POST['name'];
		// 		$image = $this->input->post('image');
		// 		$name = $this->input->post('name');
		// 		$id = 0;

		// 		$data = $this->Papb_model->idImage();
		// 		foreach ($data as $d) {
		// 			$id = $d['id'];
		// 		}

		// 		$path = "/assets/uploads/$id.png";
		// 		$actualpath = "http://localhost/bangundesaremake".$path;
		// 		// echo $actualpath;

		// 		$data_insert = array(
		// 			'images' => $actualpath,
		// 			'name' => $name
		// 		);
		// 		$res = $this->Papb_model->InsertData('coba_img', $data_insert);
		// 		if ($res >= 1) {
		// 			$true_path = FCPATH.$path;
		// 			file_put_contents($true_path,base64_decode($image));
		// 			echo "Successfully Uploaded";
		// 		} else {
		// 			echo "Error";
		// 		}
		// 	} else {
		// 		echo "coba";
		// 	}
		// }

		public function postingKegiatan() {
			if($_SERVER['REQUEST_METHOD']=='POST') {
				$id_desa = $this->input->post('id_desa');
				$id_kategori = $this->input->post('id_kategori');
				$nama_kegiatan = $this->input->post('nama_kegiatan');
				$waktu_pelaksanaan = $this->input->post('waktu_pelaksanaan');
				$batas_registrasi = $this->input->post('batas_registrasi');
				$jumlah_relawan = $this->input->post('jumlah_relawan');
				$maks_relawan = $this->input->post('maks_relawan');
				$jumlah_dana = $this->input->post('jumlah_dana');
				$kebutuhan_dana = $this->input->post('kebutuhan_dana');
				$latitude = $this->input->post('latitude');
				$longitude = $this->input->post('longitude');
				$img = $this->input->post('img');
				$deskripsi = $this->input->post('deskripsi');

				$id = 0;

				$data = $this->Papb_model->idForImage();
				foreach ($data as $d) {
					$id = $d['id_kegiatan'];
				}

				$path = "/assets/uploads/$id.png";
				$actualpath = "http://192.168.43.133:80/bangundesaremake".$path;

				$data_insert = array(
					'id_desa' => $id_desa,
					'id_kategori' => $id_kategori,
					'nama_kegiatan' => $nama_kegiatan,
					'waktu_pelaksanaan' => $waktu_pelaksanaan,
					'batas_registrasi' => $batas_registrasi,
					'jumlah_relawan' => $jumlah_relawan,
					'maks_relawan' => $maks_relawan,
					'jumlah_dana' => $jumlah_dana,
					'kebutuhan_dana' => $kebutuhan_dana,
					'latitude' => $latitude,
					'longitude' => $longitude,
					'img' => $actualpath,
					'deskripsi' => $deskripsi
				);

				$res = $this->Papb_model->InsertData('kegiatan', $data_insert);
				if ($res >= 1) {
					$true_path = FCPATH.$path;
					file_put_contents($true_path,base64_decode($img));
					echo "Successfully Uploaded";
				} else {
					echo "Error";
				}
			} else {
				echo "coba";
			}
		}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */