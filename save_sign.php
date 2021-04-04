<?php 
require_once('connection.php');

session_start();
$id = $_SESSION ['value'];
$doc_id = $_SESSION['doctor_id'];

	$result = array();
	$imagedata = base64_decode($_POST['img_data']);
	$filename = md5(date("dmYhisA"));
	//Location to where you want to created sign image
	$file_name = './doc_signs/'.$filename.'.png';
	file_put_contents($file_name,$imagedata);
	$result['status'] = 1;
	$result['file_name'] = $file_name;
	echo json_encode($result);

	$_SESSION ['data'] = $imgs;


?>

