<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autentikasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('autentikasi_model');
	}

	public function index()
	{	
		if ($this->session->has_userdata('id')) {
        	redirect('dashboard');
       	} else {
			// lakukan validasi form	
			$this->form_validation->set_rules('username', 'Username', 'required', array('required' => 'Username harus diisi!' ));
			$this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'Password harus diisi!' ));

			if ($this->form_validation->run() == TRUE) {
				//dapatkan data user
				$data_login = array(
					'name' => set_value('username'),
					'password' => md5(set_value('password')),
					);
				$data_users = $this->autentikasi_model->getdatauser($data_login);
				//validasi login
				if ($data_users->id_user == "") {
					$this->session->set_flashdata('keterangan','Username dan Password Salah!');
				} else {
					$ide 		= $data_users->id_user; 
					$jabatan	= $data_users->jabatan;
					$level		= $data_users->level;
					$tab 		= str_split($ide,3);
					$ket 		= $tab[0];

					//katagorikan level user
					switch (true) {
						case ($ket == "PLG"):
							$Keterangan = "Pelanggan";
							break;

						case ($ket == "KRW" and $level == "Association"):
							$Keterangan = "Tehnik";
							break;

						case ($ket == "KRW" and $level == "Professional"):
							$Keterangan = "Pakar";
							break;

						case ($ket == "KRW" and $jabatan == "Admin" or $jabatan == "Manager"):
							$Keterangan = "Admin";
							break;

						default:
							$Keterangan ="";
							break;
					}

					//buat data session
					if ($Keterangan == "Pelanggan") {
						$new_data = array(
						'id' 			=> $ide,
						'nama' 			=> $data_users->nama,
						'ket1'			=> "PIC",
						'ket2'			=> "",
						'ket3'			=> $Keterangan,
						'ket4' 			=> $data_users->perusahaan_main,
						'ket5' 			=> $data_users->perusahaan_sub,
						'keterangan'	=> $Keterangan,
						'foto'			=> $data_users->foto,
						 );
					} else {
						$new_data = array(
						'id' 			=> $ide,
						'nama' 			=> $data_users->nama,
						'ket1'			=> $Keterangan,	
						'ket2'			=> $level,
						'ket3'			=> "Karyawan",
						'ket4'			=> $data_users->department,
						'ket5' 			=> $jabatan,
						'keterangan'	=> $Keterangan,
						'foto'			=> $data_users->foto,
						 );
					}

					$this->session->set_userdata($new_data);
				} 
				redirect('autentikasi');

			} else {
				$button = array(
					'name'          => 'button',
			        'id'            => 'button',
			        'value'         => 'true',
			        'type'          => 'submit',
			        'content'       => '<i class="fa fa-lock"></i> Log In',
			        'class'			=> 'btn btn-theme btn-block'
					);
				$formlogin = array(
					'button' 		=> $button,
					'eror_login'	=> $this->session->flashdata('keterangan')
				);
				$this->load->view('login', $formlogin);
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}


}
