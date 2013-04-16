<?php

class Email_check_model extends CI_Model {

	function __construct()
	{

	}

	public function emailexists($emailtocheck)
	{
		$this->db->select('email_address');
		$this->db->where('email_address', $emailtocheck);
		$query = $this->db->get('record');
		
		if ( $query->num_rows() > 0 ) 
		{
			return false; 
		}
		return true;
	}
}

