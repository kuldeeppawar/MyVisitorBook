<?php

if (! defined('BASEPATH'))

	exit('No direct script access allowed');



class Admin_activity_logs extends CI_Controller

{



	public function __construct()

	{

		parent::__construct();

		

		$this->load->database();

		//$this->load->model('activity_logs_model');

		$this->load->helper('url');

		$this->load->helper('form');

		$this->load->library('form_validation');

		$this->load->library('session');

		$this->load->library('pagination');

		$this->load->library('jwt-master/JWT');

		$this->load->library('encrypt');

		$this->load->library('email');

		

		$this->form_validation->set_error_delimiters('<div class="error">','</div>');

	

	}

	

	public function setLoginLogs()

	{

				$ip_address=getenv('REMOTE_ADDR');



				echo $ip_address;



				exit;

	}

	

}



