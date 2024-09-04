<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Sekpri extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Msekpri'); // Load Msekpri ke controller ini
		$this->load->model('Madmin'); // Load Madmin ke controller ini
	}
	public function index()
	{
		date_default_timezone_set('Asia/Bangkok');
		$id = $this->session->userdata('users');
		$data['namauser'] = $this->Madmin->setting($id);
		$datauser = $data['namauser'];
		$bidang = $datauser['bidang'];

		$data = $this->Msekpri->view($bidang);
		// var_dump($data);
		// die;
		$this->load->view('sekpri');
	}
	public function tampil_tamu()
	{
		$id = $this->session->userdata('users');
		$data['namauser'] = $this->Madmin->setting($id);
		$datauser = $data['namauser'];
		$bidang = $datauser['bidang'];
		// var_dump($bidang);
		// die;
		$data = $this->Msekpri->view($bidang);
		echo json_encode($data);
	}

	public function jumlah_tamu()
	{
		$data = $this->Msekpri->jml_tamu();
		echo json_encode($data);
	}
	public function simpan()
	{
		if ($this->Msekpri->validation("save")) { // Jika validasi sukses atau hasil validasi adalah true
			$this->Msekpri->save();
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
	public function ubah($id)
	{
		if ($this->Msekpri->validation("update")) { // Jika validasi sukses atau hasil validasi adalah true
			$this->Msekpri->edit($id);
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
	public function hapus($id)
	{
		$this->Msekpri->delete($id);
		$callback = array(
			'status' => 'sukses'
		);
		echo json_encode($callback);
	}
	public function date()
	{
		$date = date('Y-m-d H:i:s');
		echo json_encode($date);
	}
	public function laporan_pdf(){
		
		$this->load->views('dataRekap');

		$data = array(
			"waktu" => $this->get('waktu'),
			"nik" => $this->get('nik'),
			"nama" => $this->get('nama'),
			"alamat" => $this->get('alamat'),
			"tujuan" => $this->get('tujuan'),
			"keperluan" => $this->get('keperluan'),
			"jumlah" => $this->get('jumlah'),
			"status" => $this->get('status'),
			"keterangan" => $this->get('keterangan'),
			"tamu" => $this->get('tamu')
		);
		
	
		$this->load->library('pdf');
	
		$this->pdf->setPaper('Legal', 'landscape');
		$this->pdf->filename = "laporan-bukutamu.pdf";
		$this->pdf->load_view('laporan_pdf', $data);
	
	}
	public function save()
	{
		$nik = $this->input->post('nik', true);
		$nama = $this->input->post('nama', true);
		$jenis_kelamin = $this->input->post('jenis_kelamin', true);
		$tujuan = $this->input->post('tujuan', true);
		$alamat = $this->input->post('alamat', true);
		$keperluan = $this->input->post('keperluan', true);
		$jumlah = $this->input->post('jumlah', true);
		$waktu = $this->input->post('waktu', true);
		$status = $this->input->post('status', true);
		$keterangan = $this->input->post('keterangan', true);
		$image = $this->input->post('image');
		$image = str_replace('data:image/jpeg;base64,', '', $image);
		$image = base64_decode($image);
		$filename = 'image_' . time() . '.png';
		file_put_contents(FCPATH . '/uploads/' . $filename, $image);
		$data = array(
			'nik' => $nik,
			'nama' => $nama,
			'alamat' => $alamat,
			'keperluan' => $keperluan,
			'jumlah' => $jumlah,
			'waktu' => $waktu,
			'jenis_kelamin' => $jenis_kelamin,
			'tujuan' => $tujuan,
			'status' => $status,
			'keterangan' => $keterangan,
			'foto' => $filename,
		);

		if ($this->input->post('type') == 1) {
			$this->Msekpri->save($data);
			echo json_encode(array(
				"statusCode" => 200
			));
		}
	}
}
