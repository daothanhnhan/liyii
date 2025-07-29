<?php 
	include_once dirname(__FILE__) . "/../database.php";
	$arr = $_GET['arr'];
	$arr = explode(",", $arr);
	$type = $_GET['type'];

	if ($type == 1) {
		foreach ($arr as $item) {
			$sql = "UPDATE product SET state = 0 WHERE product_id = ".$item;
			$result = mysqli_query($conn_vn, $sql);
		}
	}

	if ($type == 2) {
		foreach ($arr as $item) {
			$sql = "UPDATE product SET state = 1 WHERE product_id = ".$item;
			$result = mysqli_query($conn_vn, $sql);
		}
	}
?>