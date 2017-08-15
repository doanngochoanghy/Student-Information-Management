<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Information extends CI_Controller {

	public function index()
	{
		if (!$this->session->userdata('loggedin')) {
			$this->session->set_flashdata('message', 'You must log in.');
			redirect('users/login');
		}
		else
		{
			$data['list_user']=$this->users_model->list_user();
			$this->load->view('templates/header');
			$this->load->view('information/index',$data);
			$this->load->view('templates/footer');
		}
	}
	public function view_info()
	{
		if (!$this->session->userdata('loggedin')) {
			$this->session->set_flashdata('message', 'You must log in.');
			redirect('users/login');
		}
		else
		{
			$user_id=$this->input->post('user_id');
			$user_info=(array)$this->users_model->view_info($user_id);
			$data['user_info']=$user_info;
			$this->load->view('templates/header');
			$this->load->view('information/view_info',$data);
			$this->load->view('templates/footer');
		}
	}
	public function form_change()
	{
		$user_id=$this->input->post('user_id');
		if (!$this->session->userdata('loggedin')) {
			$this->session->set_flashdata('message', 'You must log in.');
			redirect('users/login');
		}
		else
		{
			if ($this->session->userdata('is_teacher')==1||$this->session->userdata('user_id')==$user_id) {
				$user_info=(array)$this->users_model->view_info($user_id);
				$data['user_info']=$user_info;
				$this->load->view('templates/header');
				$this->load->view('information/change_info',$data);
				$this->load->view('templates/footer');
				
			} else {				
				redirect('information');
			}
		}
	}
	public function change_info()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('phone', 'SĐT', 'numeric');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$user_id=$this->input->post('user_id');

		if ($this->form_validation->run() == FALSE) {
			$user_info=(array)$this->users_model->view_info($user_id);
			$data['user_info']=$user_info;
			$this->load->view('templates/header');
			$this->load->view('information/change_info',$data);
			$this->load->view('templates/footer');
		} else {
			$change_data = array('name' => htmlspecialchars($this->input->post('name')),
				'email' => htmlspecialchars($this->input->post('email')),
				'phone' => htmlspecialchars($this->input->post('phone'))
				);
			$this->users_model->update($user_id,$change_data);
			$this->session->set_flashdata('message', 'You changed information.');
			redirect(base_url()."information",'');
		}
	}
	public function view_message()
	{
		$sender_id=$this->input->post('sender_id');
		$receiver_id=$this->input->post('receiver_id');
		$data['message_info']=$this->message_model->view_sent_message($sender_id,$receiver_id);
		$data['sender_info']=$this->users_model->view_info($sender_id);
		$data['receiver_info']=$this->users_model->view_info($receiver_id	);
		$this->load->view('templates/header');
		$this->load->view('information/send_message',$data);
		$this->load->view('templates/footer');
	}
	public function send_message()
	{
		$sender_id=$this->input->post('sender_id');
		$receiver_id=$this->input->post('receiver_id');
		$content=htmlspecialchars($this->input->post('content'));
		$message_info = array('sender_id' => $sender_id,'receiver_id' => $receiver_id,'content' => $content );
		#Kiểm tra thông tin người gửi.
		if ($this->session->userdata('user_id')==$sender_id) {
			$this->message_model->send_message($message_info);
			$this->session->set_flashdata('message', 'Sent message!');
			redirect('information');
		}
	}
	public function receive_message()
	{
		$data['list_messages']=$this->message_model->list_messages($this->session->userdata('user_id'));
		$this->load->view('templates/header');
		$this->load->view('information/receive_message',$data);
		$this->load->view('templates/footer');
	}
}

/* End of file Information.php */
/* Location: ./ap plication/controllers/Information.php */