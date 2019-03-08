<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Model_Matkul extends CI_Model {


		function getAllMatkul() {

		    $this->db->from('mata_kuliah');
		    $query = $this->db->get();
		    return $query->result();
		}

		function getMatkul($KD) {

		    $this->db->from('mata_kuliah');
		    $this->db->where('KD_matkul', $KD);
		    $query = $this->db->get();
		    return $query->result();
		}

		function input_matkul($Nama, $Kode, $SKS){

			$data = array(
				'KD_matkul'=> $Kode,
				'SKS'=> $SKS,
				'Nama_matkul' => $Nama,
				'Admin_id' => '123'
			);

			$this->db->insert('mata_kuliah', $data);
		}

		public function edit_matkul($Nama, $Kode, $SKS){

			$data = array(
				'KD_matkul'=> $Kode,
				'SKS'=> $SKS,
				'Nama_matkul' => $Nama
			);

			$this->db->where('KD_matkul',$Kode);
			$this->db->update('mata_kuliah', $data);
		}

		public function hapus_matkul($Kode)
		{
				$this->db->where('KD_matkul', $Kode);
				$this->db->delete('mata_kuliah');
		} 
}

?>
