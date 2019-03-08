<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ceklogin extends CI_Model {

  public function s_admin($pass, $usernm){
    $this->db->from('admin');
    $this->db->where('password', $pass);
    $this->db->where('username', $usernm);

    $query = $this->db->get();
    return $query->result();
  }

  public function v_admin($usernm){
    $this->db->select('*');
    $this->db->from('admin');
    $this->db->where('username', $usernm);

    $query = $this->db->get();
    return $query->result();
  }

}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */