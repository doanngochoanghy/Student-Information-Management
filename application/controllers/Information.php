<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Information extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('information/index');
		$this->load->view('templates/footer');
	}

}

/* End of file Information.php */
/* Location: ./application/controllers/Information.php */