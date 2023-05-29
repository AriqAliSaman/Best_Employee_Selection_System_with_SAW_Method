<?php
	include 'db/db_config.php';
    extract($_POST);
    
    //echo $id;

	if($db->update('admin',"nama='$nama',alamat='$alamat',telepon='$telepon',email='$email'")->where("id='$id'")->count()==1){
		header('location:data_admin.php?success_edit=1');
	} else {
		//echo "update gagal";
		header('location:data_admin.php?success_edit=0');
	}
?>