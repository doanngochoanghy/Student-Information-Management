<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homework extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('loggedin')==true) {
			$data['list_homeworks']=$this->homeworks_model->list_homeworks();
			$this->load->view('templates/header');
			$this->load->view('homework/index',$data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->session->set_flashdata('message', 'You must log in');
			redirect('users/login');
		}
		
	}
	public function upload_homework_form()
	{
		if ($this->session->userdata('is_teacher')==1)
		{
			$this->load->view('templates/header');
			$this->load->view('homework/upload_homework_form');
			$this->load->view('templates/footer');
		}
		else
		{
			redirect('homework');
		}

	}
	public function upload_homework()
	{
		if ($this->session->userdata('loggedin')==TRUE)
		{
			if ($this->session->userdata('is_teacher')==1) {
				$config['upload_path'] ='./uploads/';
				$config['allowed_types'] = 'txt';
				$config['max_size']  = '100';
				$config['remove_spaces']  = TRUE;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if (file_exists("./uploads/".$_FILES['homework']['name'])) {
					$this->session->set_flashdata('message','File Exist');
					redirect('homework');
				}
				else
				{
					if ( ! $this->upload->do_upload('homework')){
						$error = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('message', $error['error']);
						redirect('homework');
					}
					else{
						$data = array('upload_data' => $this->upload->data());
						$this->homeworks_model->add_homework($data['upload_data']['full_path'],$data['upload_data']['raw_name']);
						$this->session->set_flashdata('message', 'Upload file success.');
						redirect('homework');
					}	
				}
			}
			else
			{
				redirect('homework');
			}
		}
		else
		{
			redirect('users/login');
		}
	}
	public function download_homework($id)
	{
		if ($this->session->userdata('loggedin')==TRUE) {
			$homework=$this->homeworks_model->get_homework($id);
			var_dump($homework);
			force_download($homework['file_path'], NULL);
		}
		else
		{
			redirect('users/login');
		}
		
	}
	public function upload_answer_form($homework_id)
	{
		if ($this->session->userdata('is_teacher')!=1) 
		{
			$data['homework_id']=$homework_id;
			$this->load->view('templates/header');
			$this->load->view('homework/upload_answer_form',$data);
			$this->load->view('templates/footer');}
		}
		public function upload_answer($homework_id)
		{
			if ($this->session->userdata('is_teacher')!=1) {
				$config['upload_path'] ='./uploads/';
				$config['allowed_types'] = 'txt';
				$config['max_size']  = '100';
				$homework=$this->homeworks_model->get_homework($homework_id);
				$config['file_name']  = $this->session->userdata('username').'_'.$homework['name'];
				$config['remove_spaces']  = TRUE;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if ( ! $this->upload->do_upload('answer')){
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('message', $error['error']);
					redirect('homework');
				}
				else{
					$data = array('upload_data' => $this->upload->data());
					$this->homeworks_model->add_answer($this->session->userdata('user_id'),$homework_id,$data['upload_data']['full_path']);
					$this->session->set_flashdata('message', 'Upload file success.');
					redirect('homework');
				}	
			}
		}
		public function list_answers($homework_id)
		{
			if ($this->session->userdata('is_teacher')==1)
			{
				$data['list_answers']=$this->homeworks_model->list_answers($homework_id);
				$this->load->view('templates/header');
				$this->load->view('homework/list_answers_form',$data);
				$this->load->view('templates/footer');
			}
			else
			{
				redirect('homework');
			}
		}
		public function download_answer($user_id,$homework_id)
		{
			if ($this->session->userdata('is_teacher')==1) {
				$answer=$this->homeworks_model->get_answer($user_id,$homework_id);
				print_r($answer['file_path']);
				force_download($answer['file_path'],NULL);
			}
		}
	}
	/* End of file Homework.php */
/* Location: ./application/controllers/Homework.php */