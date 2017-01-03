<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Login extends CI_Controller {

	public function index() {
		if (isset($_SESSION["berhasil_login"])) {
			redirect('home_admin');
		} else {
			$this->load->view('form_login');
		}
	}

	public function proses_login(){

		$data = $this->telkomsel_model->getLogin("where id_karyawan = '".$_POST['username']."'");

		if (empty($data)) {
			$this->load->view('login_failed');
		} else {
			foreach ($data as $d) {
				$id=$d['id_karyawan'];
				$pass=$d['password'];
				$status_akses=$d['status_akses'];
			}

			if (isset($_POST['username']) && isset($_POST['pass'])) {
				$u = $_POST['username'];
				$p = $_POST['pass'];
				if ($u==$id && $p==$pass && $status_akses==1) {
					$_SESSION["berhasil_login"]=$id;
					redirect('home_admin');
				} else {
					$this->load->view('login_failed');
				}
			}
		}
	}

	public function proses_logout(){ 
		unset($_SESSION["berhasil_login"]);
		session_destroy();
		redirect('login');
	}

}