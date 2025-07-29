<?php 
	$id = $_GET['id'];
	$sql = "DELETE FROM mau_sac WHERE id = $id";
	$result = mysqli_query($conn_vn, $sql);
	header('location: index.php?page=mau-sac');
?>