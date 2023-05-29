<?php
	include 'db/db_config.php';
	extract($_POST);
	if($db->insert('karyawan',"'','$nik','$nama','$jeniskelamin','$alamat','$telepon','$ttl','$tempatlahir','$pendidikan',
	'$jabatan','$ttb','$skill','$pengalaman'")->count()){
		header('location:data_karyawan.php?success_create=1');
	} else {
		header('location:data_karyawan.php?success_create=0');
	}
			
	// $target_dir = "assets/foto_calon_karyawan/";
	// $file_name = $_FILES['foto']['name'];
	// $target_file = $target_dir.basename($_FILES['foto']['name']);
	// $file_type = $_FILES['foto']['type'];
	// if(empty($file_type)){
	// 	if($file_type=='jpg' || $file_type=='gif' || $file_type=='jpeg'){
	// 		$file_type = 'image/'.$file_type;
	// 	} else {
	// 		header('location:input_karyawan.php?error_msg=error_type');
	// 	}
	// }
	
	// if($error > 0){
			//move_uploaded_file($_FILES['foto']['tmp_name'], $target_file);
			// move_uploaded_file($_FILES["foto"]["tmp_name"],$target_dir. $_FILES["foto"]["name"]);
			
		//} else {
		//	header('location:input_karyawan.php?error_msg=error_upload');
		//} 
	// } else {
	// 	header('location:input_karyawan.php?error_msg=error_ukuran');
	// } 
