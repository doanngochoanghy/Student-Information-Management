<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function index()
	{
		if ($this->session->userdata('loggedin')) {
			redirect(base_url(),'')	;
		}
		else{
			redirect(base_url().'users/login');
		}
	}
	public function login()
	{
		if ($this->session->userdata('loggedin')) {
			redirect(base_url(),'')	;
		}
		else
		{
			$this->form_validation->set_rules('username', 'Name', 'required');
				// $this->form_validation->set_rules('password', 'Password', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('templates/header');
				$this->load->view('users/login');
				$this->load->view('templates/footer');
			} else {
				$username=htmlspecialchars($this->input->post('username'));
				$password=md5($this->input->post('password'));
				$user_data=$this->users_model->login($username,$password);
				var_dump($user_data);
				if ($user_data!=FALSE) {
					$user_data=(array)$user_data;
					$user_data["loggedin"] = true;
					$this->session->set_userdata($user_data);
					$this->session->set_flashdata('message', 'Welcome '.$this->session->userdata('username').'. You are logged in.');
					redirect(base_url(),'');
				} else {
					$this->session->set_flashdata('message', 'Login is invalid.');
					redirect('users/login','');
				}
			}
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url(),'');
	}
	public function register()
	{
		//Kiểm tra dữ liệu nhập vào.

		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]',array('is_unique'=>'Username already exist'));
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]',array('is_unique'=>'Email already exist'));
		$this->form_validation->set_rules('sdt', 'SĐT', 'numeric');
		$this->form_validation->set_rules('password', 'Password','required');
		$this->form_validation->set_rules('password2', 'Password Confirm', 'matches[password]');
		$this->form_validation->set_rules('name', 'Name', 'required');


		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('users/register');
			$this->load->view('templates/footer');
		} else {
			$data = array('name' => htmlspecialchars($this->input->post('name')),
				'email' => htmlspecialchars($this->input->post('email')),
				'username' => htmlspecialchars($this->input->post('username')),
				'password' => md5($this->input->post('password')),
				'sdt' => htmlspecialchars($this->input->post('sdt'))
				);
			$this->users_model->register($data);
			$this->session->set_flashdata('message', 'You are registered. You can login');
			redirect(base_url()."users/login",'');
		}
	}
}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */