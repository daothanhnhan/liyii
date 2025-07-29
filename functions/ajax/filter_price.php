<?php 
	session_start();
	$money = $_GET['money'];
	$page = $_GET['page'];

	if (!isset($_SESSION['price'])) {
		$_SESSION['price'] = $money;
	} else {
		if (empty($_SESSION['price'])) {
			$_SESSION['price'] = $money;
		} else {
			if ($_SESSION['price'] == $money) {
				$_SESSION['price'] = '';
			} else {
				$_SESSION['price'] = $money;
			}
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