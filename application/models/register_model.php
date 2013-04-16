<?php

class Register_model extends CI_Model {
	function __construct()
	{
		
   }

   public function new_user($first_name, $last_name, $email_address, $password, $rand)
   {
	  $data = array('first_name' => $first_name, 
					'last_name' => $last_name,
					'email_address' => $email_address,
					'password' => $password,
					'active' => 0,
					'activationcode' => $rand); //change when adding email activation
      $str = $this->db->insert('user', $data);
            

      if ( $this->db->affected_rows() > 0 ) {
         // account registered
         return true; 
      }
      return false;
   }
	
}

