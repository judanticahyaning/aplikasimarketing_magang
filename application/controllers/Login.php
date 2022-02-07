<?php
class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('marketmodel');
		error_reporting(0);
	}

	public function index()
	{
		if ($this->session->userdata('kode_am') == false) {
			$this->load->view('template/header');
			$this->load->view('template/navbar');
			$this->load->view('template/login');
			$this->load->view('template/footer');
		} else if ($this->session->userdata('kode_am')) {
			redirect('/Login/login');
		}
	}
	public function login()
	{

		if ($this->session->userdata('kode_am')) {
			if ($this->session->userdata('previlege') == "SPV") {
				$this->load->view('sv/menu');
			} else {
				$this->load->view('am/menu');
			}
		} else if (isset($_POST['login'])) {
			$kode_am = $this->input->post('kode_am');
			$password = $this->input->post('password');

			$data = array(
				'kode_am' => $kode_am,
				'password' => $password
			);
			$cek = $this->marketmodel->cekLogin("am", $data);
			if ($cek) {
				$this->session->set_userdata(array('kode_am' => $kode_am));
				$this->session->set_userdata(array('nama_am' => $cek->nama_am));
				$this->session->set_userdata(array('id_am' => $cek->id_am));
				$this->session->set_userdata(array('password' => $password));
				$this->session->set_userdata(array('previlege' => $cek->previlege));
				if ($cek->previlege == "SPV") {
					$this->load->view('sv/menu');
				} else {
					$this->load->view('am/menu');
				}
			} else {
				redirect('login?pesan=gagal');
			}
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('kode_am');
		$this->session->set_flashdata('message', '<script languange="javascript">window.alert("Anda telah logout")</script>');
		redirect('/');
	}
	public function about()
	{
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/about');
		$this->load->view('template/footer');
	}
}
