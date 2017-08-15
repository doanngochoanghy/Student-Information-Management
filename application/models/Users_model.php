
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {
	public function login($username,$password)
	{
		$this->db->flush_cache();
		$this->db->select('user_id,username,is_teacher');
		$query=$this->db->get_where('users',array('username' =>$username ,'password'=>$password ));
		if (!empty($query->row_array())) {
			return $query->row(0);
		} else {
			return false;
		}
		
	}
	public function register($data)
	{
		$this->db->flush_cache();	
		return $this->db->insert('users', $data);
	}
	public function list_user()
	{
		$this->db->flush_cache();
		$this->db->order_by('is_teacher', 'desc');
		$this->db->select('user_id,username,name,is_teacher');
		$query=$this->db->get('users');
		return $query->result_array();
	}
	public function view_info($user_id)
	{
		$this->db->flush_cache();
		$this->db->select('user_id,username,name,email,phone,is_teacher');
		$this->db->where('user_id', $user_id);
		$query=$this->db->get('users');
		return $query->row_array();
	}
	public function update($user_id,$change_data)	
	{
		$this->db->flush_cache();
		$this->db->where('user_id', $user_id);
		$this->db->update('users', $change_data);	}
	}


	/* End of file Users_model.php */
/* Location: ./application/models/Users_model.php */