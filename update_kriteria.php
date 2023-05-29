<?php
	include 'db/db_config.php';
	extract($_POST);
	$crt_tmp = explode(' ',$kriteria);
	$crt = implode('_', $crt_tmp);
	foreach ($db->select('kriteria','kriteria')->where("id_kriteria='$id'")->get() as $r) {
		echo $k = $r['kriteria'];
	}
	if($db->update('kriteria',"kriteria='$crt',bobot='$bobot',type='$type'")->where("id_kriteria='$id'")->count()==1){
		$db->alter('hasil_tpa','change',"$k $crt","int")->get();
		header('location:data_kriteria.php?success_edit=1');
	} else {
		//echo "update gagal";
		header('location:data_kriteria.php?success_edit=0');
	}
?>