<?php

	session_start();

	require('../model/User.php');

	$_SESSION['profileInfo'] = viewprofile($_SESSION['username'], $_SESSION['password']);

	if(isset($_SESSION['profileInfo'])){
		header("Location: ../view/editProfile.php");
	}

?>