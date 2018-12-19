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
			<th>
				Nama
			</th>
			
			<th>
				No_Telp
			</th>
			<th>
				Email
			</th>
            <th>
                Universitas
            </th>
		</tr>
	</thead>
	<tbody>
		
		<?php $ambil = $koneksi->query("SELECT * FROM biodata_user WHERE status_pelamar = 'Diterima'"); ?>
		<?php while($pecah = $ambil->fetch_assoc()) { ?>
		<tr>
			
			<td><?php echo $pecah['nama']; ?></td>
			<td><?php echo $pecah['no_telp']; ?></td>
			<td><?php echo $pecah['email']; ?></td>
			<td><?php echo $pecah['nama_perguruan_tinggi']; ?></td>
		</tr>
		
		<?php } ?>
	</tbody>
</table>

<div class="row">
 <div class="col-md-7">
  <div class="alert alert-info">
    <form method="post">
   <p>
    Note : <br>
    
        <?php $ambil=$koneksi->query("SELECT * FROM jadwal ORDER BY rand() LIMIT 1");   ?>


    
       <?php while ($pecah=$ambil->fetch_assoc()) {  

             if ($pecah['tanggal_mulai'] > DateNow() ) {
               $dis = "disabled";
            }else{
                $dis = "";
            }

        ?> 
    <input type="hidden" name="id_jadwal" value="<?=$pecah['id_jadwal']?>">    
    <strong>Bagi Nama Yang Tercantum Diatas Dapat Mengikuti  Tes Ujian Online  </strong><br>
    <strong>Yang Diadakan Pada Tanggal <?php echo $pecah['tanggal_mulai']; ?></strong><br>
    <strong>Pada Link Berikut : <button name="soal" class="btn btn-primary" <?php echo $dis; ?>> Soal </button></strong><br>
    <strong>Bagi rekan rekan yang belum lolos pada tahap seleksi kali ini, kami mengucapkan terim kasih dan semoga sukses</strong><br>

   </p>
   <?php } ?>
   </form>



  </div>
 </div>
</div>



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



<?php 

if (isset($_POST['soal'])) {

    $id_jadwal = $_POST['id_jadwal'];

    $ambil=$koneksi->query("SELECT * FROM jadwal WHERE id_jadwal = '$id_jadwal'");

    while ($pecah=$ambil->fetch_assoc()):

        if ($pecah['tanggal_akhir'] >= dateNow()):
            echo "<script>location='soal.php';</script>";
        else:
            echo "<script>alert('Mohon maaf link untuk tes belum terbuka')</script>";
            echo "<script>location='pengumuman.php';</script>";
        endif;

    endwhile;      
   
}





 ?>