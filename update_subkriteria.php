<?php
	include 'db/db_config.php';
    extract($_POST);
	if($db->update('sub_kriteria',"subkriteria='$subkriteria',id_kriteria='$id_kriteria',nilai='$nilai'")->where("id_subkriteria='$id'")->count()==1){
		header('location:data_subkriteria.php?success_edit=1');
	} else {
		header('location:data_subkriteria.php?success_edit=0');
	}
?>