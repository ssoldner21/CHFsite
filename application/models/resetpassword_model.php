<?php

class Resetpassword_model extends CI_Model {
	function __construct()
	{
		
   }

   	public function reset_password($newpassword)
	{
		$email_address = $this->input->get('email_address');
		$rand = $this->input->get('rand');
		$this->db->where('email_address',$email_address);
		$this->db->where('resetpasswordcode',$rand);
		$data = array(
			'password' => sha1($newpassword)
		);
		$this->db->update('user', $data);
		
		return true;
	}
	
}

