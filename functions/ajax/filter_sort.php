<?php 
	session_start();
	$sort = $_GET['sort'];
	$page = $_GET['page'];

	if (empty($_SESSION['sort'])) {
		$_SESSION['sort'] = $sort;
	} else {
		if ($_SESSION['sort'] == $sort) {
			$_SESSION['sort'] = '';
		} else {
			$_SESSION['sort'] = $sort;
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