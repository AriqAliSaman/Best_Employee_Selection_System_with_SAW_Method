<?php
	include 'db/db_config.php';
    $id = $_GET['id'];
    
	if($db->delete('sub_kriteria')->where('id_subkriteria='.$id)->count() == 1){
		header('location:data_subkriteria.php?success_delete=1');
	} else {
		header('location:data_subkriteria.php?success_delete=0');
	}
?>