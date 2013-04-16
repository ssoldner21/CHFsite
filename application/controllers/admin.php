<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		session_start();
	}



	public function index()
	{
		if ( isset($_SESSION['username']) ) 
		{
		redirect('welcome');
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('email_address', 'Email Address', 'valid_email|required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[15]|trim');

		if ( $this->form_validation->run() !== false ) 
		{
			// then validation passed. Get from db
			$this->load->model('admin_model');
			$res = $this
			->admin_model
			->verify_user(
				$this->input->post('email_address'), 
				$this->input->post('password')
			);

			if ( $res !== false) 
			{
				$_SESSION['username'] = $this->input->post('email_address');
				redirect('welcome');
			}

		}
		$this->load->view('login_view');
	}

	public function logout()
	{
		session_destroy();
		$this->load->view('login_view');
	}

	public function register()
	{
		if ( isset($_SESSION['username']) ) {
			redirect('welcome');
		}

		$this->load->library('form_validation'); //add more rules
		$this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
		$this->form_validation->set_rules('email_address', 'Email Address', 'valid_email|required|trim|callback_email_check');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[15]|trim|matches[confpassword]');
		$this->form_validation->set_rules('confpassword', 'Password Confirmation', 'required|trim');
		
		if ( $this->form_validation->run() !== false ) {
			// then validation passed. Get from db
			$this->load->model('register_model');

			$email_address = $this->input->post('email_address');
			$rand = md5(microtime());
			
			$res = $this
				->register_model
				->new_user(
					$this->input->post('first_name'), 
					$this->input->post('last_name'), 
					$this->input->post('email_address'), 
					$this->input->post('password'),
					$rand
					);
			
			$this->email->from('homehealthtracking@gmail.com', 'Home Health Tracking');
			$this->email->to($this->input->post('email_address'));
			$this->email->subject('Account Verification at Home Health Tracking');
			$this->email->message(
'Thank you for registering at Home Health Tracking
Your account has been created, you can login with the following credentials after you have activated your account by clicking the link below.
Link to activate: <a href='.site_url('verify').'?email_address='.$email_address.'&rand='.$rand.'>Click Here</a>'
); 
			if($this->email->send())
			{
				echo 'Email sent.';
			}
			else
			{
				show_error($this->email->print_debugger());
			}
		}
		
		$this->load->view('registration_view');
	}
	
	public function forgot_password()
	{
		$this->load->view('resetalert_view');
	}
	
	public function reset_password()
	{
		if ( isset($_SESSION['username']) ) {
			redirect('welcome');
		}
		$this->load->model('resetpassword_model');

		$email_address = $this->input->post('email_address');
		$rand = md5(microtime());
		
		$this->email->from('homehealthtracking@gmail.com', 'Home Health Tracking');
		$this->email->to($this->input->post('email_address'));
		$this->email->subject('Reset Password at Home Health Tracking');
		$this->email->message(
'You have requested to reset your password for Home Health Tracking
Link to reset password: <a href='.site_url('confirm_password').'?email_address='.$email_address.'&rand='.$rand.'>Click Here</a>'
); 
		if($this->email->send())
		{
			echo 'Reset password email sent.';
		}
		else
		{
			show_error($this->email->print_debugger());
		}
		$this->load->view('resetalert_view');
	}
	
	public function confirm_password()
	{
		$this->load->view('confirmpassword_view');
		$this->load->model('resetpassword_model');
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[15]|trim|matches[confpassword]1');
		$this->form_validation->set_rules('confpassword', 'Password Confirmation', 'required|trim');
		
		$res = $this
			->resetpassword_model
			->reset_password(
				$this->input->post('password')
				);
		
	}
	
	public function email_check($str)
	{
		if ($this->load->model('email_check_model', $str) == false)
		{
			//email exists error
			return true;
		}
		else
		{
			return false;
		}
		
	
	}
	
	public function verify()
	{
		$this->load->model('activate_model');
		$res = $this
			->activate_model
			->activate_user();
		$this->load->view('accountverified_view');  	
	}
	
	
	
	public function record_data()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('heart_rate', 'Heart Rate', 'min_length[2]|max_length[3]|required|trim');
		$this->form_validation->set_rules('sbp', 'Systolic Blood Pressure', 'min_length[2]|max_length[3]|required|trim');
		$this->form_validation->set_rules('dbp', 'Diatolic Blood Pressure', 'min_length[2]|max_length[3]|required|trim');
		$this->form_validation->set_rules('weight', 'Weight', 'min_length[2]|max_length[4]|required|trim');
			

		if ( $this->form_validation->run() !== false ) {
			$this->load->model('record_data_model');

			$res = $this
			->record_data_model
			->record_data(
			$this->input->post('heart_rate'), 
			$this->input->post('sbp'), 
			$this->input->post('dbp'),
			$this->input->post('weight')
			);
			
			if ($res == true)
			{
				$this->load->view('thank_you_view');
			}
			else
			{
				echo "<p>You've already entered your daily data.</p>";
				echo "<p>Come back tomorrow!</p>";
			}
		}	
	}

	public function show_data()
	{
		$this->load->model('reviewdata_model');
			$res = $this
				->reviewdata_model
				->showmostrecentdata();
				
			$row = $res->row();
			$_SESSION['heartrate'] = $row->heart_rate;
			$_SESSION['sbp'] = $row->s_blood_pressure;
			$_SESSION['dbp'] = $row->d_blood_pressure;
			$_SESSION['weight'] = $row->weight;
			
		$this->load->view('review_data_view');
	}
	
	public function review_week()
	{
		$this->load->model('reviewdata_model');
			$res = $this
				->reviewdata_model
				->sevendayverify();
				
		if ($res == true)
		{
			$this->load->view('health_alert_view');
		}
		else
		{
			$this->load->view('all_clear_view');
		}
	
	}
 
   
}

