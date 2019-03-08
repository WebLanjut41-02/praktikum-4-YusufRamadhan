<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sipra_login extends CI_Controller {
	public function __construct()
  {
    parent::__construct();
    $this->load->model('ceklogin');
    if(!is_null($this->session->userdata('usernm'))){
      redirect('Admin/admin');
    }
  }
  public function index()
  {
    $this->load->view('login');
  }

  public function cek(){
    $usrnm = $this->input->post('usrnm');
    $pass = $this->input->post('pass');

    $cek = $this->ceklogin->s_admin($pass, $usrnm);
    $result = count($cek);
    
    if ($result > 0){
      $a = $this->db->get_where('admin', array('password' => $pass, 'username' => $usrnm))->row();

      $usernm1 = $this->ceklogin->v_admin($a->username)[0]->username;
      // $IDadmin = $this->ceklogin->v_admin($a->username)[0]->Admin_id;
      // echo $nip;
	
		// $dataSession = array(
		// 	'nama' => $usernm1,
		// 	'id_pen' => $IDadmin,
		// 	'Status' => 'Login'
		// );

		// $this->session->set_userdata($dataSession);

      $this->session->set_userdata('usernm', $usernm1);
      redirect('admin');

    }else{
      $data['cekin'] = true;
      $this->load->view('login', $data);
    }
  }
}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */