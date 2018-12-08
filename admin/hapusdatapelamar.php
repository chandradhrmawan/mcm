<?php 

$ambil = $koneksi->query("SELECT * FROM biodata_user WHERE id_pelamar='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$cv = $pecah['cv'];
$ijazah = $pecah['ijazah'];
$sertifikat_keahlian = $pecah['sertifikat_keahlian'];
$fotocopy_ktp = $pecah['fotocopy_ktp'];
$npwp = $pecah['npwp'];






if (file_exists("../cv/$cv")) {
	unlink("../cv/$cv");
}
elseif (file_exists("../ijazah/$ijazah")) {
	unlink("../ijazah/$ijazah");
}
elseif (file_exists("../sertifikat_keahlian/$sertifikat_keahlian")) {
	unlink("../sertifikat_keahlian/$sertifikat_keahlian");
}
elseif (file_exists("../fotocopy_ktp/$fotocopy_ktp")) {
	unlink("../fotocopy_ktp/$fotocopy_ktp");
}
elseif (file_exists("../npwp/$npwp")) {
	unlink("../npwp/$npwp");
}



$koneksi->query("DELETE FROM biodata_user WHERE id_pelamar='$_GET[id]'");

echo "<script> alert('Pelamar berhasil dihapus');</script>";
echo "<script>location='index.php?halaman=datapelamar';</script>";


 ?>

