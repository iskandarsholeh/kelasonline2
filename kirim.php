<?php

	$admin = 'iskandar.sholeh22@gmail.com'; //ganti email dg email admin (email penerima pesan)
	
	$nama	= $_POST['nama'];
	$email	= $_POST['email'];
	$judul	= $_POST['judul'];
	$pesan	= $_POST['pesan'];
	
	$pengirim	= 'Dari: '.$nama.' <'.$email.'>';
	
	if(mail($admin, $judul, $pesan, $pengirim)){
		echo 'SUCCESS: Pesan anda berhasil di kirim. <a href="index.php">Kembali</a>';
	}else{
		echo 'ERROR: Pesan anda gagal di kirim silahkan coba lagi. <a href="index.php">Kembali</a>';
	}


?>