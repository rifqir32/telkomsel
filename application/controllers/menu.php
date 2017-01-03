<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function index(){
		$data = $this->gardenia_model->GetMenu();
		$data2 = $this->gardenia_model->GetKategoriMenu();
		$this->load->view('menus', array('data' => $data, 'data2' => $data2));
	}

}