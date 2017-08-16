<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Puzzle extends CI_Controller {

	public function index()
	{
		$data['list_puzzles']=$this->puzzles_model->list_puzzles();
		$this->load->view('templates/header');
		$this->load->view('puzzle/index',$data);
		$this->load->view('templates/footer');
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
		if (file_exists("./puzzle/".basename($_FILES["puzzle"]["name"]))) {
			$this->session->set_flashdata('message', "File Exist!");
			redirect('puzzle');
		}
		else
		{
			if ($this->session->userdata('is_teacher')==1) 
			{
				$config['upload_path'] = './puzzle/';
				$config['allowed_types'] = 'txt';
				$config['max_size']  = '1000';
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
				}
			}
		}
	}
	public function submit_form($puzzle_id)
	{
		$puzzle=$this->puzzles_model->get_puzzle($puzzle_id);
		if (!empty($puzzle)) {
			
		}
		else
		{
			redirect('puzzle','');
		}
	}
}

/* End of file Puzzle.php */
/* Location: ./application/controllers/Puzzle.php */