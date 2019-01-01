<?php 

session_start();
include 'koneksi.php';

$my_val = $_POST['my_val'];

switch ($my_val) {
	case 'soal':
		insert_jabawan($_POST);
	break;

	case 'register_user':
		register_user($_POST,$_FILES);
	break;	
	
	default:
		# do nothing
	break;
}


function insert_jabawan($data)
{
	
	$conn 	 = koneksi();
	$soal 	 = isset($_POST['soal']) ? $_POST['soal'] : null;
	$jawaban = isset($_POST['jawaban']) ? $_POST['jawaban'] : null;
	$jawab 	 = isset($_POST['jawab']) ? $_POST['jawab'] : null;
	$id_user = isset($_POST['id_user']) ? $_POST['id_user'] : null;

	foreach ($jawaban as $key => $value):

		$value = (isset($value)) ? $value : null;
		$jawab[$key] = (isset($jawab[$key])) ? $jawab[$key] : null;

		$skor = (substr($value,0,1) == strtolower(substr($jawab[$key],0,1))) ? "1" : "0";

		$sql = "INSERT INTO jawaban (id_soal, jawab, jawaban,skor,id_user)
			VALUES ( '$soal[$key]','$jawab[$key]','$value','$skor','$id_user')";
		mysqli_query($conn, $sql);

	endforeach;

	mysqli_close($conn);

	echo json_encode(array("status" => "1"));		

}


function register_user($data,$file)
{
	$conn = koneksi();

	#declaration
	$datenow 					= date("YmdHis");
	$id_pelamar 				= "";
	$id_user    				= $_SESSION['user']['id_user'];
	$id_lowongan 				= $data['id_lowongan'];
	$nama 						= $data['nama'];
	$tanggal_lahir				= $data['tanggal_lahir'];
	$no_telp 					= $data['no_telp'];
	$alamat 					= $data['alamat'];
	$jenis_kelamin 				= $data['jenis_kelamin'];
	$status  					= $data['status'];
	$no_ktp 					= $data['no_ktp'];
	$email 						= $data['email'];
	$pendidikan 				= $data['pendidikan'];
	$perguruan_tinggi 			= $data['perguruan_tinggi'];
	$nama_perguruan_tinggi 		= $data['nama_perguruan_tinggi'];
	$ipk 						= $data['ipk'];
	$id_skype 					= $data['id_skype'];
	$pengalaman_kerja 			= $data['pengalaman_kerja'];
	$deskripsi_singkat 			= $data['deskripsi_singkat'];
	$cv 						= $datenow.'_'.$file['cv']['name'];
	$ijazah 					= $datenow.'_'.$file['ijazah']['name'];
	$sertifikat_keahlian 		= $datenow.'_'.$file['sertifikat_keahlian']['name'];
	$fotocopy_ktp 				= $datenow.'_'.$file['fotocopy_ktp']['name'];
	$npwp 						= $datenow.'_'.$file['npwp']['name'];
	$status_pelamar 			= 0;
    $file_asal = array(
	    'cv' 				  	=> basename($_FILES['cv']['name']),
	    'ijazah' 			  	=>basename($_FILES['ijazah']['name']),
	    'sertifikat_keahlian' 	=>basename($_FILES['sertifikat_keahlian']['name']),
	    'fotocopy_ktp' 			=>basename($_FILES['fotocopy_ktp']['name']),
	    'npwp' 					=>basename($_FILES['npwp']['name']),
    );

    #create dir
    $user_id 	= $_SESSION['user']['id_user'];
    $target_dir = "uploads/".$user_id;
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
        foreach ($file_asal as $key => $value) {
            mkdir($target_dir.'/'.$key, 0777, true);
        }
    }

    #do upload
    foreach ($file_asal as $key => $value) {
        if(!move_uploaded_file($_FILES[$key]["tmp_name"],$target_dir.'/'.$key.'/'.$datenow.'_'.$value)){
            die("error during uploading");
        }
    }

    #do insert biodata_user
	$sql="INSERT INTO biodata_user VALUES('$id_pelamar','$id_user','$id_lowongan','$nama','$tanggal_lahir','$no_telp','$alamat','$jenis_kelamin',
										  'status','$no_ktp','$email','$pendidikan','$perguruan_tinggi','$nama_perguruan_tinggi','$ipk','$id_skype',
										  '$pengalaman_kerja','$deskripsi_singkat','$cv','$ijazah','$sertifikat_keahlian','$fotocopy_ktp','$npwp',
										  '$status_pelamar')";
	mysqli_query($conn, $sql);
	
	#count affected rows after insert
	$result = mysqli_affected_rows($conn);
	
	#close connecton
	mysqli_close($conn);

	#return status to view
	echo ($result > 0) ? json_encode(array("status" => "1")) : json_encode(array("status" => "0"));

}

 ?>