<?php
$db_connection = mysqli_connect("localhost","root","","coding");

$nama = $_POST['nama'];
$rand = rand();
// $ekstensi1 =  array('mp4','mkv','avi','3gp');
// $ekstensi2 =  array('pdf','doc','pptx');
$ekstensi =  array('png','jpg','jpeg','gif');
$video = $_FILES['video']['name'];
$pdf1 = $_FILES['pdf1']['name'];
$pdf2 = $_FILES['pdf2']['name'];
$pdf3 = $_FILES['pdf3']['name'];
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ukuran1 = $_FILES['pdf1']['size'];
$ukuran2 = $_FILES['pdf2']['size'];
$ukuran3 = $_FILES['pdf3']['size'];
$ukuran4 = $_FILES['video']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
$ext1 = pathinfo($pdf1, PATHINFO_EXTENSION);
$ext2 = pathinfo($pdf2, PATHINFO_EXTENSION);
$ext3 = pathinfo($pdf3, PATHINFO_EXTENSION);
$ext4 = pathinfo($video, PATHINFO_EXTENSION);
$materi = $_POST['materi'];
$harga = $_POST['harga'];
$idq = $_POST['quiz']; 

if(!in_array($ext,$ekstensi) && !in_array($ext1,$ekstensi1) && !in_array($ext2,$ekstensi2) && !in_array($ext3,$ekstensi3) && !in_array($ext4,$ekstensi4) ) {
    echo "<script>alert('Ektensi foto salah');history.go(-1)</script>";
}else{
	if($ukuran < 904407099 && $ukuran2 < 904407099 && $ukuran3 < 904407099 && $ukuran4 < 904407099 && $ukuran4 < 904407099){		
		$xx = $rand.'_'.$filename;
        $xx1 = $rand.'_'.$pdf1;
        $xx2 = $rand.'_'.$pdf2;
        $xx3 = $rand.'_'.$pdf3;
        $xx4 = $rand.'_'.$video;
		// move_uploaded_file($_FILES['foto']['tmp_name'], '../img/team-img/'.$rand.'_'.$filename);
        // move_uploaded_file($_FILES['pdf1']['tmp_name'], '../img/team-img/'.$rand.'_'.$pdf1);
        // move_uploaded_file($_FILES['pdf2']['tmp_name'], '../img/team-img/'.$rand.'_'.$pdf2);
        // move_uploaded_file($_FILES['pdf3']['tmp_name'], '../img/team-img/'.$rand.'_'.$pdf3);
        // move_uploaded_file($_FILES['video']['tmp_name'], '../img/team-img/'.$rand.'_'.$video);
        move_uploaded_file($_FILES['foto']['tmp_name'], '../img/kelas/'.$rand.'_'.$filename);
        move_uploaded_file($_FILES['pdf1']['tmp_name'], '../img/kelas/'.$rand.'_'.$pdf1);
        move_uploaded_file($_FILES['pdf2']['tmp_name'], '../img/kelas/'.$rand.'_'.$pdf2);
        move_uploaded_file($_FILES['pdf3']['tmp_name'], '../img/kelas/'.$rand.'_'.$pdf3);
        move_uploaded_file($_FILES['video']['tmp_name'], '../img/kelas/'.$rand.'_'.$video);
		// mysqli_query($db_connection, "insert into team values ('','$nama','$jabatan','$xx')");
        // mysqli_query($db_connection, "INSERT INTO team(nama,jabatan,foto) VALUES('$nama','$jabatan','$xx')");
        
        mysqli_query($db_connection,"INSERT INTO kelas (nama,foto,pdf1,pdf2,pdf3,video,caption,harga,id_quiz) VALUES('$nama','$xx','$xx1','$xx2','$xx3','$xx4','$materi','$harga','$idq','0',)") or die(mysqli_error($db_connection));
        header('Location: kelas.php');
        // echo "ERROR, data gagal diupdate". mysqli_error();
	}else{
        // header('Location: team.php');
        echo "ERROR, data gagal diupdate". mysqli_error();
	}
}



?>