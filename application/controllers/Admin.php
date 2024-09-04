<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Madmin'); // Load Madmin ke controller ini
	}
	public function index()
	{
		$data = $this->Madmin->view();
		$this->load->view('admin');
	}
	public function tampil_admin()
	{
		$data = $this->Madmin->view();
		echo json_encode($data);
	}

	public function jumlah_admin()
	{
		$data = $this->Madmin->jml_admin();
		echo json_encode($data);
	}
	public function simpan()
	{
		if ($this->Madmin->validation("save")) { // Jika validasi sukses atau hasil validasi adalah true
			$this->Madmin->save();
			$callback = array(
				'status' => 'sukses'
			);
		} else {
			$callback = array(
				'status' => 'gagal'
			);
		}

		echo json_encode($callback);
	}
	public function ubah($users)
	{
		if ($this->Madmin->validation("update")) { // Jika validasi sukses atau hasil validasi adalah true
			$this->Madmin->edit($users);
			$callback = array(
				'status' => 'sukses'
			);
		} else {
			$callback = array(
				'status' => 'gagal'
			);
		}

		echo json_encode($callback);
	}
	public function hapus($users)
	{
		$this->Madmin->delete($users);
		$callback = array(
			'status' => 'sukses'
		);
		echo json_encode($callback);
	}
	public function save()
	{
		$nama = $this->input->post('nama', true);
		$username = $this->input->post('username', true);
		$password = $this->input->post('password', true);
		$nohp = $this->input->post('nohp', true);
		$bidang = $this->input->post('bidang', true);
		$level = $this->input->post('level', true);
		$data = array(
			'nama' => $nama,
			'username' => $username,
			'password' => $password,
			'nohp' => $nohp,
			'bidang' => $bidang,
			'level' => $level,
		);

		if ($this->input->post('type') == 1) {
			$this->Madmin->save($data);
			echo json_encode(array(
				"statusCode" => 200
			));
		}
	}
}
