<h2>Tambah Lowongan</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Divisi</label>
		<input type="text" name="nama_divisi" class="form-control">
	</div>
	<div class="form-group">
		<label>Tanggal</label>
		<input type="text" name="tanggal" class="form-control">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="10"></textarea>
	</div>
	
	<button class="btn btn-primary" name="save">Simpan</button>
</form>

<?php 

if (isset($_POST['save'])) {	
	$koneksi->query("INSERT INTO lowongan (nama_divisi,tanggal,deskripsi) VALUES('$_POST[nama_divisi]','$_POST[tanggal]','$_POST[deskripsi]')");

	echo "<div class='alert alert-info'>Data tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=lowongan'>";
}

 ?>



