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
		</tr>
	</thead>
	<tbody>
		
		<?php $ambil = $koneksi->query("SELECT * FROM biodata_user WHERE status_pelamar = 'Diterima'"); ?>
		<?php while($pecah = $ambil->fetch_assoc()) { ?>
		<tr>
			
			<td><?php echo $pecah['nama']; ?></td>
			<td><?php echo $pecah['no_telp']; ?></td>
			<td><?php echo $pecah['email']; ?></td>
			
		</tr>
		
		<?php } ?>
	</tbody>
</table>

<div class="row">
 <div class="col-md-7">
  <div class="alert alert-info">
   <p>
    Note : <br>
    
    <strong>Bagi Nama Yang Tercantum Diatas Dapat Mengikuti  Tes Ujian Online  </strong><br>
    <strong>Yang Diadakan Pada Tanggal 15-Desember-2018 Jam 10.00 WIB</strong><br>
    <strong>Pada Link Berikut : <a href="soal.php" class="btn btn-primary">Tes Soal</a></strong>
   </p>
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