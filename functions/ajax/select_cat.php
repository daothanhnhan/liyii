<?php 
	include_once dirname(__FILE__) . "/../database.php";
	$arr = $_GET['arr'];
	$arr = explode(",", $arr);
	$cat = $_GET['cat'];

	foreach ($arr as $item) {
		$sql = "SELECT * FROM product WHERE product_id = $item";
		$result = mysqli_query($conn_vn, $sql);
		$row = mysqli_fetch_assoc($result);
		$procat_arr = $row['productcat_ar'];
		if ($procat_arr == '') {
			$sql = "UPDATE product SET productcat_ar = '$cat' WHERE product_id = $item";
			mysqli_query($conn_vn, $sql);
		} else {
			$procat_arr = explode(",", $procat_arr);
			if (!in_array($cat, $procat_arr)) {
				array_push($procat_arr, $cat);
				$procat_arr = implode(",", $procat_arr);
				
				$sql = "UPDATE product SET productcat_ar = '$procat_arr' WHERE product_id = $item";
				mysqli_query($conn_vn, $sql);
			}
		}
	}
?>