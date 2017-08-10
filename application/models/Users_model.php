
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {
	public function login($username,$password)
	{
		$this->db->select('username,is_teacher');
		$query=$this->db->get_where('users',array('username' =>$username ,'password'=>$password ));
		//return var_dump($query->row_array());
		if (!empty($query->row_array())) {
			return $query->row(0);
		} else {
			return false;
		}
		
	}
	public function register($data)
	{
		return $this->db->insert('users', $data);
	}
}


/* End of file Users_model.php */
/* Location: ./application/models/Users_model.php */