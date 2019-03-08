<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin');
		$this->load->model('ceklogin');
		$this->load->model('Model_Matkul');

		if(is_null($this->session->userdata('usernm'))){
    	  redirect('sipra_login');
  	  	}else{
    	$data['user'] = $this->session->userdata('usernm');
			$this->load->view('admin/header', $data);
    	}
	}
	
	public function index()
	{
		$this->load->view('/admin/home_admin');
	}

	public function mk(){ //view matakuliah
		$data = $this->Model_Matkul->getAllMatkul();
		$this->session->set_userdata('all_data', $data);
		$this->load->view('admin/listmatkul', $data);
	}

	public function mkadd(){ //form tambah
		$this->load->view('admin/addmatkul');
		
		// if (null !== $this->input->post('inputmk')) {
			
		// 	//AMBIL ARRAY DARI SESSION
		// 	$matkul = $this->session->userdata('matkul');
		// 	$kdmatkul = $this->session->userdata('kdmatkul');
		// 	$sks = $this->session->userdata('sks');

		// 	//AMBIL VALUE DARI TAMPILAN
		// 	$a = $this->input->post('mk');
		// 	$b = $this->input->post('kdmk');
		// 	$c = $this->input->post('sks');

		// 	//TAMBAH ARRAY
		// 	array_push($matkul, $a);
		// 	array_push($kdmatkul, $b);
		// 	array_push($sks, $c);

		// 	// $this->session->unset_userdata('matkul');
		// 	// $this->session->unset_userdata('kdmatkul');
		// 	// $this->session->unset_userdata('sks');

		// 	//MASUKIN ARRAY BARU KE SESSION LAGI
		// 	$this->session->set_userdata('matkul', $matkul);
		// 	$this->session->set_userdata('kdmatkul', $kdmatkul);
		// 	$this->session->set_userdata('sks', $sks);

		// 	redirect('admin/mk');
		// }
	}

	public function proses_mkadd(){
		$Kode = $this->input->post('kdmk');
		$Nama = $this->input->post('mk');
		$SKS = $this->input->post('sks');
		$username = $this->session->userdata('usernm');
		$this->Model_Matkul->input_matkul($Nama,$Kode,$SKS);
		redirect('admin/mk');
	}

	public function update_matkul(){
		$data = $this->Model_Matkul->getAllMatkul();
		$this->session->set_userdata('all_data', $data);
		$query['dataMatkul'] = $this->Model_Matkul->getMatkul($_GET['KD']);
		$this->load->view('admin/updatematkul',$query);
	}

	public function proses_updatemk()
	{
		$Kode = $this->input->post('kdmk');
		$Nama = $this->input->post('mk');
		$SKS = $this->input->post('sks');
		$username = $this->session->userdata('usernm');

		$this->Model_Matkul->edit_matkul($Nama,$Kode,$SKS);
		redirect('admin/mk');
	}

	public function hapus_Matkul()
	 {
		 	 $KD = $_GET['KD'];
			 $this->Model_Matkul->hapus_matkul($KD);
			 redirect('admin/mk');

	 }

	public function dosen(){ //view dosen
		$data['dosen'] = $this->session->userdata('dosen');
		$data['kddosen'] = $this->session->userdata('kddosen');
		$data['matkuldos'] = $this->session->userdata('matkuldos');
		$data['periode'] = $this->session->userdata('periode');

		$this->load->view('admin/listdosen', $data);
	}

	public function asprak(){ //view asprak
		$data['nama_asprak'] = $this->session->userdata('nama_asprak');
		$data['nim_asprak'] = $this->session->userdata('nim_asprak');
		$data['matkul_asprak'] = $this->session->userdata('matkul_asprak');

		$this->load->view('admin/listasprak', $data);
	}

	public function searchasprak(){
		$nama_asprak = $this->session->userdata('nama_asprak');
		$nim_asprak = $this->session->userdata('nim_asprak');
		$matkul_asprak = $this->session->userdata('matkul_asprak');
		$cari = $this->input->post('cari');

		if(in_array($cari, $nama_asprak)){
			$key = array_search($cari, $nama_asprak);
			$data['nama_asprak'] = $nama_asprak[$key];
			$data['nim_asprak'] = $nim_asprak[$key];
			$data['matkul_asprak'] = $matkul_asprak[$key];

			$this->load->view('admin/listaspraks', $data);
		}
		elseif(in_array($cari, $nim_asprak)){
			$key = array_search($cari, $nim_asprak);
			$data['nama_asprak'] = $nama_asprak[$key];
			$data['nim_asprak'] = $nim_asprak[$key];
			$data['matkul_asprak'] = $matkul_asprak[$key];

			$this->load->view('admin/listaspraks', $data);	
		}
		elseif(in_array($cari, $matkul_asprak)){
			$key = array_search($cari, $matkul_asprak);
			$data['nama_asprak'] = $nama_asprak[$key];
			$data['nim_asprak'] = $nim_asprak[$key];
			$data['matkul_asprak'] = $matkul_asprak[$key];

			$this->load->view('admin/listaspraks', $data);

		}
		else{
			$data['nof'] = "data tidak ada";
			$this->load->view('admin/listaspraks', $data);
		}
	}

	public function praktikan(){ //view praktikan
		$data['nama_praktikan'] = $this->session->userdata('nama_praktikan');
		$data['nim_praktikan'] = $this->session->userdata('nim_praktikan');
		$data['matkul_praktikan'] = $this->session->userdata('matkul_praktikan');

		$this->load->view('admin/listpraktikan', $data);	
	}

	public function del_proc($nomor){
		$matkul = $this->session->userdata('matkul');
		$kdmatkul = $this->session->userdata('kdmatkul');
		$sks = $this->session->userdata('sks');

		array_splice($matkul, $nomor,1);
		array_splice($kdmatkul, $nomor,1);
		array_splice($sks, $nomor,1);
		
		$this->session->set_userdata('matkul', $matkul);
		$this->session->set_userdata('kdmatkul', $kdmatkul);
		$this->session->set_userdata('sks', $sks);

		redirect('admin/mkdel','refresh');
	}		

	public function hancurkan(){
    $this->session->sess_destroy();
    redirect('sipra_login');
  }

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */