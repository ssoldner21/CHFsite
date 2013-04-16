<?php

class Reviewdata_model extends CI_Model {

	function __construct()
	{

	}
	
	public function sevendayverify()
	{
		$this->db->select('weight');
		$this->db->where('user_id', $_SESSION['user_id']);
		$this->db->order_by('time_entered', 'DESC');
		$this->db->limit(7);
		$query = $this->db->get('record');
		$alert = false;
		
		if ( $query->num_rows() > 1 ) 
		{	
			$row = $query->row();
			$current = $row->weight;
			foreach ($query->result() as $previous)
			{
				$abs = abs($current - $previous->weight);
				if ( $abs >= 3)
				{
					$alert = true;
					break;
				}
				else
				{
					$alert =  false;
				}
			}
 			return $alert;
		}
		else
		{
			return false;
		}
	}

	public function showmostrecentdata()
	{
		$this->db->select('heart_rate, s_blood_pressure, d_blood_pressure, weight, time_entered');
		$this->db->where('user_id', $_SESSION['user_id']);
		$this->db->order_by('time_entered', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('record');
		
		if ( $query->num_rows() > 1 ) 
		{
			return $query; 
		}
		else
		{
			return false;
		}
	}
}

