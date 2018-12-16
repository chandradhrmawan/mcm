<h2>Edit Soal</h2>

<?php 
$ambil = $koneksi->query("SELECT * FROM soal WHERE id='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";
 ?>

 <form method="post" enctype="multipart/form-data">
 	<div class="form-group">
 		<label>Soal</label>
 		<textarea name="nama_soal" class="form-control" value="<?php echo $pecah['nama_soal']; ?>"><?php echo $pecah['nama_soal']; ?></textarea>
 	</div>
 	<div class="form-group">
 		<label> Pilihan </label>
 		<input type="text" name="a" class="form-control" value="<?php echo $pecah['a']; ?>">
 		<input type="text" name="b" class="form-control" value="<?php echo $pecah['b']; ?>">
 		<input type="text" name="c" class="form-control" value="<?php echo $pecah['c']; ?>">
 		<input type="text" name="d" class="form-control" value="<?php echo $pecah['d']; ?>">
 		<input type="text" name="e" class="form-control" value="<?php echo $pecah['e']; ?>">
 	</div>
 	<div class="form-group">
 		<label> Jawaban </label>

 		<select name="jawaban" class="form-control" style="width: 30% !important;">
 			<option value="">--Pilih Jabawan--</option>
 			<option value="a" <?=($pecah['jawaban']=='a') ? 'selected' :'';?>> <?=$pecah['a'];?> </option>
 			<option value="b" <?=($pecah['jawaban']=='b') ? 'selected' :'';?>> <?=$pecah['b'];?> </option>
 			<option value="c" <?=($pecah['jawaban']=='c') ? 'selected' :'';?>> <?=$pecah['c'];?> </option>
 			<option value="d" <?=($pecah['jawaban']=='d') ? 'selected' :'';?>> <?=$pecah['d'];?> </option>
 			<option value="e" <?=($pecah['jawaban']=='e') ? 'selected' :'';?>> <?=$pecah['e'];?> </option>
 		</select>
 	</div>
 	

 	
 	<button class="btn btn-primary" name="ubah">Update</button>
 </form>

 <?php 

if (isset($_POST['ubah'])) {
	//jika foto dirubah
	
		$koneksi->query("UPDATE soal SET nama_soal='$_POST[nama_soal]',
										a='$_POST[a]',
										b='$_POST[b]',
										c='$_POST[c]',
										d='$_POST[d]',
										e='$_POST[e]', 
										jawaban='$_POST[jawaban]' 
										WHERE id='$_GET[id]'");

	echo "<script> alert('Soal berhasil diubah'); </script>";
	echo "<script> location='index.php?halaman=soaltes';</script>";
}

  ?>