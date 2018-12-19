<?php 

session_start();
include 'koneksi.php';


$my_val = $_POST['my_val'];

switch ($my_val) {
	case 'soal':
		insert_jabawan($_POST);
	break;
	
	default:
		# do nothing
	break;
}


function insert_jabawan()
{
	
	//debux($_POST);die();

	$soal 	 = isset($_POST['soal']) ? $_POST['soal'] : null;
	$jawaban = isset($_POST['jawaban']) ? $_POST['jawaban'] : null;
	$jawab 	 = isset($_POST['jawab']) ? $_POST['jawab'] : null;
	$id_user = isset($_POST['id_user']) ? $_POST['id_user'] : null;

	$conn = mysqli_connect("localhost", "root", "", "mcm");
	foreach ($jawaban as $key => $value):

		$value = (isset($value)) ? $value : null;
		$jawab[$key] = (isset($jawab[$key])) ? $jawab[$key] : null;

		$skor = (substr($value,0,1) == strtolower(substr($jawab[$key],0,1))) ? "1" : "0";

		$sql = "INSERT INTO jawaban (id_soal, jawab, jawaban,skor,id_user)
			VALUES ( '$soal[$key]','$jawab[$key]','$value','$skor','$id_user')";
		mysqli_query($conn, $sql);

	endforeach;

	echo json_encode(array("status" => "1"));		

}

 ?>