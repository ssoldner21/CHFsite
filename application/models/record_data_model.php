<?php

class Record_data_model  extends CI_Model {
	function __construct()
	{
		
   }

	public function record_data($heartrate, $sbp, $dbp, $weight)
	{	
		$this->db->select('record_id, time_entered');
		$this->db->where('user_id', $_SESSION['user_id']);
		$this->db->order_by('time_entered', 'DESC');
		$query = $this->db->get('record', 2); //
	
		if ($query->num_rows() > 0)
		{
			$id1 = $query->row(0)->record_id;
			$time1 = $query->row(0)->time_entered;
			$time2 =  date('ymd');

			if ($time1 >= $time2)
			{
				return false;
			}
			else
			{
				$data = array('user_id' => $_SESSION['user_id'],
					'heart_rate' => $heartrate,
					's_blood_pressure' => $sbp,
					'd_blood_pressure' => $dbp,
					'weight' => $weight,
					'time_entered' => date('ymd'));
				$str = $this->db->insert('record', $data);

				if ( $this->db->affected_rows() > 0 ) {
				 //data entered
				 return true; 
				}
			}
		}
		else
		{
			$data = array('user_id' => $_SESSION['user_id'],
					'heart_rate' => $heartrate,
					's_blood_pressure' => $sbp,
					'd_blood_pressure' => $dbp,
					'weight' => $weight,
					'time_entered' => date('jy'));
				$str = $this->db->insert('record', $data);

				if ( $this->db->affected_rows() > 0 ) {
				 //data entered
				 return true; 
				}
		}
	}
}
