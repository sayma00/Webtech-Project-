<?php
	session_start();
	require('../model/User.php');

	$_SESSION['sectionInfo'] = getSections();

	if(isset($_SESSION['sectionInfo'])){
		header("Location: ../view/sectionView.php");
	}
?>