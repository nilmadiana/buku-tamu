<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Beranda extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mtamu'); // Load Mtamu ke controller ini
	}
	public function index()
	{
		date_default_timezone_set('Asia/Bangkok');
		$data = $this->Mtamu->view();
		$this->load->view('beranda');
	}
	public function tampil_tamu()
	{
		$data = $this->Mtamu->view();
		echo json_encode($data);
	}

	public function jumlah_tamu()
	{
		$data = $this->Mtamu->jml_tamu();
		echo json_encode($data);
	}
	public function simpan()
	{
		if ($this->Mtamu->validation("save")) { // Jika validasi sukses atau hasil validasi adalah true
			$this->Mtamu->save();
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
		if ($this->Mtamu->validation("update")) { // Jika validasi sukses atau hasil validasi adalah true
			$this->Mtamu->edit($id);
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
		$this->Mtamu->delete($id);
		$callback = array(
			'status' => 'sukses'
		);
		echo json_encode($callback);
	}
	public function date()
	{
		date_default_timezone_set('Asia/Bangkok');
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
		$tamu = $this->input->post('tamu', true);
		$waktu = $this->input->post('waktu', true);
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
			'tamu' => $tamu,
			'foto' => $filename,
		);

		if ($this->input->post('type') == 1) {
			$this->Mtamu->save($data);
			echo json_encode(array(
				"statusCode" => 200
			));
		}
	}
}
