<?php

class Admin_model extends CI_Model {
	function __construct()
	{
		
   }

   public function verify_user($email, $password)
   {
      $q = $this
            ->db
            ->where('email_address', $email)
            ->where('password', $password)
            ->limit(1)
            ->get('user');
			
      if ( $q->num_rows > 0 && $q->row()->active) {
		$row = $q->row();
		$_SESSION['user_id'] = $row->user_id;
		echo "Account has been activated.";
		//verify account activated via email (email not implemented)
         // person has account with us
         return $row; 
		 }
		 else
		 {
			echo "Account not yet activated. Check your email for activation code.";
		 }
      
	  return false;
   }
}

