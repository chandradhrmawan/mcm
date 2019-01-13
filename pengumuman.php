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

<!-- <?php //echo date('d-m-Y'); ?>
<p>Untuk Input Ke Db</p>
<?php  //echo dateNow(); ?> -->
<!-- konten -->
<section id="home" class="home">


<div class="container">

<h2>Pengumuman Lulus Berkas</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>No_Telp</th>
            <th>Email</th>
            <th>Universitas</th>
            <th>Nama divisi</th>
            <th>Status</th>
            <th>Jadwal Interview</th>
        </tr>
    </thead>
    <tbody>
      <?php   $id_user = $_SESSION["user"]["id_user"]; ?>
        
        <?php $ambil = $koneksi->query("SELECT *,
                        IF(status_pelamar=1, 'DITERIMA', 
                        IF(status_pelamar=2, 'DITOLAK', 
                        'MENUNGGU HASIL')) AS status 
                        FROM biodata_user
                        LEFT JOIN lowongan ON biodata_user.id_lowongan=lowongan.id_lowongan
                        WHERE id_user='$id_user'"); ?>

        <?php while($pecah = $ambil->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $pecah['id_lowongan']; ?></td>
            <td><?php echo $pecah['nama']; ?></td>
            <td><?php echo $pecah['no_telp']; ?></td>
            <td><?php echo $pecah['email']; ?></td>
            <td><?php echo $pecah['nama_perguruan_tinggi']; ?></td>
            <td><?php echo $pecah['nama_divisi']; ?></td>
            <td><?php echo $pecah['status']; ?></td>
        </tr>
        
        
    </tbody>
</table>


<?php if ($pecah['status_pelamar']== 1) : ?>
            <div class="row">
         <div class="col-md-7">
          <div class="alert alert-info">
        
           <p>
            Note : <br>
        <!-- Tapi di query ini harus di kasih paramerter  -->
      
      <?php   $idlowonganfix = $pecah['id_lowongan'];  ?>

                <?php $ambil=$koneksi->query("SELECT * FROM jadwal WHERE id_lowongan='$idlowonganfix'");   ?>
                <?php while ($pecah=$ambil->fetch_assoc()) {  ?> 
       <!-- ini jdnya bukan jadwal tapi lowongan  -->
       <!-- abis dari ini langsung ke soal sesuai lowongan nya  -->
      
            <strong>Bagi Nama Yang Tercantum Diatas Dapat Mengikuti  Tes Ujian Online  </strong><br>
            <strong>Yang Diadakan Pada Tanggal <?php echo $pecah['tanggal_mulai']; ?></strong><br>
            <strong>Dan Berakhir Pada Tanggal <?php echo $pecah['tanggal_akhir']; ?></strong><br>
            
            <?php if ($pecah['tanggal_mulai'] < dateNow() AND $pecah['tanggal_akhir'] > dateNow()): ?>
                
            <strong>Pada Link Berikut :  <a href="soal.php?id=<?php echo $pecah['id_lowongan']; ?>"  class="btn btn-primary">  Soal </a></strong><br>

            <?php else : ?>

                    <strong>Maaf link soal tidak bisa diakses </strong> <a href="#" class="btn btn-primary">Soal</a>
            
            <?php endif ?>

           </p>
           <?php } ?>
       



          </div>
         </div>
        </div>

<?php else: ?>
<?php echo "Maaf anda belum lolos pada tahap seleksi kali ini, kami mengucapkan terim kasih dan semoga sukses" ?>
<?php endif ?>



<?php } ?>



    </div>

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



