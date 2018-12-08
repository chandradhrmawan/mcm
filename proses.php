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
	
	$soal = $_POST['soal'];
	$jawaban = $_POST['jawaban'];
	$jawab = $_POST['jawab'];
	$id_user = $_POST['id_user'];

	$conn = mysqli_connect("localhost", "root", "", "mcm");
	foreach ($jawaban as $key => $value):

		$value = (isset($value)) ? $value : null;
		$jawab[$key] = (isset($jawab[$key])) ? $jawab[$key] : null;

		$skor = ($value == $jawab[$key]) ? "1" : "0";

		$sql = "INSERT INTO jawaban (id_soal, jawab, jawaban,skor,id_user)
			VALUES ( '$soal[$key]','$jawab[$key]','$value','$skor','$id_user')";
		mysqli_query($conn, $sql);

	endforeach;

	echo json_encode(array("status" => "1"));		

}

 ?>