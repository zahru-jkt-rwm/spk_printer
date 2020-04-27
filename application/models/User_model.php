<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function getdatauser($tabel)
	{
		$hasil = $this->db->from($tabel)
						  ->join('user', $tabel.'.id_user = user.id_user')
						  ->get();
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		} else {
			return array();
		}
		
	}

	public function getid($tabel)
	{
		$hasil = $this->db->query('SELECT MAX(RIGHT(id$)) AS idmax FROM '.$tabel);

		if ($hasil->num_rows() > 0) {
			$tempid = ((int)$hasil->row()) + 1;
			if ($tempid > 9) {
				$id = "00".$tempid; 
			} elseif ($tempid > 99) {
				$id = "0".$tempid;
			} elseif ($tempid > 999) {
				$id = $tempid;
			} else {
				$id = "000".$tempid;
			}
			return $kd = $tabel.$id;
		} else {
			return array();
		}
	}

	public function ubag($tabel,$data)
	{
		$this->db->replace($tabel, $data);
	}
	
	public function hapusdata($tabel, $id)
	{
		$this->db->where($id)
				 ->delete($tabel);
	}

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */