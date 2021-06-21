<?php
include '../db/db_connection.php';

if(!isset($_SESSION['login_id'])){
    header('Location: ../index.php');
    exit;
}

$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
$id = $_SESSION['login_id'];

$get_user = mysqli_query($db_connection, "SELECT * FROM users WHERE google_id='$id'");

$cek = mysqli_num_rows($get_user);
if($cek == 1) {
	
 
if(!in_array($ext,$ekstensi) ) {
    echo "<script>alert('Ektensi salah');history.go(-1)</script>";
}else{
	if($ukuran < 1044070){		
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/'.$rand.'_'.$filename);
		mysqli_query($db_connection, "UPDATE users SET latar_image = '$xx' WHERE google_id= $id");
        header('Location: page-profile.php');
	}else{
        header('Location: page-profile.php');
	}
}
}
else{
    header('Location: page-profile.php');
    exit;
}

 
?>