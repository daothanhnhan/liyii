<?php 
	session_start();
	$product_id = $_GET['id'];

	if (!isset($_SESSION['favorite'])) {
		$_SESSION['favorite'] = array();
		$_SESSION['favorite'][] = $product_id;
	} else {
		if (empty($_SESSION['favorite'])) {
			$_SESSION['favorite'][] = $product_id;
		} else {
			if (!in_array($product_id, $_SESSION['favorite'])) {
				$_SESSION['favorite'][] = $product_id;
			}
		}
	}
?>