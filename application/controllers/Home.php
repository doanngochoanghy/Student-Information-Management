<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('HomePage');
		
	}
	public function Page()
	{
		if (!empty($this->session->userdata()))
		{
			echo "page";
		}
		else
		{
			$this->session->set_flashdata('message', 'This is a message.');
			$this->load->view('HomePage');
		}
	}
	public function SignUp()
	{
		$this->load->view('Home/Signup');
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */