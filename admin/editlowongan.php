<h2>Edit Lowongan</h2>

<?php 
$query 	= $koneksi->query("SELECT * FROM lowongan WHERE id_lowongan='$_GET[id]'");
$data 	= $query->fetch_assoc();

$detail = $koneksi->query("SELECT * FROM persyaratan WHERE kode_lowongan='$data[kode_lowongan]'");


?>

 <form method="post" id="form" enctype="multipart/form-data">
	<input type="hidden" name="my_val" value="edit_lowongan">
	<div class="form-group">
		<label>Kode Lowongan</label>
		<input type="text" name="kode_lowongan" value="<?=$data['kode_lowongan']?>" readonly class="form-control">
	</div>
	<div class="form-group">
		<label>Nama Divisi</label>
		<input type="text" name="nama_divisi" class="form-control" value="<?=$data['nama_divisi']?>">
	</div>
	<div class="form-group">
		<label>Tanggal Mulai</label>
		<input type="text" name="tanggal_mulai" class="date_picker form-control" value="<?=date('d-m-Y',strtotime($data['tanggal_mulai']))?>">
	</div>
	<div class="form-group">
		<label>Tanggal Selesai</label>
		<input type="text" name="tanggal_selesai" class="date_picker form-control" value="<?=date('d-m-Y',strtotime($data['tanggal_selesai']))?>">
	</div>

	<div class="btn-group">
      <button type="button" onclick="add_row()" id="" class="btn sbold green" style="background-color: skyblue; color: black; margin-bottom: 15px !important; border-radius: 0 !important;"> <i class="fa fa-file"></i> Tambah Persyaratan
      </button>
    </div>
    <br/>
	<table class="table table-striped table-hover table-bordered table-sm" id="table1">
		<thead>
          <tr>
            <th>No</th>
            <th>Nama Persyaratan</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
          
          <?php $no=1; while($dtl = $detail->fetch_assoc()): ?>
          <tr id='myTableRow<?=$no?>'>
            <td class="increment"><?=$no?></td>
            	<td><input type="text" name="nama_persyaratan[<?=$dtl['id_persyaratan']?>]" class="form-control" value="<?=$dtl['nama_persyaratan']?>"></td>
            <td><button type='button' onclick='remove_row(<?=$no?>)' class='btn btn-danger'><i class='fa fa-trash'></i></button></td>
          </tr>
      	  <?php $no+=1; endwhile; ?>

          </tbody>
	</table>

	
	<button type="button" onclick="confirm()" class="btn btn-primary" style="background-color: skyblue; color: black; margin-bottom: 15px !important; border-radius: 0 !important;"><i class="fa fa-floppy-o"></i> Update</button>
</form>


<script src="https://code.jquery.com/jquery-1.4.2.min.js"></script>


<script type="text/javascript">

	$(document).ready(function() {

	 $(".date_picker").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy',  
     });

	});
	 
	function add_row()
	{
    var $this = $("table#table1 tbody tr");
    var $current_num = $this.find("td:first").length;
    var $incremented =parseInt($("#table1").find('td.increment').last().html())+1;

      $('#table1').append("<tr id='myTableRow"+$incremented+"'><td class='increment'>"+$incremented+"</td> <td><input type='text' placeholder='' name='nama_persyaratan_new[]' class='form-control'></td><td><button type='button' onclick='remove_row("+$incremented+")' class='btn btn-danger'><i class='fa fa-trash'></i></button></td></tr>");

    }

    function remove_row(i)
    {
      $('#myTableRow'+i).remove();
    }

    function confirm()
    {
        swal({
          title: "Pesan",
          text: "Apakah Anda Yakin Ingin Edit Data Ini ?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((success) => {
          if (success) {
                simpan();
          } else {
                swal("Data Anda Batal Di Edit", {
                    icon: "error",
                });
          }
        });
    }

    function simpan()
    {
      var form = $("#form");
      var formData = new FormData(form[0]);

      $.ajax({
        url : "<?php echo '../proses.php' ?>",
        type: "POST",
        data: formData,
        dataType: "JSON",
        processData: false,
        contentType: false,
        cache: false,
        success: function(data)
        {
          if(data.status=="1"){
                swal("Pesan, Edit Data Berhasil", {
                    icon: "success",
                });
                window.location.replace('index.php');
            }else{
                swal("Pesan,Edit Data Gagal", {
                    icon: "error",
                });     
            }
         },
         error: function (jqXHR, textStatus, errorThrown)
         {
            swal("Error adding / update data", {
                icon: "error",
            });
         }
      });
    }

</script>




















 <?php 

if (isset($_POST['ubah'])) {
	//jika lowongan dirubah
	
		$koneksi->query("UPDATE lowongan SET nama_divisi='$_POST[nama_divisi]', tanggal_mulai='$_POST[tanggal_mulai]', persyaratan='$_POST[persyaratan]' WHERE id_lowongan='$_GET[id]'");

	echo "<script> alert('Data Berhasil Diubah'); </script>";
	echo "<script> location='index.php?halaman=lowongan';</script>";
}

  ?>