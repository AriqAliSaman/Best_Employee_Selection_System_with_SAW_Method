<?php
	include 'db/db_config.php';
	extract($_POST);		
		// if ($error > 0)
		// {
		// 	$db->update('karyawan',"nama='$nama',ttl='$ttl',skill='$skill',pengalaman='$pengalaman',TempatLahir='$tempatlahir',PendidikanTerakhir='$pendidikan',
		// 	alamat='$alamat',Jabatan='$jabatan',TglBergabung='$ttb',jeniskelamin='$jeniskelamin',telepon='$telepon'")->where("id_calon_kr='$id_calon_kr'")->count();
		// 	header('location:data_karyawan.php');		
		// }else
		// {
		if($db->update('karyawan',"nama='$nama',ttl='$ttl',skill='$skill',pengalaman='$pengalaman', TempatLahir='$tempatlahir',PendidikanTerakhir='$pendidikan',
			alamat='$alamat',Jabatan='$jabatan',TglBergabung='$ttb',jeniskelamin='$jeniskelamin',telepon='$telepon'")->where("id_calon_kr='$id_calon_kr'")->count()==1){
			header('location:data_karyawan.php?success_edit=1');
		} else {
			header('location:data_karyawan.php?success_edit=0');
			// header('location:edit_karyawan.php?error_msg=Ubah Data Gagal&id='.$id_calon_kr);
		}
	// }
?>