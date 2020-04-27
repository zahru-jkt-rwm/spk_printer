<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('m_pdf');
		$this->load->model('pakar_modal');
	}

	public function doprint($pdf=false)
	{
	 $data['tes'] = 'ini print dari HTML ke PDF';
	 $output = $this->load->view('pageprint/hasilanalisa',$data, true);
	 return $this->_gen_pdf($output);
	}

	public function cetakpdf() {
        $table="kerusakan";
        $data['data_tbsiswa']=$this->pakar_modal->getdatatabel($table);
        
        $this->load->view('pageprint/hasilanalisa',$data);
    }
 
}

/* End of file Report.php */
/* Location: ./application/controllers/Report.php */