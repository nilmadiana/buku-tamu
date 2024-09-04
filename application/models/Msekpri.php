<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Msekpri extends CI_Model
{

  public function view($bidang)
  {
    //return $this->db->get('tb_tamu')->result();
    //return $this->db->get_where('tb_tamu', array('tujuan' => $bidang))->result();
    return $this->db->query("SELECT * FROM `tb_tamu` WHERE month(waktu)=month(now()) AND tujuan = '$bidang' order by month(waktu) desc")->result();
  }

  public function jml_tamu()
  {
    return $this->db->query('SELECT date(waktu) AS wkt, COUNT(waktu) AS jumlah FROM `tb_tamu` GROUP BY date(waktu)')->result();
  }

  public function validation($mode)
  {
    $this->load->library('form_validation');
    if ($mode == "save") {
      $this->form_validation->set_rules('input_nama', 'Nama', 'required|max_length[50]');
      $this->form_validation->set_rules('input_jeniskelamin', 'Jenis Kelamin', 'required');
      $this->form_validation->set_rules('input_alamat', 'Alamat', 'required');
      $this->form_validation->set_rules('input_nominal', 'Nominal', 'required|numeric|max_length[15]');
    } else if ($mode == "update") {
      $this->form_validation->set_rules('edit_alamat', 'Alamat', 'required');
    }
    if ($this->form_validation->run()) {
      return true;
    } else {
      return false;
    }
  }

  public function save($data)
  {
    $this->db->insert('tb_tamu', $data);
  }

  public function edit($id)
  {
    $data = array(
      "nik" => $this->input->post('edit_nik'),
      "nama" => $this->input->post('edit_nama'),
      "jenis_kelamin" => $this->input->post('edit_jeniskelamin'),
      "alamat" => $this->input->post('edit_alamat'),
      "tujuan" => $this->input->post('edit_tujuan'),
      "keperluan" => $this->input->post('edit_keperluan'),
      "jumlah" => $this->input->post('edit_jumlah'),
      "status" => $this->input->post('edit_status'),
      "keterangan" => $this->input->post('edit_keterangan')
    );
    $this->db->where('id_tamu', $id);
    $this->db->update('tb_tamu', $data);
  }
}
