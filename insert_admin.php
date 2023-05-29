<?php
	include 'db/db_config.php';
	extract($_POST);
	$newpassword = md5($password);
	if($db->insert('admin',"'','$nama','$alamat','$telepon','$email','$username','$newpassword'")->count() == 1){
		header('location:data_admin.php?success_create=1');
	} else {
		header('location:data_admin.php?success_create=0');
	}
?>