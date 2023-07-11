<div class="content-wrapper">
	<section class="content"><strong>DETAIL DATA MAHASISWA</strong>
<table class="table">
	<tr>
		<th>Nama Lengkap</th>
		<th><?php echo $detail->nama ?></th>
	</tr>
	<tr>
		<th>NIM</th>
		<th><?php echo $detail->nim ?></th>
	</tr>
	<tr>
		<th>Tanggal Lahir</th>
		<th><?php echo $detail->tgl_lahir ?></th>
	</tr>
	<tr>
		<th>Jurusan</th>
		<th><?php echo $detail->jurusan ?></th>
	</tr>
	<tr>
		<th>Alamat</th>
		<th><?php echo $detail->alamat ?></th>
	</tr>
	<tr>
		<th>No Telp</th>
		<th><?php echo $detail->no_telp ?></th>
	</tr>
	<tr>
		<th>Email</th>
		<th><?php echo $detail->email ?></th>
	</tr>
	<tr>
		<td>
			<img src="<?php echo base_url(); ?>assets/foto/<?php echo $detail->foto; ?>" width="90" height="110">
		</td>
		<td></td>
	</tr>
	
</table>
<a href="<?php echo base_url('mahasiswa/index') ?>" class="btn btn-primary">Kembali</a>
	</section>
</div>