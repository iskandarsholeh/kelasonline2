<?php
// include database connection file
$db_connection = mysqli_connect("localhost","root","","coding");
 
// Get id from URL to delete that user
$id = $_GET['id'];
$id1 = $_GET['idq']; 
// Delete user row from table based on given id
$result = mysqli_query($db_connection, "DELETE FROM pembayaran WHERE id=$id")or die(mysqli_error($db_connection));
mysqli_query($db_connection, "UPDATE users SET id_kelas=NULL WHERE google_id='$id1' " )or die(mysqli_error($db_connection));
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:pembayaran.php");
?>