<?php
$db_connection = mysqli_connect("localhost","root","","coding");

$id = $_POST['id'];
$nama = $_POST['nama'];
$benar = $_POST['benar'];
$salah = $_POST['salah'];
$total = $_POST['total'];

        mysqli_query($db_connection, "INSERT INTO quiz (idq,nama_quiz,benar,salah,total) VALUES('$id','$nama','$benar','$salah','$total')");
        header('Location: quiz.php');
 
?>