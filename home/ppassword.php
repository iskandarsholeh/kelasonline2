<?php
include '../db/db_connection.php';

if(!isset($_SESSION['login_id'])){
    header('Location: ../index.php');
    exit;
}

$id = $_SESSION['login_id'];

$get_user = mysqli_query($db_connection, "SELECT * FROM users WHERE google_id='$id'");

if(mysqli_num_rows($get_user) > 0){
    $user = mysqli_fetch_assoc($get_user);
}
else{
    header('Location: logout.php');
    exit;
}
$pass = $_POST['pass'];
$password = $_POST['epass'];

if ($pass==$password ) {
   
    //proses simpan data, $_POST['pw'] dan $_POST['pw1'] adalah name dari masing masing text password 
    $passworde = password_hash($pass, PASSWORD_DEFAULT);
    $insert = mysqli_query($db_connection, "UPDATE users SET password = '$passworde' WHERE google_id= $id");

    if($insert){
        echo "<script>
        alert('Berhasl diinput');
        window.location.href='index.php';
        </script>";
        exit;
    }
    else{
        echo "Sign up failed!(Something went salah).";
    }
    
    }else {
    echo "<script>alert('Password yang Anda Masukan Tidak Sama');history.go(-1)</script>";
    }

?>