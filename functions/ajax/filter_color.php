<?php 
	session_start();
	$name = $_GET['name'];
	$page = $_GET['page'];

	if (!isset($_SESSION['color'])) {
		$_SESSION['color'][] = $name;
	} else {
		if (in_array($name, $_SESSION['color'])) {
			$_SESSION['color'] = array_diff($_SESSION['color'], array($name));
		} else {
			array_push($_SESSION['color'], $name);
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