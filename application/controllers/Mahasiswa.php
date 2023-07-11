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

			$data = array(
				'nama' 		=> $nama,
				'nim' 		=> $nim,
				'tgl_lahir' => $tgl_lahir,
				'jurusan'	=> $jurusan,
				'alamat'	=> $alamat,
				'no_telp'	=> $no_telp,
				'email'	=> $email, 
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
}

 ?>