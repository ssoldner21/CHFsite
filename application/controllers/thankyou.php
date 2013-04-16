<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Thankyou extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler(TRUE);
	}

   
	public function index()
	{
		$this->load->model('thankyou_model');
		//$this->load->view('thank_you_view');
	}
 
   
}

