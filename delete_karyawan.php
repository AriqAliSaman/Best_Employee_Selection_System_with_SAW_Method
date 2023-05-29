<?php
	include 'db/db_config.php';
	$id = $_GET['id'];
	if($db->delete('karyawan')->where('id_calon_kr='.$id)->count() == 1){
		header('location:data_karyawan.php?success_delete=1');
	} else {
		header('location:data_karyawan.php?success_delete=0');
	}
?>