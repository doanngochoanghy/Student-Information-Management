<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Puzzle extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('loggedin')) {
			$data['list_puzzles']=$this->puzzles_model->list_puzzles();
			$this->load->view('templates/header');
			$this->load->view('puzzle/index',$data);
			$this->load->view('templates/footer');
		}
		else
		{
			redirect('users/login','');
		}
	}
	public function upload_puzzle_form()
	{
		if ($this->session->userdata('is_teacher')==1)
		{
			$this->load->view('templates/header');
			$this->load->view('puzzle/upload_puzzle_form');
			$this->load->view('templates/footer');
		}
		else
		{
			redirect('puzzle');
		}
	}
	public function upload_puzzle()
	{
		if ($this->session->userdata('is_teacher')==1)
		{
			if (file_exists("./puzzle/".str_replace(" ","_",basename($_FILES["puzzle"]["name"])))) 
			{
				$this->session->set_flashdata('message', "File Exist!");
				redirect('puzzle');
			}
			else
			{
				if ($this->session->userdata('is_teacher')==1) 
				{
					$config['upload_path'] = './puzzle/';
					$config['allowed_types'] = 'txt';
					$config['max_size']  = '100';

					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if ( ! $this->upload->do_upload('puzzle')){
						$error = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('message', $error['error']);
						redirect('puzzle');
					}
					else{
						$data = array('upload_data' => $this->upload->data());
						$hint=$this->input->post('hint');
						$this->puzzles_model->add_puzzle($data['upload_data']['full_path'],$hint);
						$this->session->set_flashdata('message', 'Upload puzzle success.');
						redirect('puzzle');
					}
				}
			}
		}
		else
		{
			redirect('puzzle');
		}
	}
	public function submit_form($puzzle_id)
	{
		if ($this->session->userdata('is_teacher')!=1)
		{
			#Lay ra puzzle trong DB
			$puzzle=$this->puzzles_model->get_puzzle($puzzle_id);
			if (!empty($puzzle)) {
				$data['puzzle']=$puzzle;
				$this->load->view('templates/header');
				$this->load->view('puzzle/submit_form', $data);
				$this->load->view('templates/footer');
			}
			else
			{
				redirect('puzzle','');
			}
		}
	}
	public function submit()
	{
		if ($this->session->userdata('is_teacher')!=1)
		{
			$answer=$this->input->post('answer');
			$puzzle_id=$this->input->post('puzzle_id');
			$result=$this->puzzles_model->submit($answer,$puzzle_id);
			if ($result) {
				$data['content']=read_file($this->puzzles_model->get_puzzle($puzzle_id)['file_path']);
				$this->load->view('templates/header');
				$this->load->view('puzzle/correct', $data);
				$this->load->view('templates/footer');
			}
			else
			{
				$this->session->set_flashdata('message', 'You are wrong!');
				redirect('puzzle/submit_form/'.$puzzle_id);
			}
		}
		else
		{
			redirect('puzzle');
		}
	}
}
	/* End of file Puzzle.php */
/* Location: ./application/controllers/Puzzle.php */