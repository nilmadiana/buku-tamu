<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mlogin');
	}

	public function index()
	{
		$this->load->view('login');
	}

	function aksi_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$cek = $this->Mlogin->login($username, $password);
		// var_dump($cek);
		// die;
		if ($cek) {
			if ($cek[0]->level === "0") {
				$this->session->set_userdata('level', 'SUPERADMIN');
				$this->session->set_userdata('status', 'login');
				$this->session->set_userdata('users', $cek[0]->users);
				redirect('Admin');
			} elseif ($cek[0]->level === "1") {
				$this->session->set_userdata('level', 'RESEPSIONIS');
				$this->session->set_userdata('status', 'login');
				$this->session->set_userdata('users', $cek[0]->users);
				redirect('Beranda');
			} elseif ($cek[0]->level === "2") {
				$this->session->set_userdata('level', 'SEKPRI');
				$this->session->set_userdata('status', 'login');
				$this->session->set_userdata('users', $cek[0]->users);
				redirect('Sekpri');
			} else {
				$this->session->set_userdata('level', 'SATPOL');
				$this->session->set_userdata('status', 'login');
				$this->session->set_userdata('users', $cek[0]->users);
				redirect('Satpol');
			}
		} else {
			$this->session->set_flashdata('message', '<small>Email atau Password yang anda masukan salah silahkan ulangi kembali</small>');
			redirect('auth');
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
