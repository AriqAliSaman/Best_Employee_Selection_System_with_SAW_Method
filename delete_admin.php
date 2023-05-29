<?php
	include 'db/db_config.php';
	
		$id = $_GET['id'];
		// $sql = "DELETE FROM karyawan WHERE id = $id";
		if($db->delete('admin')->where('id='.$id)->count() == 1){
		// if($db->query($sql)===TRUE){
			header('location:data_admin.php?success_delete=1');
		} else {
			header('location:data_admin.php?success_delete=0');
		}
	
?>