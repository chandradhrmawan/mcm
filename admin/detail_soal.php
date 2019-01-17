<?php
	$sql_lowongan = mysqli_query($conn,"SELECT * FROM lowongan WHERE id_lowongan = '$_GET[id_lowongan]'");
	$data 	  	  = $sql_lowongan->fetch_assoc();

	$sql_soal	  = mysqli_query($conn,"SELECT * FROM soal WHERE id_lowongan = '$data[id_lowongan]'");
	
	$list_jawaban = array('a','b','c','d','e');
?>
<style type="text/css">
	.form-control{
		border-radius: 0 !important;
	}
</style>
<div class="row">
 	<div class="col-md-12">
 		<h2>Soal <?=ucfirst(strtolower($data['nama_divisi']))?></h2>
 	<div class="btn-group">
      <button type="button" onclick="add_row()" id="" class="btn sbold green" style="background-color: skyblue; color: black; margin-bottom: 15px !important; border-radius: 0 !important;"> <i class="fa fa-file"></i> Tambah Soal
      </button>
    </div>
    <br/>
    <form id="form">
    <input type="hidden" name="my_val" value="edit_soal">
    <input type="hidden" name="id_lowongan" value="<?=$data['id_lowongan']?>">
	<table class="table table-striped table-hover table-bordered table-sm" id="table1">
		<thead>
         	<th>No</th>
			<!-- <th>Kode Soal</th> -->
			<th>Soal</th>
			<th>A</th>
			<th>B</th>
			<th>C</th>
			<th>D</th>
			<th>E</th>
			<th>Jawaban</th>
			<th>Aksi</th>
          </thead>
          <tbody>
          <?php $no=1; while ($dtl = $sql_soal->fetch_assoc()): ?>
          	<tr id='myTableRow<?=$no?>'>
            <td class="increment"><?=$no?></td>
            	<!-- <td><input readonly type="text" name="kode_soal[]" class="form-control" value="<?=$dtl['kode_soal']?>"></td> -->
            	<td><textarea name="soal[<?=$dtl['id']?>]" class="form-control" cols="25" rows="4"><?=$dtl['nama_soal']?></textarea></td>
            	<td><input type="text" name="a[<?=$dtl['id']?>]" class="form-control" value="<?=$dtl['a']?>"></td>
            	<td><input type="text" name="b[<?=$dtl['id']?>]" class="form-control" value="<?=$dtl['b']?>"></td>
            	<td><input type="text" name="c[<?=$dtl['id']?>]" class="form-control" value="<?=$dtl['c']?>"></td>
            	<td><input type="text" name="d[<?=$dtl['id']?>]" class="form-control" value="<?=$dtl['d']?>"></td>
            	<td><input type="text" name="e[<?=$dtl['id']?>]" class="form-control" value="<?=$dtl['e']?>"></td>
            	<td>
            		<select name="jawaban[<?=$dtl['id']?>]" class="form-control">
            			<?php foreach($list_jawaban as $val): ?>
            				<option value="<?=$val?>" <?=($val==$dtl['jawaban']) ? 'selected' : ''?>>
            					<?=strtoupper($val)?>
            				</option>
            			<?php endforeach; ?>
            		</select>
            	</td>
            <td><button type='button' onclick='remove_row(<?=$no?>)' class='btn btn-danger'><i class='fa fa-trash'></i></button></td>
          </tr>
          <?php $no+=1; endwhile; ?>
          

          </tbody>
	</table>
	</form>

	<div class="btn-group">
      <button type="button" onclick="confirm()" id="" class="btn btn-primary" style="margin-bottom: 15px !important; border-radius: 0 !important;"> <i class="fa fa-floppy-o"></i> UPDATE
      </button>
    </div>

	</div>
</div>


<script src="https://code.jquery.com/jquery-1.4.2.min.js"></script>


<script type="text/javascript">

	$(document).ready(function() {

	 $(".date_picker").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy',  
     });

	});

	function generate_kode_soal()
	{
		var id_divisi = "<?=$data['id_lowongan']?>";
		$.ajax({
	        url : "<?php echo '../proses.php' ?>",
	        type: "POST",
	        data: {"id_divisi":id_divisi,"my_val":"kode_soal"},
        success: function(response)
        {
          if(response!=""){
                swal("Pesan, Generate Kode Soal Berhasil", {
                    icon: "success",
                });
                console.log(response);
                return response;
            }else{
                swal("Pesan,Generate Kode Soal Gagal", {
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
	 
	function add_row()
	{

     var $this = $("table#table1 tbody tr");
     var $current_num = $this.find("td:first").length;
     var $incremented =parseInt($("#table1").find('td.increment').last().html())+1;

     $incremented = (isNaN($incremented)) ? 1 : $incremented;

      $('#table1').append("<tr id='myTableRow"+$incremented+"'>"+''
      +"<td class='increment'>"+$incremented+"</td> "+'' 
      // +"<td><input type='text' value='"+kode_soal+"' name='kode_soal[]' class='form-control'></td> "+''
      +"<td><textarea name='soal_new[]' class='form-control' cols='25' rows='4'></textarea></td> "+''
      +"<td><input type='text' name='a_new[]' class='form-control'></td> "+''
      +"<td><input type='text' name='b_new[]' class='form-control'></td> "+''
      +"<td><input type='text' name='c_new[]' class='form-control'></td> "+''
      +"<td><input type='text' name='d_new[]' class='form-control'></td> "+''
      +"<td><input type='text' name='e_new[]' class='form-control'></td> "+''
      +"<td><select name='jawaban_new[]' class='form-control'>  "+''
      +"<option value='a'>A</option> "+''
      +"<option value='b'>B</option> "+''
      +"<option value='c'>C</option> "+''
      +"<option value='d'>D</option> "+''
      +"<option value='e'>E</option> "+''
      +"</select> </td>"+''
      +"<td><button type='button' onclick='remove_row("+$incremented+")' class='btn btn-danger'><i class='fa fa-trash'></i></button></td>"+''
      +"</tr>");

    }

    function remove_row(i)
    {
      $('#myTableRow'+i).remove();
    }

    function confirm()
    {
        swal({
          title: "Pesan",
          text: "Apakah Anda Yakin Ingin Update Data Ini ?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((success) => {
          if (success) {
                simpan();
          } else {
                swal("Data Anda Batal Di Simpan", {
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
                swal("Pesan, Input Data Berhasil", {
                    icon: "success",
                });
                //window.location.replace('index.php');
            }else{
                swal("Pesan,Input Data Gagal", {
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