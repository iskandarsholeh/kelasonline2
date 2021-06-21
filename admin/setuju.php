<?php
$db_connection = mysqli_connect("localhost","root","","coding");

$id = $_GET['id'];


 

        mysqli_query($db_connection,"update pembayaran set bayar='1' where id='$id'")or die(mysqli_error($db_connection));
        header('Location:pembayaran.php');
        // echo "ERROR, data gagal diupdate". mysqli_error();
	



?>