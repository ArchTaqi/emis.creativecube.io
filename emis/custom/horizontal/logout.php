<?php
	unset($_COOKIE['isLogin']);
	setcookie('isLogin', '', time() - 3600);
	header("Location: index.php");
?>