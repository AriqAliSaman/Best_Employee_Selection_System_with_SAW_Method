<?php
	include 'db/db_config.php';
	$id = $_GET['id'];
	if($db->delete('hasil_tpa')->where('id_calon_kr='.$id)->count() == 1){
		header('location:data_penilaian.php');
	} else {
		header('location:data_penilaian.php?error_msg=error_delete');
	}
?>