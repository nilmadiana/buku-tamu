<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Satpol extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Msatpol'); // Load Msatpol ke controller ini
	}
	public function index()
	{
		date_default_timezone_set('Asia/Bangkok');
		$data = $this->Msatpol->view();
		$this->load->view('satpol');
	}
	public function tampil_tamu()
	{
		$data = $this->Msatpol->view();
		echo json_encode($data);
	}

	public function jumlah_tamu()
	{
		$data = $this->Msatpol->jml_tamu();
		echo json_encode($data);
	}
	public function date()
	{
		$date = date('Y-m-d H:i:s');
		echo json_encode($date);
	}
}
