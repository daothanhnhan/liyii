<?php 
	session_start();
	$size = $_GET['size'];
	$page = $_GET['page'];

	if (empty($_SESSION['size'])) {
		$_SESSION['size'] = $size;
	} else {
		if ($_SESSION['size'] == $size) {
			$_SESSION['size'] = '';
		} else {
			$_SESSION['size'] = $size;
		}
	}

	$link = '/index.php?page='.$page;

	if (!empty($_SESSION['sort'])) {
		$link .= '&sort='.$_SESSION['sort'];
	}

	if (!empty($_SESSION['price'])) {
		$link .= '&price='.$_SESSION['price'];
	}

	if (!empty($_SESSION['size'])) {
		$link .= '&size='.$_SESSION['size'];
	}

	if (!empty($_SESSION['color'])) {
		foreach ($_SESSION['color'] as $item) {
			$link .= '&color[]='.$item;
		}
	}

	echo $link;
?>