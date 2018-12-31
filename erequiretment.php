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
     <?php $id_lowongan = $_GET['id']; ?>
    <?php $ambil = $koneksi->query("SELECT * FROM lowongan WHERE id_lowongan='$id_lowongan'"); ?>
        <?php while($pecah = $ambil->fetch_assoc()) { ?>
    <h2>Divisi : <?php echo $pecah['nama_divisi']; ?></h2>
   
      
            <h3>BIODATA USER </h3>
            
            <?php } ?>
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
    <textarea name="alamat" rows="5" cols="60" class="form-control" required="" ></textarea> 
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
         
          <input type="text" placeholder="Program Studi" name="pendidikan" class="form-control" required=""> 
    </div>
    
    <div class="form-group">
    <label> Perguruan Tinggi </label>
    <input type="radio" name="perguruan_tinggi" value="ptn" required="">PTN
        <input type="radio" name="perguruan_tinggi" value="pts" >PTS
    (Terakreditasi)
    </div>


    <div class="form-group">
    <label> Nama Perguruan Tinggi </label>
    <input type="text" name="nama_perguruan_tinggi" class="form-control" required="">   
    </div>
    
    
    <div class="form-group">
    <label> IPK </label>
    <input type="text" maxlength="4" name="ipk" value="0,00" class="form-control" required="" >
    </div>
    
    <div class="form-group">
    <label> ID-Skype </label>
    <input type="text" name="id_skype" required="">
    </div>

    <div class="form-group">
    <label>Pengalaman Kerja (Tahun) </label>
    <input type="number" name="pengalaman_kerja" value="0" min="1" class="form-control" required="">       
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
    function format($file){
        return pathinfo($file, PATHINFO_EXTENSION);
    }

    //File Name
    $cv                  = date("YmdHis").$_FILES['cv']['name'];                       // DOC/PDF
    $ijazah              = date("YmdHis").$_FILES['ijazah']['name'];                   // PDF/JPG
    $sertifikat_keahlian = date("YmdHis").$_FILES['sertifikat_keahlian']['name'];      // PDF/JPG
    $fotocopy_ktp        = date("YmdHis").$_FILES['fotocopy_ktp']['name'];             // PDF/JPG
    $npwp                = date("YmdHis").$_FILES['npwp']['name'];                     // PDF/Jpg

    // Format File
    $format_cv                  = format($cv);
    $format_ijazah              = format($ijazah);
    $format_sertifikat_keahlian = format($sertifikat_keahlian);
    $format_fotocopy_ktp        = format($fotocopy_ktp);
    $format_npwp                = format($npwp);
    
   //Size File 
    $size_cv = $_FILES['cv']['size'];
    $size_ijazah = $_FILES['ijazah']['size'];
    $size_sertifikat_keahlian = $_FILES['sertifikat_keahlian']['size'];
    $size_fotocopy_ktp = $_FILES['fotocopy_ktp']['size'];
    $size_npwp = $_FILES['npwp']['size'];
    
    // File Asal
    $file_asal = array(
                $_FILES['cv']['tmp_name'],
                $_FILES['ijazah']['tmp_name'],
                $_FILES['sertifikat_keahlian']['tmp_name'],
                $_FILES['fotocopy_ktp']['tmp_name'],
                $_FILES['npwp']['tmp_name'],

    );

    if (empty($format_cv) || empty($format_ijazah) || empty($format_sertifikat_keahlian) ||  empty($format_fotocopy_ktp) ||  empty($format_npwp)  ) {
        echo "File Masih Ada yg Belum Terupload";
    }else{
        // Seleksi Size
        if ($size_cv <= 3000000 ) {
            echo "File Cv Anda Tidak Sesuai Ukuran";
        }
        if ($size_ijazah <= 3000000 ) {
            echo "File Ijazah Anda Tidak Sesuai Ukuran";
        }
        if ($size_sertifikat_keahlian <= 3000000 ) {
            echo "File Sertifikat Keahlian Anda Tidak Sesuai Ukuran";
        }
        if ($size_fotocopy_ktp <= 2000000 ) {
            echo "File Foto Copy KTP Anda Tidak Sesuai Ukuran";
        }
        if ($size_npwp <= 3000000 ) {
            echo "File NPWP Anda Tidak Sesuai Ukuran";
        }


        // Seleksi Format File
        if (($format_cv != "docx") or ($format_cv != "pdf")) {
            echo "Format File Cv anda Salah , DOCX/PDF";
        }
         if (($format_ijazah != "pdf") or ($format_ijazah != "jpg")) {
            echo "Format File Ijazah anda Salah , PDF/JPG";
        }
         if (($format_sertifikat_keahlian != "pdf") or ($format_sertifikat_keahlian != "jpg")) {
            echo "Format File Sertifikat Keahlian anda Salah , PDF/JPG";
        }
         if (($format_fotocopy_ktp != "pdf") or ($format_fotocopy_ktp != "jpg")) {
            echo "Format File Foto Copy KTP anda Salah , PDF/JPG";
        }
         if (($format_npwp != "pdf") or ($format_npwp != "jpg")) {
            echo "Format File NPWP anda Salah , PDF/JPG";
        }
        

        $file_tujuan = "cv/".$namacvfix;
            $jum = count($file_asal);

            for ($i=0; $i < $jum ; $i++) { 
                $upload = move_uploaded_file($file_asal[$i], $file_tujuan);
            }

            //simpan ke db biodata_user
              $koneksi->query("INSERT INTO biodata_user(id_user,id_lowongan,nama,tanggal_lahir,no_telp,alamat,jenis_kelamin,status,no_ktp,email,pendidikan,perguruan_tinggi,nama_perguruan_tinggi,ipk,id_skype,pengalaman_kerja,deskripsi_singkat,cv,ijazah,sertifikat_keahlian,fotocopy_ktp,npwp,status_pelamar ) VALUES ('$id_user','$id_lowongan','$nama','$tanggal_lahir','$no_telp','$alamat','$jenis_kelamin','$status','$no_ktp','$email','$pendidikan','$perguruan_tinggi','$nama_perguruan_tinggi','$ipk','$id_skype','$pengalaman_kerja','$deskripsi_singkat','$namacvfix','$namaijazahfix','$namasertifikatkeahlianfix','$namafotocopyktpfix','$namanpwpfix'");

            echo "Upload berhasil";
            echo "<script>alert('Terimakasih, Dokument Anda Sudah Diteruskan Ke Admin');</script>";
            echo "<script>location='index.php';</script>";
    }

    //upload dulu foto dokument
    
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