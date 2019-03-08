<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class m_admin extends CI_Model {

	public function v_matkul(){
    $this->db->select('*');
    $this->db->from('mk');

    $query = $this->db->get();
    return $query->result();
  }

  public function v_asprak(){
    $this->db->select('*');
    $this->db->from('asprak');

    $query = $this->db->get();
    return $query->result();
  }

  public function v_modul(){
    $this->db->select('*');
    $this->db->from('modul');

    $query = $this->db->get();
    return $query->result();
  }

  public function v_dosen(){
    $this->db->select('*');
    $this->db->from('dosen');

    $query = $this->db->get();
    return $query->result();
  }

}

/* End of file m_admin.php */
/* Location: ./application/models/m_admin.php */