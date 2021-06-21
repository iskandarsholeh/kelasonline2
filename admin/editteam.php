<?php
$db_connection = mysqli_connect("localhost","root","","coding");

$id = $_POST['id'];
$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];
$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

 
if(!in_array($ext,$ekstensi) ) {
    echo "<script>alert('Ektensi salah');history.go(-1)</script>";
}else{
	if($ukuran < 1044070){		
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], '../img/team-img/'.$rand.'_'.$filename);
		// mysqli_query($db_connection, "insert into team values ('','$nama','$jabatan','$xx')");
        // mysqli_query($db_connection, "INSERT INTO team(nama,jabatan,foto) VALUES('$nama','$jabatan','$xx')");
        
        mysqli_query($db_connection,"update team set nama='$nama', jabatan='$jabatan', foto='$xx' where id='$id'");
        header('Location: team.php');
        // echo "ERROR, data gagal diupdate". mysqli_error();
	}else{
        // header('Location: team.php');
        echo "ERROR, data gagal diupdate". mysqli_error();
	}
}



?>