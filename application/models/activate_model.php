<?php

class Activate_model extends CI_Model {
	function __construct()
	{
		
   }

   	public function activate_user()
	{
		$email_address = $this->input->get('email_address');
		$rand = $this->input->get('rand');
		$this->db->where('email_address',$email_address);
		$this->db->where('activationcode',$rand);
		$data = array(
			'active' => 1,
		);
		$this->db->update('user', $data);
		
		return true;
	}
	
}

