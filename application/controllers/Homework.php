<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homework extends CI_Controller {

	public function index()
	{
		$data['list_homeworks']=$this->homeworks_model->list_homeworks();
		$this->load->view('templates/header');
		$this->load->view('homework/index',$data);
		$this->load->view('templates/footer');
	}
	public function upload_form()
	{
		if ($this->session->userdata('is_teacher')==1)
		{
			$this->load->view('templates/header');
			$this->load->view('homework/upload_form');
			$this->load->view('templates/footer');
		}
		else
		{
			redirect('homework');
		}

	}
	public function upload()
	{

		if ($this->session->userdata('is_teacher')==1) {
			$config['upload_path'] ='./uploads/';
			$config['allowed_types'] = 'txt';
			$config['max_size']  = '100';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';
			$this->load->library('upload', $config);
			// $this->upload->initialize($config);
			// if (file_exists("./uploads/".$_FILES['userfile']['name'])) {
			// 	echo "file exist";
			// }
			// else
			{
				if ( ! $this->upload->do_upload()){
					$error = array('error' => $this->upload->display_error());
					$this->session->set_flashdata('message', $error['error']);
				}
				else{
					$data = array('upload_data' => $this->upload->data());
					$this->homeworks_model->add_homework($data['upload_data']['full_path'],$data['upload_data']['raw_name']);
				}	
			}
		}
	}
}
/* End of file Homework.php */
/* Location: ./application/controllers/Homework.php */