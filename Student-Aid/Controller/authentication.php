<?php 
$_SESSION['status'] = "";

if(!isset($_SESSION['auth'])){
	header("Location: login.php?loginstatus=unauthorised");
	exit(0);
}

else
{
	if($_SESSION['auth'] == "Permit"){


	}
}
?>
