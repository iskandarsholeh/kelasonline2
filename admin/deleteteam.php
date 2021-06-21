<?php
// include database connection file
$db_connection = mysqli_connect("localhost","root","","coding");
 
// Get id from URL to delete that user
$id = $_GET['id'];
 
// Delete user row from table based on given id
$result = mysqli_query($db_connection, "DELETE FROM team WHERE id=$id");
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:team.php");
?>