<?php 

session_start();

include 'koneksi.php';


//jika tidak session pelanggan (belum login)
if (!isset($_SESSION["user"])) {
	 echo "<script>alert('Silahkan login terlebih dahulu');</script>";
        echo "<script>location='login.php';</script>";
}

 ?>




<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>PT. MARATAMA CIPTA MANDIRI</title>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- Custom Fonts -->
        <link rel="stylesheet" href="custom-font/fonts.css" />
        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="css/font-awesome.min.css" />
        <!-- Bootsnav -->
        <link rel="stylesheet" href="css/bootsnav.css">
        <!-- Fancybox -->
        <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css?v=2.1.5" media="screen" />	
        <!-- Custom stylesheet -->
        <link rel="stylesheet" href="css/custom.css" />
        <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
  	</head>


<body>

<?php include 'navbar.php'; ?>


<!-- konten -->

<section id="home" class="home">


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
            <option value="D3">D3</option>
            <option value="S1">S1</option>
            <option value="S2">S2</option>
         </select>
         <!--  <input type="text" name="pendidikan" class="form-control">  -->
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
    <input type="number" name="ipk" value="0" step="0,1" class="form-control" required="">
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
    <label>CV</label>
    <input type="file" name="cv" required="">
    <p class="text-danger">*File upload mohon dalam bentuk (Doc/Pdf), maksimal file 3 Mb</p>
    </div>

    <div class="form-group">
    <label>Ijazah</label>
    <input type="file" name="ijazah" required="">
    <p class="text-danger">*File upload mohon dalam bentuk (Pdf/Jpg), maksimal file 3 Mb</p>
    </div>

    <div class="form-group">
    <label>Sertifikat Keahlian</label>
    <input type="file" name="sertifikat_keahlian" required="">
    <p class="text-danger">*File upload mohon dalam bentuk (Pdf/Jpg), maksimal file 3 Mb</p>
    </div>

    <div class="form-group">
    <label>Foto Copy Ktp</label>
    <input type="file" name="fotocopy_ktp" required="">
    <p class="text-danger">*File upload mohon dalam bentuk (Pdf/Jpg), maksimal file 2 Mb</p>
    </div>

    <div class="form-group">
    <label>NPWP</label>
    <input type="file" name="npwp" required="">
    <p class="text-danger">*File upload mohon dalam bentuk (Pdf/Jpg), maksimal file 3 Mb</p>
    </div>

    

        <button name="simpan" class="btn btn-primary">Simpan</button>
    
</form>
</div>
<?php 

if (isset($_POST["simpan"])){
    //upload dulu foto dokument
    $namacv =$_FILES["cv"]["name"];
    $lokasicv =$_FILES["cv"]["tmp_name"];
    $namacvfix =date("YmdHis").$namacv;
    move_uploaded_file($lokasicv, "cv/$namacvfix");

 //upload dulu foto dokument
    $namaijazah =$_FILES["ijazah"]["name"];
    $lokasiijazah =$_FILES["ijazah"]["tmp_name"];
    $namaijazahfix =date("YmdHis").$namaijazah;
    move_uploaded_file($lokasiijazah, "ijazah/$namaijazahfix");

     //upload dulu foto dokument
    $namasertifikatkeahlian =$_FILES["sertifikat_keahlian"]["name"];
    $lokasisertifikatkeahlian =$_FILES["sertifikat_keahlian"]["tmp_name"];
    $namasertifikatkeahlianfix =date("YmdHis").$namasertifikatkeahlian;
    move_uploaded_file($lokasisertifikatkeahlian, "sertifikat_keahlian/$namasertifikatkeahlianfix");

     //upload dulu foto dokument
    $namafotocopyktp =$_FILES["fotocopy_ktp"]["name"];
    $lokasifotocopyktp =$_FILES["fotocopy_ktp"]["tmp_name"];
    $namafotocopyktpfix =date("YmdHis").$namafotocopyktp;
    move_uploaded_file($lokasifotocopyktp, "fotocopy_ktp/$namafotocopyktpfix");

     //upload dulu foto dokument
    $namanpwp =$_FILES["npwp"]["name"];
    $lokasinpwp =$_FILES["npwp"]["tmp_name"];
    $namanpwpfix =date("YmdHis").$namanpwp;
    move_uploaded_file($lokasinpwp, "npwp/$namanpwpfix");

    //  //upload dulu foto dokument
    // $namadokument =$_FILES["dokument"]["name"];
    // $lokasidokument =$_FILES["dokument"]["tmp_name"];
    // $namafix =date("YmdHis").$namadokument;
    // move_uploaded_file($lokasidokument, "dokument/$namafix");


   
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
    $koneksi->query("INSERT INTO biodata_user(nama,tanggal_lahir,no_telp,alamat,jenis_kelamin,status,no_ktp,email,pendidikan,perguruan_tinggi,nama_perguruan_tinggi,ipk,id_skype,pengalaman_kerja,deskripsi_singkat,cv,ijazah,sertifikat_keahlian,fotocopy_ktp,npwp) VALUES ('$nama','$tanggal_lahir','$no_telp','$alamat','$jenis_kelamin','$status','$no_ktp','$email','$pendidikan','$perguruan_tinggi','$nama_perguruan_tinggi','$ipk','$id_skype','$pengalaman_kerja','$deskripsi_singkat','$namacvfix','$namaijazahfix','$namasertifikatkeahlianfix','$namafotocopyktpfix','$namanpwpfix')");

    echo "<script>alert('Terimakasih, Dokument Anda Sudah Diteruskan Ke Admin');</script>";
    echo "<script>location='index.php';</script>";

}
else{
 echo "<script>alert('Dokument Anda Gagal Coba Lagi');</script>";
}

 ?>



</section>

















<?php include 'footer.php'; ?>



   <!-- JavaScript -->
        <script src="js/jquery-1.12.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <!-- Bootsnav js -->
        <script src="js/bootsnav.js"></script>

        <!-- JS Implementing Plugins -->
        <script src="js/isotope.js"></script>
        <script src="js/isotope-active.js"></script>
        <script src="js/jquery.fancybox.js?v=2.1.5"></script>

        <script src="js/jquery.scrollUp.min.js"></script>

        <script src="js/main.js"></script>
    </body>	
</html>	