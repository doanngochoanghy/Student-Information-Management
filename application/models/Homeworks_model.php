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
}

/* End of file Homeworks_model */
/* Location: ./application/models/Homeworks_model */
