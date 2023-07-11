<?php 
class Sample extends CI_Controller {
	public function index () {
	// $this->load->view('sample_view');
	$this->load->model('m_mhs');
	$data['mahasiswa'] = $this->m_mhs->get_data();		
	
	$this->load->view('v_mhs', $data);

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('mahasiswa', $data);
		$this->load->view('template/footer');
	}
}
?>	