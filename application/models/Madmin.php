<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Madmin extends CI_Model
{

    public function view()
    {
        return $this->db->get('admin')->result();
    }
    public function setting($users)
    {
        return $this->db->get_where('admin', ['users' => $users])->row_array();
    }

    public function jml_admin()
    {
        return $this->db->query('SELECT nama, COUNT(nama) AS jumlah FROM `admin` GROUP BY nama')->result();
    }

    public function validation($mode)
    {
        $this->load->library('form_validation');
        if ($mode == "save") {
            $this->form_validation->set_rules('input_nama', 'nama', 'required');
            $this->form_validation->set_rules('input_username', 'username', 'required');
            $this->form_validation->set_rules('input_password', 'password', 'required');
            $this->form_validation->set_rules('input_nohp', 'nohp', 'required');
            $this->form_validation->set_rules('input_bidang', 'bidang', 'required');
            $this->form_validation->set_rules('input_level', 'level', 'required');
        } else if ($mode == "update") {
            $this->form_validation->set_rules('edit_level', 'level', 'required');
        }
        if ($this->form_validation->run()) {
            return true;
        } else {
            return false;
        }
    }

    public function save($data)
    {
        $this->db->insert('admin', $data);
    }

    public function edit($users)
    {
        $data = array(
            "nama" => $this->input->post('edit_nama'),
            "username" => $this->input->post('edit_username'),
            "password" => $this->input->post('edit_password'),
            "nohp" => $this->input->post('edit_nohp'),
            "bidang" => $this->input->post('edit_bidang'),
            "level" => $this->input->post('edit_level'),
        );
        $this->db->where('users', $users);
        $this->db->update('admin', $data);
    }

    public function delete($users)
    {
        $this->db->where('users', $users);
        $this->db->delete('admin');
    }
}
