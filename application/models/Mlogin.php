<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mlogin extends CI_Model
{
  public function login($username, $password)
  {
    return $this->db->where('username', $username)->where('password', $password)->get('admin')->result();
  }
}
