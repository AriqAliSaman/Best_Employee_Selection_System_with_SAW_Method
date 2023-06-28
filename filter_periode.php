<?php
$host = "localhost";
$dbname = "projek_kkp";
$username = "root";
$password = "";
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}

// include 'db/db_config.php';
extract($_POST);
// print_r($_POST);
$n = 0;
$periode = $_POST['periode'];
$explode = explode('/', $_POST['periode']);
$query = "SELECT * FROM `hasil_tpa` WHERE `periode` =$explode[0];";
$row = $conn->prepare($query);
$row->execute();
$results = $row->fetchAll();

$stmt = $conn->prepare("SELECT * FROM hasil_tpa WHERE periode='$explode[0]'");
$stmt->execute();

// set the resulting array to associative
$result = $stmt->fetchAll();



// $row = $db->prepare($filter_periode);
//     $row->execute();
//     $results = $row->fetchAll();
// var_dump($db->select('hasil_tpa','*')->get());
// var_dump($row);
var_dump($result);
    // var_dump($filter_periode);
    // var_dump($explode);
    // var_dump($_POST);

	// foreach ($db->select('hasil_tpa','*')->get() as $c) {
	// 	 $k[$n] = $c['kriteria'];
	// 	 $n++;
	// }
	// $data = [];
	// for ($i=0; $i < count($kriteria) ; $i++) { 
	// 	array_push($data,$k[$i].'='.$kriteria[$i]);
	// }
	// $data = implode(',', $data);
	// if($db->update('hasil_tpa',$data)->where("id_calon_kr='$id'")->count()==1){
	// 	header('location:data_penilaian_hasil.php?success_edit=1');
	// } else {
	// 	header('location:data_penilaian_hasil.php?success_edit=0');
	// }
