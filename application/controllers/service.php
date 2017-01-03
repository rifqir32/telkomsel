<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Service extends CI_Controller {

	public function index(){
		$data = $this->gardenia_model->GetPaket();
		$data2 = $this->gardenia_model->GetPictPaket();
		$this->load->view('service', array('data' => $data, 'data2' => $data2));
	}

}