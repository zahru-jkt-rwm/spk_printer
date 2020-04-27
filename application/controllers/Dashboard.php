<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		dashboard_logged_in();
	}

	public function index()
	{
		$data 			= $this->session->userdata();
		$data['title'] 	= $this->session->userdata('keterangan')."|Dashboard";
		$keteranganmain = array(
			'is_main_menu' => 0,
			'hakakses' => $this->session->userdata('keterangan'),
			'keterangan' => 'main'
		);
		$data['mainmenu'] = $this->tampil_model->mainmenu($keteranganmain);
		$keteranganinfo = array(
			'is_main_menu' => 0,
			'hakakses' => $this->session->userdata('keterangan'),
			'keterangan' => 'info'
		);
		$data['infomenu'] = $this->tampil_model->mainmenu($keteranganinfo);
		switch ($this->session->userdata('keterangan')) {
			case 'Admin':
				$data['widget'] 		= $this->tampil_model->ambildata('widget');
				$data['widget1']		= array_filter($data['widget'], function($a)
	            {
	              return $a->data == 'count1'|$a->data == 'count2'|$a->data =='count3'|$a->data =='count4';
	            });
	            $data['widget2']		=array_filter($data['widget'], function($a)
	            {
	             return $a->data == 'count5' | $a->data == 'count6' | $a->data == 'count7' | $a->data == 'count8';
	            });
				$data['count1'] 		= $this->tampil_model->hitungdata('pelanggan');
				$data['count3'] 		= $this->tampil_model->hitungdatakriteria('karyawan', array('level1' => array('level' => 'Professional'), 'level2' => array('level' => 'Expert' )));
				$data['count2'] 		= $this->tampil_model->hitungdatakriteria('karyawan', array('level1' => array('level' => 'Association'), 'level2' => array('level' => 'Association' )));
				$data['count4'] 		= $this->tampil_model->hitungdata('analisaresult');
				$data['count5'] 		= $this->tampil_model->hitungdata('solusi');
				$data['count6'] 		= $this->tampil_model->hitungdata('kerusakan');
				$data['count7'] 		= $this->tampil_model->hitungdata('pertanyaan');
				$data['count8'] 		= $this->tampil_model->hitungdata('keputusan');
				$data['userPelanggan']	= $this->tampil_model->joinlimitlapanbaru('pelanggan','user');
				$data['userKaryawan']	= $this->tampil_model->joinlimitlapanbaru('karyawan','user');
				break;
			case 'Pakar':
				$data['widget'] = $this->tampil_model->ambildata('widget');
				$data['widget1']		=array_filter($data['widget'], function($a)
	            {
	             return $a->data == 'count5' | $a->data == 'count6' | $a->data == 'count7' | $a->data == 'count8';
	            });
				$data['count5'] = $this->tampil_model->hitungdata('solusi');
				$data['count6'] = $this->tampil_model->hitungdata('kerusakan');
				$data['count7'] = $this->tampil_model->hitungdata('pertanyaan');
				$data['count8'] = $this->tampil_model->hitungdata('keputusan');
				break;
			case 'Tehnik':
				# code...
				break;
			case 'Pelanggan':
				# code...
				break;

			
			default:
				# code...
				break;
		}
		$this->load->view('backend/header',$data);
		$this->load->view('backend/menu');
		$this->load->view('backend/konten/dashboard');
		$this->load->view('backend/footer');
	}

	public function test()
	{
		echo date('dmyt',time());
	}

	public function oke()
	{
		$sesi = $this->session->userdata();
		$browser = $this->input->user_agent();
		echo $browser;
		print_r($sesi);
		$this->load->model('pakar_model');
		$data = $this->pakar_model->getdatajoin($value);
		print_r($data);
	}
	
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */