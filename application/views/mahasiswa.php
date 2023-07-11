<div class="content-wrapper">
	 <section class="content-header">
      <h1>
        Data Mahasiswa
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Mahasiswa</li>
      </ol>
    </section>

    <section class="content">
    
    <button class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop"><i class="fa fa-plus" ></i> Tambah Data Mahasiswa</button>

    <a class="btn btn-danger" href="<?php echo base_url('mahasiswa/cetak') ?>"><i class="fa fa-print"></i> Print </a>

    	<table class="table">
    		<tr>
    			<td>No</td>
    			<td>Nama Mahasiswa</td>
    			<td>NIM</td>
    			<td>Tanggal Lahir</td>
    			<td>Jurusan</td>
    			<td>AKSI</td>
    		</tr>
    		<?php
    		$no = 1;
    		foreach ($mahasiswa as $mhs) : ?>
    		<tr>
    			<td><?php echo $no++ ?></td>
    			<td><?php echo $mhs->nama ?></td>
    			<td><?php echo $mhs->nim ?></td>
    			<td><?php echo $mhs->tgl_lahir ?></td>
    			<td><?php echo $mhs->jurusan ?></td>
    			<td> <?php echo anchor('mahasiswa/detail/'.$mhs->id,'<div class=" btn btn-success btn-sm"><i class="fa fa-search-plus"></i></div>') ?> </td>
    			<td onclick="javascript: return confirm('anda yakin hapus ?')"><?php echo anchor('mahasiswa/hapus/'.$mhs->id, '<div class="btn btn-danger btn-sm"><i class=" fa fa-trash"></i></div>') ?></td>
	   			<td><?php echo anchor('mahasiswa/edit/'.$mhs->id,'<div class="btn btn-primary btn-sm"><i class=" fa fa-edit"></i></div>') ?></td>

    		</tr>
    	<?php endforeach;  ?>
    	</table>
    </section>

 <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title fs-5" id="staticBackdropLabel">Form Input Data Mahasiswa</h3>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- <form method="post" action="<?php echo base_url().'mahasiswa/tambah_aksi' ?>"> -->
        <?php echo form_open_multipart('mahasiswa/tambah_aksi'); ?>

        	<div class="form-group">
        		<label>Nama Mahasiswa</label>
        		<input type="text" name="nama" class="form-control">
        	</div>

        	<div class="form-group">
        		<label>NIM</label>
        		<input type="text" name="nim" class="form-control">
        	</div>

        	<div class="form-group">
        		<label>Tanggal Lahir</label>
        		<input type="date" name="tgl_lahir" class="form-control">
        	</div>

        	<div class="form-group">
        		<label>Jurusan</label>
        		  <select class="form-control" name="jurusan">
            <option>Sistem Informasi</option>    
            <option>Teknik Informasi</option>    
            <option>Teknik Komputer</option>    
            </select>
        	</div>
        	<div class="form-group">
        		<label>Alamat</label>
        		<input type="text" name="alamat" class="form-control">
        	</div>

			<div class="form-group">
        		<label>No Telepon</label>
        		<input type="text" name="no_telp" class="form-control">
        	</div>

			<div class="form-group">
        		<label>Email</label>
        		<input type="text" name="email" class="form-control">
        	</div>

            <div class="form-group">
                <label>Upload foto</label>
                <input type="file" name="foto" class="form-control">
            </div>

		<button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
        <button type="submit" class="btn btn-primary">Save</button>
        <!-- </form> -->
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
</div>
