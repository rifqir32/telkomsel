<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class posting_add extends CI_Controller {

	public function index(){
		$this->load->view('form_posting_add');
	}

	public function do_insert(){
		$kategori_makanan = $_POST['kategori_makanan'];

		$data_insert = array(
			'kategori_makanan' => $kategori_makanan
		);

		$res = $this->gardenia_model->InsertData('kategori_makanan',$data_insert);

		if($res >= 1){
			redirect('kelola_posting');
		}else{
			echo "<h2>Insert Data Gagal</h2>";
		}
	}

}
