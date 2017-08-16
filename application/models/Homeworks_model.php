<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homeworks_model extends CI_Model {
	public function add_homework($file_path,$name)
	{
		$homework = array('file_path' => $file_path,'name'=>$name);
		$this->db->insert('homeworks', $homework);
	}
	public function list_homeworks()
	{
		return $this->db->get('homeworks')->result_array();
	}
	public function get_homework($id)
	{
		$this->db->where('homework_id', $id);
		return $this->db->get('homeworks')->row_array();
	}
	public function add_answer($user_id,$homework_id,$file_path)
	{
		$this->db->where('user_id', $user_id);
		$this->db->where('homework_id', $homework_id);
		$data = array('file_path'=>$file_path
		 );
		$query=$this->db->get('answers')->row_array();
		if (!empty($query)) {
			unlink($query['file_path']);
			$this->db->update('answers', $data);			
		}
		else
		{
			$data['user_id']=$user_id;
			$data['homework_id']=$homework_id;
			$this->db->insert('answers', $data);
		}
	}
	public function list_answers($homework_id)
	{
		$this->db->where('answers.homework_id', $homework_id);	
		$this->db->join('users', 'users.user_id = answers.user_id', 'left');
		$this->db->join('homeworks', 'homeworks.homework_id = answers.homework_id', 'left');
		$this->db->select('users.user_id,username,homeworks.homework_id,homeworks.name,answers.time');
		return ($this->db->get('answers')->result_array());
	}
	public function get_answer($user_id,$homework_id)
	{
		$this->db->where('answers.homework_id', $homework_id);
		$this->db->where('answers.user_id', $user_id);	
		$this->db->join('users', 'users.user_id = answers.user_id', 'left');
		$this->db->join('homeworks', 'homeworks.homework_id = answers.homework_id', 'left');
		$this->db->select('answers.file_path');
		return $this->db->get('answers')->row_array();
	}
}

/* End of file Homeworks_model */
/* Location: ./application/models/Homeworks_model */
