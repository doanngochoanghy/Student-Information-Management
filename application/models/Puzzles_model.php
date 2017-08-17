<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Puzzles_model extends CI_Model {
	public function add_puzzle($file_path,$hint)
	{
		$object = array('file_path' => $file_path, 'hint'=> $hint);
		$this->db->insert('puzzles', $object);
	}
	public function list_puzzles()
	{
		return $this->db->get('puzzles')->result_array();
	}
	public function get_puzzle($id)
	{
		$this->db->where('puzzle_id', $id);
		return $this->db->get('puzzles')->row_array();
	}
	public function submit($answer,$puzzle_id)
	{
		$puzzle=$this->get_puzzle($puzzle_id);
		if (empty($puzzle)) {
			return false;
		}
		if (str_replace(" ", "_", trim($answer)) ==pathinfo($puzzle['file_path'])['filename']) {
			return true;
		}
		else
		{
			return false;
		}
	}
}

/* End of file Puzzles_mdel.php */
/* Location: ./application/models/Puzzles_mdel.php */