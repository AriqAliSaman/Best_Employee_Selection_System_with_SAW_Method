<?php
	// include 'db/db_config.php';
	// extract($_POST);
	// $pass = md5($password);
	// $sql = $db->select('*','admin')->where("username='$username' and password='$pass'");
	// $check = $sql->count();
	// if($check==1){
	// 	foreach ($sql->get() as $data) {
	// 		$id_user = $data['id'];
	// 		//$level = $data['id_role'];
	// 	}
	// 	session_start();
	// 	$_SESSION['id'] = $id_user;
	// 	$_SESSION['nama'] = $username;
	// 	//$_SESSION['level'] = $level;
	// 	header('location:index.php');
	// } else {
	// 	$error = "Username atau Password salah!";
	// 	header('location:login_page.php');
	// }
?>
<?php
	include 'db/db_config.php';
	extract($_POST);
	$pass = md5($password);
	$sql = $db->select('*','admin')->where("username='$username' and password='$pass'");
	$check = $sql->count();
	if($check == 1){
		$data = $sql->get()[0];
		$id_user = $data['id'];
		session_start();
		$_SESSION['id'] = $id_user;
		$_SESSION['nama'] = $username;
		header('location:index.php');
	} else {
		header('location:login_page.php?error_login=1');
	}
?>
