<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LandingController extends CI_Controller {

	
	public function index()
	{
		$this->load->view('_part/landing_head');
		$this->load->view('_part/landing_header');
		$this->load->view('index');
		$this->load->view('_part/landing_footer');
	}

	
}