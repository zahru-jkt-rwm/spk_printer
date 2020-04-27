<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tampil_model extends CI_Model {

	public function mainmenu($keteranganmain)
	{
		$hasil = $this->db->like($keteranganmain)
				 		  ->get('menu');

		return $hasil->result();

	}

	public function ambildata($tabel)
		{
			$hasil = $this->db->get($tabel);

			if ($hasil->num_rows() > 0) {
				return $hasil->result();
			} else {
				return array();
			}
		}	

	public function hitungdata($tabel)
	{
		$hasil = $this->db->get($tabel);

		return $hasil->num_rows();
	}

	public function hitungdatakriteria($tabel, $kriteria)
	{
		$hasil = $this->db->like($kriteria['level1'])
						  ->or_like($kriteria['level2'])
						  ->get($tabel);

		if ($hasil->num_rows() > 0) {
			return $hasil->num_rows();
		} else {
			return array();
		}
	}

	public function joinlimitlapanbaru($tabel1,$tabel2)
	{
			$hasil 		= $this->db->query("SELECT MAX(RIGHT(id_".$tabel2.",4)) AS idmax FROM ".$tabel1);
			if ($hasil->num_rows() > 0) {
				$data 		= $hasil->row();
				$intdata	= (int)$data->idmax;
				if ($intdata > 8) {
					$tempdata	= $intdata-8;
					$hasillimit	= $this->db->from($tabel1)
										   ->join($tabel2, $tabel2.'.id_user = '.$tabel1.'.id_user')
										   ->limit(8, $tempdata)
										   ->get();
				} else {
					$hasillimit	= $this->db->from($tabel1)
										   ->join($tabel2, $tabel2.'.id_user = '.$tabel1.'.id_user')
										   ->get();
				}
				
				if ($hasil->num_rows() > 0) {
					return $hasillimit->result();
				} else {
					return array();
				}
			} else {
				return array();
			}
	}

}

/* End of file tampil_model.php */
/* Location: ./application/models/tampil_model.php */