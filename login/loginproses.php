<?php 
// mengaktifkan session php

 
// menghubungkan dengan koneksi
include '../db/db_connection.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$result = mysqli_query($db_connection,"SELECT * FROM users where email='$username' ");

$cek = mysqli_num_rows($result);

if($cek == 1) {
	while($data = mysqli_fetch_assoc($result)){
		if(password_verify($password,$data['password']))
		{
			// echo "Password Valid";

			if($data['id_level']=="1"){
		
				//menyimpan session user, nama, status dan id login
				$_SESSION['id'] = $data['id'];
				$_SESSION['login_id'] = $data['google_id'];
				$_SESSION['username'] = $username;
				$_SESSION['nama'] = $data['name'];
				$_SESSION['status'] = "admin";
				$_SESSION['id_login'] = $data['id'];
				$_SESSION['profile'] = $data['profile_image'];
				$_SESSION['id_level'] = $data['id_level'];
				$_SESSION['email'] = $data['email'];
				header("location:../admin");
				} 
				else if ($data['id_level'] == "2") {
					//menyimpan session user, nama, status dan id login
					$_SESSION['id'] = $data['id'];
					$_SESSION['login_id'] = $data['google_id'];
					$_SESSION['username'] = $username;
					$_SESSION['nama'] = $data['name'];
					$_SESSION['status'] = "admin";
					$_SESSION['id_login'] = $data['id'];
					$_SESSION['profile'] = $data['profile_image'];
					$_SESSION['id_level'] = $data['id_level'];
					$_SESSION['email'] = $data['email'];
					header("location:../home");
					}

		}
		else
		{
		// echo "Password Tidak Valid";

		echo "<script>
			alert('email atau password salah ');
			window.location.href='../index.php';
			</script>";
		}
	
	
	}
	// if($data['id_level']=="1"){
		
	// //menyimpan session user, nama, status dan id login
	// $_SESSION['login_id'] = $data['google_id'];
	// $_SESSION['username'] = $username;
	// $_SESSION['nama'] = $data['name'];
	// $_SESSION['status'] = "admin";
	// $_SESSION['id_login'] = $data['id'];
	// $_SESSION['profile'] = $data['profile_image'];
	// $_SESSION['id_level'] = $data['id_level'];
	// header("location:../admin");
	// } 
	// else if ($data['id_level'] == "2") {
	// 	//menyimpan session user, nama, status dan id login
	// 	$_SESSION['login_id'] = $data['google_id'];
	// 	$_SESSION['username'] = $username;
	// 	$_SESSION['nama'] = $data['name'];
	// 	$_SESSION['status'] = "admin";
	// 	$_SESSION['id_login'] = $data['id'];
	// 	$_SESSION['profile'] = $data['profile_image'];
	// 	$_SESSION['id_level'] = $data['id_level'];
	// 	header("location:../home");
	// 	}
// 		else {
// 			echo "<script>
// 			alert('email atau password salah ');
// 			window.location.href='../index.php';
// 			</script>";
// 		}
	}
 else {
	echo "<script>
	alert('email atau password salah ');
	window.location.href='../index.php';
	</script>";
}

    

?>