<?php 
	session_start();
	foreach ($_SESSION['favorite'] as $k => $v) {
		if ($v == $_GET['id']) {
			unset($_SESSION['favorite'][$k]);
		}
	}
?>