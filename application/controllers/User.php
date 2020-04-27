<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		user_logged_in();
		$this->load->model('user_model');
	}

	public function index()
	{
		$data 				= $this->session->userdata();
		$data['title'] 		= $this->session->userdata('keterangan')."|User";
		$keteranganmain 	= array(
			'hakakses' => $this->session->userdata('keterangan'),
			'keterangan' => 'main'
		);
		$keteranganinfo 	= array(
			'hakakses' => $this->session->userdata('keterangan'),
			'keterangan' => 'info'
		);
		$data['menutotal']	= $this->tampil_model->mainmenu($keteranganmain);
		$data['mainmenu'] 	= array_filter($datamenutotal,function($a)
		{
			return $a == "0";
		});
		$data['infomenu'] 		= $this->tampil_model->mainmenu($keteranganinfo);
		print_r($data);
		$this->load->view('backend/dt_header',$data);
		$this->load->view('backend/menu');
		$this->load->view('backend/konten/datausers');
		$this->load->view('backend/dt_footer');
	}

	public function data($caritb)
	{
		$data = $this->session->userdata();
		$data['title'] = $this->session->userdata('keterangan')."|User ".$caritb;
		$keteranganmain = array(
			'is_main_menu' => 0,
			'hakakses' => $this->session->userdata('keterangan'),
			'keterangan' => 'main'
		);
		$keteranganinfo = array(
			'is_main_menu' => 0,
			'hakakses' => $this->session->userdata('keterangan'),
			'keterangan' => 'info'
		);
		$data['infomenu'] = $this->tampil_model->mainmenu($keteranganinfo);
		$data['mainmenu'] = $this->tampil_model->mainmenu($keteranganmain);
		$data['datausers'] = $this->user_model->getdatauser($caritb);

		$this->load->view('backend/dt_header',$data);
		$this->load->view('backend/menu');
		$this->load->view('backend/konten/data'.$caritb);
		$this->load->view('backend/dt_footer');
	}

	public function profile($id)
	{
		$data = $this->session->userdata();
		$data['title'] = $this->session->userdata('keterangan')."|User ".$caritb;
		$keteranganmain = array(
			'is_main_menu' => 0,
			'hakakses' => $this->session->userdata('keterangan'),
			'keterangan' => 'main'
		);
		$keteranganinfo = array(
			'is_main_menu' => 0,
			'hakakses' => $this->session->userdata('keterangan'),
			'keterangan' => 'info'
		);
		$data['infomenu'] = $this->tampil_model->mainmenu($keteranganinfo);
		$data['mainmenu'] = $this->tampil_model->mainmenu($keteranganmain);

		$this->load->view('backend/dt_header',$data);
		$this->load->view('backend/menu');
		$this->load->view('backend/konten/data'.$caritb);
		$this->load->view('backend/dt_footer');
	}

	public function tambah()
	{
		# code...
	}

	public function edit($id)
	{
		# code...
	}

	public function delete($id)
	{
		# code...
	}
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */