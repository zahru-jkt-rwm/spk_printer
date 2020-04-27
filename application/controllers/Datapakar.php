<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datapakar extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		datapakar_logged_in();
		$this->load->model('pakar_model');
	}

	public function index()
	{
		$data = $this->session->userdata();
		$data['title'] = $this->session->userdata('keterangan')."|Datapakar";
		$keteranganmain = array(
			'is_main_menu' => 0,
			'hakakses' => $this->session->userdata('keterangan')
		);
		$data['mainmenu'] = $this->tampil_model->mainmenu($keteranganmain);
		$data['pertanyaan'] = $this->pakar_model->dataterbaru('pertanyaan');
		$data['kerusakan'] = $this->pakar_model->dataterbaru('pertanyaan');
		$data['solusi'] = $this->pakar_model->dataterbaru('solusi');
		$data['keputusan'] = $this->pakar_model->dataterbaru('keputusan');
	}
 
	public function tabel($caritb)
	{
		//nyatakan data title
		$data = $this->session->userdata();
		$data['title'] = $this->session->userdata('keterangan')."|Data ".$caritb;
		//panggil model untuk mengambil hak aksek menu
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
		//buat case untuk memanggil model pembuat id dan model query ambil data tabel
		switch ($caritb) {
			case 'kerusakan':
				$data['idqit'] = $this->pakar_model->getid($caritb, 'QIT');
				$data['tabel'] = $this->pakar_model->getdatatabel($caritb);
				break;
			case 'pertanyaan':
				$data['idtdp'] = $this->pakar_model->getid($caritb, 'TDP');
				$data['tabel'] = $this->pakar_model->getdatatabel($caritb);
				break;
			case 'solusi':
				$data['idsst'] = $this->pakar_model->getid($caritb, 'SST');
				$data['tabel'] = $this->pakar_model->getdatatabel($caritb);
				break;
			case 'keputusan':
				$data['tabel'] = $this->pakar_model->getdatatabel('kerusakan');
				$data['tabel1'] = $this->pakar_model->getdatatabel('solusi');
				$data['tabel2'] = $this->pakar_model->getdatatabel('pertanyaan');
				$data['tabel3'] = $this->pakar_model->getdatatabel('keputusan');
				break;
			
			default:
				$data['kode'] = "";
				break;
		}		
		//nyatakan data berhasil
		$data['info'] = $this->session->flashdata('berhasil');
		//nyatakan data error
		$data['alert'] = $this->session->flashdata('alert');
		$this->load->view('backend/dt_header',$data);
		$this->load->view('backend/menu');
		$this->load->view('backend/konten/tabel'.$caritb);
		$this->load->view('backend/dt_footer');
	}

	public function tambah($tabel, $kriteria)
	{
		switch ($tabel) {
			case 'kerusakan':
				//validasi form setiap id tidak boleh kosong
				$this->form_validation->set_rules('id_kerusakan', 'Id_kerusakan', 'required');
				$this->form_validation->set_rules('kerusakan', 'Kerusakan', 'required');

				if ($this->form_validation->run() == TRUE) {
					// buat id trouble
					switch ($kriteria) {
						case 'qit':
							$id_kerusakan = $this->input->post('id_kerusakan');
							break;
						case 'ctc':
							$id_kerusakan = "CTC".$this->input->post('id_kerusakan');
							break;
						default:
							# code...
							break;
					}
					//nyatakan data kerusakan
					$data = array(
						'id_kerusakan' => $id_kerusakan,
						'kerusakan' => set_value('kerusakan')
					);
					//panggil model untuk tambah data ke database
					$this->pakar_model->tambahdata($tabel, $data);
				} else {
					//munculkan pesan error field harus di isi
					$this->session->set_flashdata('alert', 'ID '.$tabel.' dan Deskripsi '.$tabel.' harus diisi!');
					redirect('datapakar/tabel/'.$tabel);
				}
				break;
			case 'solusi':
				// validasi form tidak boleh kosong
				$this->form_validation->set_rules('solusi', 'Solusi', 'required');

				if ($this->form_validation->run() == TRUE) {
					$data = array(
						'id_solusi'	=> $this->input->post('id_solusi'),
						'solusi' 	=> set_value('solusi')
					);
					//panggil model untuk tambah data ke database
					$this->pakar_model->tambahdata($tabel,$data);
				} else {
					//munculkan pesan error field harus di isi
					$this->session->set_flashdata('alert', 'ID '.$tabel.' dan Deskripsi '.$tabel.' harus diisi!');
					redirect('datapakar/tabel/'.$tabel);
				}
				break;
			case 'pertanyaan':
				$this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');

				if ($this->form_validation->run() == TRUE) {
					$data = array(
						'id_pertanyaan'	=> $this->input->post('id_pertanyaan'),
						'pertanyaan' 	=> set_value('pertanyaan')
					);
					//panggil model untuk tambah data ke database
					$this->pakar_model->tambahdata($tabel,$data);
				} else {
					//munculkan pesan error field harus di isi
					$this->session->set_flashdata('alert', 'ID '.$tabel.' dan Deskripsi '.$tabel.' harus diisi!');
					redirect('datapakar/tabel/'.$tabel);
				}
				break;

			default:
				# code...
				break;
		}

			//munculkan pesan berhasil menambahkan data
			$this->session->set_flashdata('berhasil', 'Data '.$tabel.' berhasil ditambahkan');
			redirect('datapakar/tabel/'.$tabel); 
	}

	public function ubah($tabel, $id)
	{
		//pilih case dari tiap tabel
		switch ($tabel) {
			case 'kerusakan':
				// validasi form field tidak boleh kosong
				$this->form_validation->set_rules('kerusakan', 'Kerusakan', 'required');
				if ($this->form_validation->run() == TRUE) {
					//nyatakan data kerusakan
					$data = array(
					'id_kerusakan' 	=> $id,
					'kerusakan'		=> $this->input->post('kerusakan')
				);
					//panggil model untuk ubah data ke database
				$this->pakar_model->ubahdata($tabel, $data);
				} else {
					//munculkan pesan error field harus diisi
					$this->session->set_flashdata('alert', 'Data ID '.$tabel.' dan '.$tabel.' tidak boleh kosong!');
					redirect('datapakar/tabel/'.$tabel);
				}
				break;
			case 'solusi':
				// validasi form field tidak boleh kosong
				$this->form_validation->set_rules('solusi', 'Solusi', 'required');
				if ($this->form_validation->run() == TRUE) {
					//nyatakan data kerusakan
					$data = array(
					'id_solusi' 	=> $id,
					'solusi'		=> $this->input->post('solusi')
				);
					//panggil model untuk ubah data ke database
				$this->pakar_model->ubahdata($tabel, $data);
				} else {
					//munculkan pesan error field harus diisi
					$this->session->set_flashdata('alert', 'Data ID '.$tabel.' dan '.$tabel.' tidak boleh kosong!');
					redirect('datapakar/tabel/'.$tabel);
				}
				break;
			case 'pertanyaan':
				// validasi form field tidak boleh kosong
				$this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
				if ($this->form_validation->run() == TRUE) {
					//nyatakan data kerusakan
					$data = array(
					'id_pertanyaan' => $id,
					'pertanyaan'		=> $this->input->post('pertanyaan')
				);
					//panggil model untuk ubah data ke database
				$this->pakar_model->ubahdata($tabel, $data);
				} else {
					//munculkan pesan error field harus diisi
					$this->session->set_flashdata('alert', 'Data ID '.$tabel.' dan '.$tabel.' tidak boleh kosong!');
					redirect('datapakar/tabel/'.$tabel);
				}
				break;

			default:
				# code...
				break;
		}
		//munlculkan pesan data berhasil di ubah
		$this->session->set_flashdata('berhasil', 'Data ID '.$tabel.' '.$id.' telah berhasil di ubah');
		redirect('datapakar/tabel/'.$tabel);
	}

	public function hapus($tabel, $id)
	{
		//pilih tabel mana yang akan di ubah
		switch ($tabel) {
			case 'kerusakan':
				$tabel1	= 'keputusan';
				$id1	= array('id_'.$tabel => $id);
				$this->pakar_model->hapusdata($tabel1, $id1);
				break;
			case 'pertanyaan':
				$tabel1	= 'pertanyaan';
				$id1	= array('id_'.$tabel => $id);
				$this->pakar_model->hapusdata($tabel1, $id1);
				break;
			case 'solusi':
				$tabel1	= 'solusi';
				$id1	= array('id_'.$tabel => $id);
				$this->pakar_model->hapusdata($tabel1, $id1);
				break;
			
			default:
				# code...
				break;
		}
		$this->pakar_model->hapusdata($tabel, $id1);
		$this->session->set_flashdata('berhasil', 'Data '.$tabel.' dengan ID '.$tabel.' : '.$id.' sudah berhasil di hapus.');
		redirect('datapakar/tabel/'.$tabel);
	}
}

/* End of file data_pakar.php */
/* Location: ./application/controllers/data_pakar.php */