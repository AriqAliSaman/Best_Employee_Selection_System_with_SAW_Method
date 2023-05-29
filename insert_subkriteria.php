<?php
	include 'db/db_config.php';
	extract($_POST);
	if($db->insert('sub_kriteria',"'','$id_kriteria','$subkriteria','$nilai'")->count() == 1){
		header('location:data_subkriteria.php?success_create=1');
	} else {
		header('location:data_subkriteria.php?success_create=0');
	}
?>