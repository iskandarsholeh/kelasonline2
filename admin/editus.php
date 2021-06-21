<?php

$db_connection = mysqli_connect("localhost","root","","coding");
    $id = $_POST['id'];
    $nama = $_POST['content'];
    //query update
    $query = "UPDATE aboutus SET content='$nama'  WHERE id='$id' ";
    if (mysqli_query($db_connection, $query)) {
        # credirect ke page index
        header("location:about.php");    
    }
    else{
        echo "ERROR, data gagal diupdate". mysqli_error();
    }

?>