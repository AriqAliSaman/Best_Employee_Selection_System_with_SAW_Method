<?php
	include 'db/db_config.php';
	$id = $_GET['id'];
	foreach ($db->select('kriteria','kriteria')->where("id_kriteria=$id")->get() as $c) {
		 $krt = $c['kriteria'];
	}
	if($db->delete('kriteria')->where('id_kriteria='.$id)->count() == 1){
		$db->alter('hasil_tpa','drop column',"$krt",'')->get();
		header('location:data_kriteria.php?success_delete=1');
	} else {
		header('location:data_kriteria.php?success_delete=0');
	}
?>