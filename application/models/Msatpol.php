<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Msatpol extends CI_Model
{

  public function view()
  {
    //return $this->db->get('tb_tamu')->result();
    return $this->db->query('SELECT * FROM `tb_tamu` WHERE month(waktu)=month(now()) order by month(waktu) desc')->result();
  }

  public function jml_tamu()
  {
    return $this->db->query('SELECT date(waktu) AS wkt, COUNT(waktu) AS jumlah FROM `tb_tamu` GROUP BY date(waktu)')->result();
  }

  public function validation($mode)
  {
    $this->load->library('form_validation');
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
}
