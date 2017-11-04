<?php

	require('../config/config.php');

	$id_user = $_GET['id'];

	$q_user = mysql_query("DELETE FROM register_anggi WHERE id='$id_user'");
	if($q_user) {
		header('location: ../user/index.php?deleted=true');
	} else {
		header('location: ../user/index.php?deleted=false');
	}

?>