<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autentikasi_model extends CI_Model {

	public function getdatauser($data_login)
	{
		$login = $this->db->where($data_login)
						  ->limit('1')
						  ->get('user');

		if ($login->num_rows() > 0) {
			$logins = $login->row();
			$id = $logins->id_user;
			$tab = str_split($id,3);
			$tabel = $tab[0];
			if ($tabel == "KRW") {
				$user_data = $this->db->where('user.id_user',$id)
									  ->from('user')
									  ->join('karyawan', 'user.id_user = karyawan.id_user')
									  ->get();
				return $user_data->row();
			} else if ($tabel == "PLG") {
				$user_data = $this->db->where('user.id_user',$id)
									  ->from('user')
									  ->join('pelanggan', 'user.id_user = pelanggan.id_user')
									  ->get();
				return $user_data->row();
			}
		}else {
			return array();
		}

	}

}

/* End of file Autentikasi_model.php */
/* Location: ./application/models/Autentikasi_model.php */