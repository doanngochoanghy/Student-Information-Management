<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message_model extends CI_Model {

	public function view_sent_message($sender_id,$receiver_id)
	{

		$this->db->where('sender_id', $sender_id );
		$this->db->where('receiver_id', $receiver_id);
		$query=$this->db->get('messages');
		if (empty($query->row_array())) {
			$this->db->flush_cache();
			$data_message = array('sender_id' => $sender_id,'receiver_id'=>$receiver_id);
			$this->db->insert('messages', $data_message);
		}
		$this->db->where('sender_id', $sender_id );
		$this->db->where('receiver_id', $receiver_id);
		return $this->db->get('messages')->row_array()	;
	}
	public function send_message($message_info)
	{
		$this->db->where('sender_id', $message_info['sender_id']);
		$this->db->where('receiver_id', $message_info['receiver_id']);
		$this->db->update('messages', $message_info);
	}
	public function list_messages($user_id)
	{
		$this->db->where('receiver_id', $user_id);
		$this->db->order_by('time', 'desc');
		//$this->db->from('messages');
		$this->db->join('users', 'users.user_id = messages.sender_id', 'left');
		return $this->db->get('messages')->result_array();
	}
}

/* End of file Message_model.php */
/* Location: ./application/models/Message_model.php */