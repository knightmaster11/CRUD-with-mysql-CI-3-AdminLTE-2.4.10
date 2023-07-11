<?php 
class Mahasiswa extends CI_Controller{
	public function index() 
	{
		$data['mahasiswa'] = $this->m_mahasiswa->tampil_data()->result();

			$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('mahasiswa', $data);
		$this->load->view('template/footer');

	}

	public function tambah_aksi()
	{
			$nama		= $this->input->post('nama');
			$nim		= $this->input->post('nim');
			$tgl_lahir	= $this->input->post('tgl_lahir');
			$jurusan	= $this->input->post('jurusan');
			$alamat	= $this->input->post('alamat');
			$no_telp	= $this->input->post('no_telp');
			$email	= $this->input->post('email');
			$foto  =$_FILES['foto'];
			if ($foto=''){}else{
				$config['upload_path'] ='./assets/foto';
				$config['allowed_types'] ='jpg|png|gif';

				$this->load->library('upload',$config);
				if(!$this->upload->do_upload('foto')){
					echo "gagal Upload foto !";die();
				}else {
					$foto=$this->upload->data('file_name');
				}
			}

			$data = array(
				'nama' 		=> $nama,
				'nim' 		=> $nim,
				'tgl_lahir' => $tgl_lahir,
				'jurusan'	=> $jurusan,
				'alamat'	=> $alamat,
				'no_telp'	=> $no_telp,
				'email'	=> $email, 
				'foto' => $foto,
				);

			$this->m_mahasiswa->input_data($data, 'tb_mahasiswa');
			redirect('mahasiswa/index'); 

	}
	public function hapus($id)
	{
		$where = array ('id'=>$id);
		$this->m_mahasiswa->hapus_data($where,'tb_mahasiswa');
		redirect('mahasiswa/index');
	}
	public function edit($id)
	{
		$where = array ('id'=>$id);
		$data['mahasiswa'] = $this->m_mahasiswa->edit_data($where,'tb_mahasiswa')->result();
		// redirect('mahasiswa/index');
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('edit', $data);
		$this->load->view('template/footer');
	}
	public function update(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$nim = $this->input->post('nim');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$jurusan = $this->input->post('jurusan');
		$alamat = $this->input->post('alamat');
		$no_telp = $this->input->post('no_telp');
		$email = $this->input->post('email');

		$data = array(
			'nama' => $nama ,
			'nim' => $nim ,
			'tgl_lahir' => $tgl_lahir,
			'jurusan' => $jurusan,
			'alamat' => $alamat,
			'no_telp' => $no_telp,
			'email' => $email 
			);

		$where = array(
			'id' => $id 
			);
		$this->m_mahasiswa->update_data($where,$data,'tb_mahasiswa');
		redirect('mahasiswa/index');
	}
	public function detail($id){
		$this->load->model('m_mahasiswa');
		$detail = $this->m_mahasiswa->detail_data($id);
		$data['detail']=$detail;
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('detail', $data);
		$this->load->view('template/footer');
	}
	public function cetak(){
		$data['mahasiswa'] = $this->m_mahasiswa->tampil_data('tb_mahasiswa')->result();
		$this->load->view('print_mahasiswa', $data);
	}

	public function pdf(){
		$this->load->library('dompdf_gen');

		$data['mahasiswa'] = $this->m_mahasiswa->tampil_data('tb_mahasiswa')->result();

		$this->load->view('laporan_pdf',$data);

		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		ob_end_clean();
		$this->dompdf->stream("laporan_mahasiswa.pdf", array('Attachment' => 1));
	}


	public function contoh()
    {
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');
        
        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Penjualan Toko Kita';
        
        // filename dari pdf ketika didownload
        $file_pdf = 'laporan_penjualan_toko_kita';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        
		$html = $this->load->view('laporan_contoh_pdf',$this->data, true);	    
        
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
    }
}

 ?>