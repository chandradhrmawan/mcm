<h2>Tambah Soal</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Soal</label>
		<textarea name="nama_soal" class="form-control"></textarea>
	</div>
	<div class="form-group">
 		<label> Pilihan </label>
 		<input type="text" name="a" class="form-control" >
 		<input type="text" name="b" class="form-control" >
 		<input type="text" name="c" class="form-control">
 		<input type="text" name="d" class="form-control" >
 		<input type="text" name="e" class="form-control" >
 	</div>
	<div class="form-group">
		<label>Jawaban</label>
		<input type="text" name="jawaban" class="form-control">
	</div>
	
	<button class="btn btn-primary" name="save">Simpan</button>
</form>

<?php 

if (isset($_POST['save'])) {	
	$koneksi->query("INSERT INTO soal (nama_soal,a,b,c,d,e,jawaban) VALUES('$_POST[nama_soal]','$_POST[a]','$_POST[b]','$_POST[c]','$_POST[d]','$_POST[e]','$_POST[jawaban]')");

	echo "<div class='alert alert-info'>Data Soal tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=soaltes'>";
}

 ?>



