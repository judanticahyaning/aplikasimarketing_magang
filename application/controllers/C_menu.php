<?php

/**
 * 
 */
class C_menu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('marketmodel');
		error_reporting(0);
	}

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/login');
		$this->load->view('template/footer');
	}
	public function menu()
	{
		if (isset($_POST['activity'])) {

			redirect(base_url('Activity_sv/index'));
		}
		if (isset($_POST['prospect'])) {

			redirect(base_url('Prospect_sv/index'));
		}
	}

	public function menu_am()
	{
		if (isset($_POST['activity'])) {

			redirect(base_url('Activity_am/index'));
		}
		if (isset($_POST['prospect'])) {

			redirect(base_url('Prospect_am/index'));
		}
	}
}
