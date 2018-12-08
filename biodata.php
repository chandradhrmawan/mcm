<?php 

include 'koneksi.php';

 ?>




<!DOCTYPE html>
<html>
<head>
	<title>Biodata Pelamar</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>
<div class="container">
	<h2>Biodata User</h2>
<form method="post" enctype="multipart/form-data">
	
	<div class="form-group">
	<label>Nama :</label>
	<input type="text" name="nama" class="form-control" required="">
	</div>
	
	
	<div class="form-group">
	<label>Tanggal lahir :</label>
	<input type="date" name="tanggal_lahir" class="form-control" required="">	
	</div>
	
	
	<div class="form-group">
	<label>No Telpon :</label>
	<input type="text" maxlength="12" name="no_telp" class="form-control" required="">	
	</div>
	
	
	<div class="form-group">
	<label>Alamat :</label>
	<textarea name="alamat" rows="5" cols="60" class="form-control" required=""></textarea>	
	</div>

	<div class="form-group">
	<label>Jenis Kelamin :</label>
	<input type="radio" name="jenis_kelamin" value="Laki-laki" required="">Laki-laki
	<input type="radio" name="jenis_kelamin" value="Perempuan" required="">Perempuan	
	</div>
	
	
	<div class="form-group">
	<label>Status :</label>
	<input type="radio" name="status" value="Lajang" required="">Lajang
	<input type="radio" name="status" value="Menikah" required="">Menikah	
	</div>
	
	
	<div class="form-group">
	<label>No KTP :</label>
	<input type="text" maxlength="16" name="no_ktp" class="form-control" required="">	
	</div>
	
	
	<div class="form-group">
	<label>Email :</label>
	<input type="text" name="email" class="form-control" required="">	
	</div>
	
	
	<div class="form-group">
	<label>Pendidikan :</label>
	<select name="pendidikan" class="form-control" required="">
			<option value="D3-Sekretaris">D3-Sekretaris</option>
			<option value="S1-Sekretaris">S1-Sekretaris</option>
		</select>	
	</div>
	
	<div class="form-group">
	<label> Perguruan Tinggi </label>
	<input type="radio" name="perguruan_tinggi" value="ptn" required="">PTN
		<input type="radio" name="perguruan_tinggi" value="pts" required="">PTS
	(Terakreditasi)
	</div>


	<div class="form-group">
	<label> Nama Perguruan Tinggi </label>
	<input type="text" name="nama_perguruan_tinggi" class="form-control" required="">	
	</div>
	
	
	<div class="form-group">
	<label> IPK </label>
	<input type="text" maxlength="4" name="ipk" value="0" step="0.1" class="form-control" required="">
	</div>
	
	<div class="form-group">
	<label> ID-Skype </label>
	<input type="text" name="id_skype" required="">
	</div>

	<div class="form-group">
	<label>Pengalaman Kerja</label>
	<input type="number" name="pengalaman_kerja" value="0" step="1" class="form-control" required="">		
	</div>
	
	<div class="form-group">
	<label>Deskripsi Singkat</label>
	<textarea name="deskripsi_singkat" rows="5" cols="60" class="form-control" required=""></textarea>	
	</div>
	
	<div class="form-group">
	<label>Document</label>
	<input type="file" name="dokument" required="">
	<p class="text-danger">*File upload mohon dalam bentuk (.zip/ .rar/ .pdf/ .doc/ .docx), maksimal file 3 Mb</p>
	</div>

		<button name="simpan" class="btn btn-primary">Simpan</button>
	
</form>
</div>

<?php 

if (isset($_POST["simpan"])){
	//upload dulu foto dokument
	$namadokument =$_FILES["dokument"]["name"];
	$lokasidokument =$_FILES["dokument"]["tmp_name"];
	$namafix =date("YmdHis").$namadokument;
	move_uploaded_file($lokasidokument, "dokument/$namafix");

	$id_pelamar = $_POST["id_pelamar"];
	$nama=$_POST["nama"];
	$tanggal_lahir=$_POST["tanggal_lahir"];
	$no_telp=$_POST["no_telp"];
	$alamat=$_POST["alamat"];
	$jenis_kelamin=$_POST["jenis_kelamin"];
	$status=$_POST["status"];
	$no_ktp=$_POST["no_ktp"];
	$email=$_POST["email"];
	$pendidikan=$_POST["pendidikan"];
	$perguruan_tinggi=$_POST["perguruan_tinggi"];
	$nama_perguruan_tinggi=$_POST["nama_perguruan_tinggi"];
	$ipk=$_POST["ipk"];
	$id_skype=$_POST["id_skype"];
	$pengalaman_kerja=$_POST["pengalaman_kerja"];
	$deskripsi_singkat=$_POST["deskripsi_singkat"];

	//simpan ke db biodata_user
	$koneksi->query("INSERT INTO biodata_user(id_pelamar,nama,tanggal_lahir,no_telp,alamat,jenis_kelamin,status,no_ktp,email,pendidikan,perguruan_tinggi,nama_perguruan_tinggi,ipk,id_skype,pengalaman_kerja,deskripsi_singkat,dokument) VALUES ('$id_pelamar','$nama','$tanggal_lahir','$no_telp','$alamat','$jenis_kelamin','$status','$no_ktp','$email','$pendidikan','$perguruan_tinggi','$nama_perguruan_tinggi','$ipk','$id_skype','$pengalaman_kerja','$deskripsi_singkat','$namafix')");

	echo "<script>alert('Terimakasih, Dokument Anda Sudah Diteruskan Ke Admin');</script>";

}
else{
 echo "<script>alert('Dokument Anda Gagal Coba Lagi');</script>";
}

 ?>


</body>
</html>