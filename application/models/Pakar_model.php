<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pakar_model extends CI_Model {
	public function getdatatabel($caritb)
	{
		$hasil = $this->db->get($caritb);

		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		} else {
			return array();
		}
	}

	public function getdatakriteria($tabel,$kriteria)
	{
		if ($tabel == "keputusan" and substr($kriteria, 0, 3) == "QIT" or substr($kriteria, 0, 3) == "CTC" or substr($kriteria, 0, 3) == "UIT" ) {
			$cari = "kerusakan";
		} else {
			$cari = $tabel;
		}
		
		$hasil = $this->db->like('id_'.$cari, $kriteria)
						  ->get($tabel);

		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		} else {
			return array();
		}
	}

	public function getdataarraykriteria($tabel,$kriteria)
	{
		$hasil = $this->db->like($kriteria)
						  ->get($tabel);

		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		} else {
			return array();
		}
	}

	public function getdatahasildiagnosa($tabel,$id)
	{
		$hasil2 = $this->db->where($tabel.'.id_'.$tabel,$id)
						   ->from($tabel)
						   ->join('analisaresultdetil', 'analisaresultdetil.id_'.$tabel.' = '.$tabel.'.id_'.$tabel)
						   ->get();
		if ($hasil2->num_rows() > 0) {
			return $hasil2->row();
		} else {
			return array();
		}
	}

	public function getdatajoin($tabel1,$tabel2)
	{
		$hasil = $this->db->from($tabel1)
						  ->join($tabel2, $tabel1.'.id_user = '.$tabel2.'.id_user')
						  ->get();
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		} else {
			return array();
		}	  
	}


	public function hitungdata($tabel)
	{
		$hasil = $this->db->get($tabel);

		if ($hasil->num_rows() > 0) {
			return $hasil->num_rows();
		} else {
			return array();
		}
	}

	public function hitungdatakriteria($tabel,$kriteria)
	{
		$hasil = $this->db->like($kriteria)
						  ->get($tabel);

		return $hasil->num_rows();
	
	}

	public function limadataterbaru($tabel)
	{
		$hasil 		= $this->db->query("SELECT MAX(RIGHT(id_".$tabel.",4)) AS idmax FROM ".$tabel);
		if ($hasil->num_rows() > 0) {
			$data 		= $hasil->row();
			$intdata	= (int)$data->idmax;
			if ($intdata > 5) {
				$tempdata	= $intdata-5;
				$hasillimit	= $this->db->get($tabel, 5, $tempdata);
			} else {
				$hasillimit = $this->db->get($tabel);
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

	public function getid($caritb,$kriteria)
	{
		if ($caritb != 'analisaresult') {
			$q = $this->db->query("SELECT MAX(RIGHT(id_".$caritb.",4)) AS idmax FROM ".$caritb." WHERE id_".$caritb." LIKE '%".$kriteria."%'");
			$kd = "";
			if ($q->num_rows() > 0) {
				foreach ($q->result() as $k) {
					$tmp = ((int)$k->idmax)+1;
					if ($tmp > 9) {
						$kd = "00".$tmp;
					} elseif ($tmp > 99) {
						$kd = "0".$tmp;
					} elseif ($tmp > 999) {
						$kd = $tmp;
					} else {
						$kd = "000".$tmp;
					}	
				} 
			} else {
					$kd = "0001";
			}
		} else {
			$q = $this->db->query("SELECT MAX(RIGHT(id_".$caritb.",10)) AS idmax FROM ".$caritb." WHERE id_".$caritb." LIKE '%".$kriteria."%'");
			$kd = "";
			if ($q->num_rows() > 0) {
				foreach ($q->result() as $k) {
					$temp1 = substr($k->idmax, 6, 4);
					$temp2 = substr($k->idmax, 0, 6);
					
					if ($temp2 = date('dmy',time())) {
						$tempint = ((int)$temp1) + 1;
						if ($tempint > 9) {
							$kd = $temp2."00".$tempint;
						} elseif ($tempint > 99) {
							$kd = $temp2."0".$tempint;
						} elseif ($tempint > 999) {
							$kd = $temp2.$tempint;
						} else {
							$kd = $temp2."000".$tempint;
						}
					} else {
						$kd = date('dmy', time())."0001";
					}
				}
			} else {
				$kd = date('dmy', time())."0001";
			}
			
		}

		return $kriteria.$kd;
		
	}

	public function tambahdata($tabel, $data)
	{
		$this->db->insert($tabel, $data);
	}

	public function ubahdata($tabel, $data)
	{
		$this->db->replace($tabel, $data);
	}

	public function hapusdata($tabel, $id)
	{
		$this->db->where($id)
				 ->delete($tabel);
	}


}

/* End of file Pakar_model.php */
/* Location: ./application/models/Pakar_model.php */