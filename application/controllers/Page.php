<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		sudah_login();
	}

	public function index()
	{
		$keteranganinfo = array(
			'is_main_menu' => 0,
			'hakakses' => $this->session->userdata('keterangan'),
			'keterangan' => 'info'
		);
		$data['infomenu'] 	= $this->tampil_model->mainmenu($keteranganinfo);
		$data['title']		= "Simpatis";
		$this->load->view('welcome',$data);
	}

	public function aboutus()
	{
		
	}

	public function contactus()
	{
		# code...
	}

}

/* End of file Page.php */
/* Location: ./application/controllers/Page.php */