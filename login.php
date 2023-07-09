<?php 
session_start();
require 'koneksi.php';

if ( isset($_SESSION["Login.php"]) ) {
	header("Location: index.php");
	exit;
}



// LOGIN
if (isset($_POST['Login']) ) {
	
	$user = $_POST['Nama'];
	$pass = $_POST['pass'];

	$data_user = mysqli_query($konek, "SELECT * FROM tb_pengguna WHERE nama_pengguna = '$user' AND kata_sandi = '$pass' ");


	// CEK USERNAME
	if (mysqli_num_rows($data_user) === 1) {
		
		// CEK PASSWORD
		$baris = mysqli_fetch_assoc($data_user);
		$Nama = $baris['nama_pengguna'];
		$pass = $baris['kata_sandi'];

			if ($user == $Nama && $pass == $pass) {
				// MENYIAPKAN SESSION
				$_SESSION["Login"] = true;
				$_SESSION["Nama"] = $user;

				header('location:coba.php');
				exit;
			}
		}
	$error = true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LOGIN | BEL SEKOLAH</title>
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link href="fontawesome/css/all.min.css" rel="stylesheet">
</head>
<body style="background: lightblue;">
	<!-- KARTU -->
	<div class="card border-primary mb-3 mx-auto" style="width: 50%; height: 50%; margin-top: 10%;">
	  <h5 class="card-header bg-primary text-center text-white" style="width: 100%;">Login</h5>
	  <div class="card-body">

		<!-- PEMBERITAHUAN -->
		<?php if (isset($error) ) : ?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong style="text-align: center;">Nama Pengguna Atau Kata Sandi Salah</strong>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
		<?php endif; ?>


	  	<!-- FORM (FOMULIR) -->
	    <form action="" method="post">
		  <div class="form-group">
		    <label>Nama Pengguna</label>
		    <input type="text" class="form-control" placeholder="Masukkan Nama Pengguna" name="Nama" autocomplete="off">
		  </div>
		  <div class="form-group">
		    <label>Kata Sandi</label>
		    <input type="password" class="form-control" placeholder="Masukkan Kata Sandi" name="pass" autocomplete="off">

		  </div>
		  <button type="submit" class="btn btn-block btn-lg btn-primary" name="Login"><i class="fas fa-sign-in-alt"></i> Masuk</button>
		  <button type="submit" class="btn btn-block btn-lg btn-success"><i class="fas fa-sign-in-alt"></i> <a href="daftar.php" style="text-decoration: none;">Daftar</a></button>
		  	<span class="eye" onclick="Myfunction()">
				<i id="hide1" class="fa fa-eye"></i>
				<i id="hide2" class="fa fa-eye-slash"></i>
			</span>
		</form>
	  </div>
	</div>
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    	function Myfunction() {
    		var x = document.getElementById('myInput');
    		var y = document.getElementById('hide1');
    		var z = document.getElementById('hide2');

    		if (x.type === 'password') {
    			x.type = "text";
    			y.style.display = "block";
    			z.style.display = "none";
    		}else{
    			x.type = "password";
    			y.style.display = "block";
    			z.style.display = "none";
    		}
    	}
    </script>
</body>
</html>