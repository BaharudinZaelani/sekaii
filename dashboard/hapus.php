<?php 
require_once "../app/Magic.php";
$magic = new Magic();

if ( isset($_GET['id']) ) {
	$id = $_GET['id'];
	$cek = $magic->delete($id, 'posts');
	if ( $cek == true ) {
		echo "<script>alert('Data di hapus')</script>";
		header("Location: ../login");
	}else {
		echo "<script>alert('Data di hapus')</script>";
	}
}else {
	header("Location: ../login");
}