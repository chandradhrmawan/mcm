<h2>Edit Lowongan</h2>

<?php 
$ambil = $koneksi->query("SELECT * FROM lowongan WHERE id_lowongan='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";
 ?>

 <form method="post" enctype="multipart/form-data">
 	<div class="form-group">
 		<label>Nama Divisi</label>
 		<input type="text" name="nama_divisi" class="form-control" value="<?php echo $pecah['nama_divisi']; ?>">
 	</div>
 	<div class="form-group">
 		<label> Tanggal</label>
 		<input type="text" name="tanggal" class="form-control" value="<?php echo $pecah['tanggal']; ?>">
 	</div>
 	<div class="form-group">
 		<label>Persyaratan</label>
 		<textarea name="persyaratan" class="form-control" rows="10"><?php echo $pecah['persyaratan']; ?></textarea>
 	</div>
 	<button class="btn btn-primary" name="ubah">Edit</button>
 </form>

 <?php 

if (isset($_POST['ubah'])) {
	//jika foto dirubah
	
		$koneksi->query("UPDATE lowongan SET nama_divisi='$_POST[nama_divisi]', tanggal='$_POST[tanggal]', persyaratan='$_POST[persyaratan]' WHERE id_lowongan='$_GET[id]'");

	echo "<script> alert('Data  berhasil diubah'); </script>";
	echo "<script> location='index.php?halaman=lowongan';</script>";
}

  ?>