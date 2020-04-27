<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solusipakar extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		solusipakar_logged_in();
		$this->load->model('pakar_model');
	}

	public function index()
	{
		
	}

	public function trouble()
	{
		$data = $this->session->userdata();
		$data['title'] = $this->session->userdata('keterangan')."|Dashboard";
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
		$data['drpdwntrouble'] = array(
				'' => '',
				'qit' => 'Kerusakan Gambar / Hasil',
				'ctc' => 'Kerusakan Tampil Kode Pada Layar',
				'uit' => 'Kerusakan pada saat Penggunanan dan Instalasi'
			);

		$this->load->view('backend/header',$data);
		$this->load->view('backend/menu');
		$this->load->view('backend/konten/diagnosamasalah');
		$this->load->view('backend/footer');
	}

	public function detailtrouble()
	{
		$id=$this->input->post('id');
		$data = $this->pakar_model->getdatakriteria('kerusakan',$id);
		echo json_encode($data);
	}

	public function diagnosa()
	{
		$data = $this->session->userdata();
		$data['title'] = $this->session->userdata('keterangan')."|Dashboard";
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
		switch (true) {
			case (null !==($this->input->post('diagnosaStart'))):
				$id = $this->input->post('jnsTrouble');
				$hasil = $this->pakar_model->getdatakriteria('keputusan',$id);
				$data['idtra'] = $this->pakar_model->getid('analisaresult','TRA');
				$data['pengetahuan'] = array_slice($hasil, 0, 1);
				foreach ($data['pengetahuan'] as $tanya) {
					$idpertanyaan = $tanya->id_pertanyaan;
					$data['pertanyaan'] = $this->pakar_model->getdatakriteria('pertanyaan',$idpertanyaan);
				}
				break;
			case (null !==($this->input->post('yes'))):
				$idanalisa 		= $this->input->post('id_analisaresult');
				$idpengetahuan 	= $this->input->post('id_knowledge');
				$idkerusakan	= $this->input->post('id_kerusakan');
				$idtanya 		= $this->input->post('id_pertanyaan');
				$idjawab		= $this->input->post('yes_answer');
				$cekterdaftar	= $this->pakar_model->hitungdatakriteria('analisaresult', array('id_analisaresult'=>$idanalisa));
				if ($cekterdaftar == 0) {
					$input1 = array(
						'id_analisaresult' 	=> $idanalisa,
						'tanggal_analisa' 	=> date('Y-m-d',time()),
						'id_user' 			=> $this->session->userdata('id'),
						'id_kerusakan' 		=> $idkerusakan,
						'section' 			=> 1
					);
					$this->pakar_model->tambahdata('analisaresult',$input1);
				}
					$jwbptng = substr($idjawab, 0, 3);
					if ($jwbptng == 'SST') {
						$tanya = $this->pakar_model->getdatakriteria('pertanyaan',$idtanya);
						foreach ($tanya as $tanyas) {
							$sebab = substr($tanyas->pertanyaan, 6);
						}
						$input2 = array(
							'id_analisaresult' 	=> $idanalisa,
							'penyebab' 			=> $sebab,
							'solusi' 			=> $idjawab
						);
						$this->pakar_model->tambahdata('analisaresultdetil',$input2);
						$this->pakar_model->hapusdata('analisaresultdetiltemp', array('id_analisaresult' => $idanalisa));
						redirect('solusipakar/hasildiagnosa/'.$idanalisa);
					} else {
						$input2 = array(
							'id_analisaresult' 	=> $idanalisa,
							'id_pertanyaan' 	=> $idtanya,
							'id_relasijawab' 	=> $idjawab
						);
						$this->pakar_model->tambahdata('analisaresultdetiltemp',$input2);
					}
					$data['idtra'] 	= $idanalisa;
					$nexttanya = array(
						'id_kerusakan' => $idkerusakan,
						'id_pertanyaan' => $idjawab, 
					);
					$data['pengetahuan'] = $this->pakar_model->getdataarraykriteria('keputusan',$nexttanya);
					$data['pertanyaan'] = $this->pakar_model->getdatakriteria('pertanyaan',$idjawab);

				
			case (null !==($this->input->post('no'))):
				$idanalisa 		= $this->input->post('id_analisaresult');
				$idpengetahuan 	= $this->input->post('id_knowledge');
				$idkerusakan	= $this->input->post('id_kerusakan');
				$idtanya 		= $this->input->post('id_pertanyaan');
				$idjawab		= $this->input->post('no_answer');
				$cekterdaftar	= $this->pakar_model->hitungdatakriteria('analisaresult', array('id_analisaresult'=>$idanalisa));
				if ($cekterdaftar == 0) {
					$input1 = array(
						'id_analisaresult' 	=> $idanalisa,
						'tanggal_analisa' 	=> date('Y-m-d',time()),
						'id_user' 			=> $this->session->userdata('id'),
						'id_kerusakan' 		=> $idkerusakan,
						'section' 			=> 1
					);
					$this->pakar_model->tambahdata('analisaresult',$input1);
				}
					$jwbptng = substr($idjawab, 0, 3);
					if ($jwbptng == 'SST') {
						$tanya = $this->pakar_model->getdatakriteria('pertanyaan',$idtanya);
						foreach ($tanya as $tanyas) {
							$sebab = substr($tanyas->pertanyaan, 6);
						}
						$input2 = array(
							'id_analisaresult' 	=> $idanalisa,
							'penyebab' 			=> 'Tidak'.$sebab,
							'solusi' 			=> $idjawab
						);
						$this->pakar_model->tambahdata('analisaresultdetil',$input2);
						$this->pakar_model->hapusdata('analisaresultdetiltemp', array('id_analisaresult' => $idanalisa));
						redirect('solusipakar/hasildiagnosa/'.$idanalisa);
					} else {
						$input2 = array(
							'id_analisaresult' 	=> $idanalisa,
							'id_pertanyaan' 	=> $idtanya,
							'id_relasijawab' 	=> $idjawab
						);
						$this->pakar_model->tambahdata('analisaresultdetiltemp',$input2);
					}
					$data['idtra'] 	= $idanalisa;
					$nexttanya = array(
						'id_kerusakan' => $idkerusakan,
						'id_pertanyaan' => $idjawab, 
					);
					$data['pengetahuan'] = $this->pakar_model->getdataarraykriteria('keputusan',$nexttanya);
					$data['pertanyaan'] = $this->pakar_model->getdatakriteria('pertanyaan',$idjawab);

				
				break;
			
			default:
				# code...
				break;
		}
		
		$data['buttonya'] = array(
					'name'          => 'yes',
			        'id'            => 'yes',
			        'value'         => 'ya',
			        'type'          => 'submit',
			        'content'       => '<i class="fa fa-check"></i> Ya',
			        'class'			=> 'btn btn-info'
					);
		$data['buttonno'] = array(
					'name'          => 'no',
			        'id'            => 'no',
			        'value'         => 'tidak',
			        'type'          => 'submit',
			        'content'       => '<i class="fa fa-remove"></i> Tidak',
			        'class'			=> 'btn btn-danger'
					);
		$this->load->view('backend/header',$data);
		$this->load->view('backend/menu');
		$this->load->view('backend/konten/diagnosaproses');
		$this->load->view('backend/footer');
	}

	public function hasildiagnosa($id)
	{
		$data = $this->session->userdata();
		$data['title'] = $this->session->userdata('keterangan')."|Dashboard";
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
		$kriteria = $id;
		$data['hasil'] = $this->pakar_model->getdatahasildiagnosa('analisaresult', $kriteria);
		$this->load->view('backend/header',$data);
		$this->load->view('backend/menu');
		$this->load->view('backend/konten/diagnosahasil');
		$this->load->view('backend/footer');
	}
	public function cetak()
	{
		ob_start();
		$table="kerusakan";
        $data['data_tbsiswa']=$this->pakar_model->getdatatabel($table);
        $this->load->view('pageprint/hasilanalisa',$data);
        $html = ob_get_contents();
        ob_end_clean();                
        require_once('./assets/plugins/html2pdf/html2pdf.class.php');    
        $pdf = new HTML2PDF('P','A4','en');
        $pdf->setDefaultFont('Arial');
        $pdf->WriteHTML($html);   
        $pdf->Output('Data Siswa.pdf', 'D');
	}
}

/* End of file Solusipakar.php */
/* Location: ./application/controllers/Solusipakar.php */