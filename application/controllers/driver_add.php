<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class driver_add extends CI_Controller {

	public function index(){
		// $this->load->view('form_member_add');
		$data = $this->telkomsel_model->GetDriver();
		$this->load->view('form_driver_add', array('data' => $data));
	}

	public function do_insert(){
		$nopol = $_POST['NOPOL'];
		$nama_driver = $_POST['nama_driver'];
		$nomerhp = $_POST['nomerhp'];

		$data_insert = array(
			'NOPOL' => $nopol,
			'nama_driver' => $nama_driver,
			'NO_HP' => $nomerhp,
			
		);

		$res = $this->telkomsel_model->InsertData('driver',$data_insert);



		if($res >= 1){
			redirect('kelola_driver');
		}else{
			echo "<h2>Insert Data Gagal</h2>";
		}
	}

}
