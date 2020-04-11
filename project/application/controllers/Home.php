<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
	}


	public function index()
	{
		$this->load->view('home/index');
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
