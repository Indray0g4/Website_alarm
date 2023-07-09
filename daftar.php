<?php 
session_start();
require 'koneksi.php';

if (isset($_REQUEST['nama_pengguna'])){
	        // removes backslashes
		$nama_pengguna = stripslashes($_REQUEST['nama_pengguna']);
	        //escapes special characters in a string
		$nama_pengguna = mysqli_real_escape_string($koneksi,$nama_pengguna); 
		$kata_sandi = stripslashes($_REQUEST['kata_sandi']);
		$kata_sandi = mysqli_real_escape_string($koneksi,$kata_sandi);
	        $query = "INSERT into `tb_pengguna` (id_pengguna, nama_pengguna, kata_sandi) 
			VALUES (NULL, '$nama_pengguna', '$kata_sandi')";
	        $result = mysqli_query($koneksi,$query);
	        if($result){
	            echo "<script>
				alert('Sudah daftar! Silahkan masukkan kembali ke login');
				document.location.href = 'login.php';
				</script>";
	        }
	    }else{
?>
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Daftar | SIBELA</title>
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link href="fontawesome/css/all.min.css" rel="stylesheet">
</head>
<body style="background: lightblue;">
	<!-- KARTU -->
	<div class="card border-primary mb-3 mx-auto" style="width: 50%; height: 50%; margin-top: 10%;">
	  <h5 class="card-header bg-primary text-center text-white" style="width: 100%;">Registrasi</h5>
	  <div class="card-body">

		<!-- PEMBERITAHUAN -->
<!-- 		<?php if (isset($error) ) : ?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong style="text-align: center;">Nama Pengguna Atau Kata Sandi Salah</strong>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
		<?php endif; ?> -->


	  	<!-- FORM (FOMULIR) -->
	    <form action="" method="post">
		  <div class="form-group">
		    <label>Nama Pengguna</label>
		    <input type="text" class="form-control" placeholder="Masukkan Nama Pengguna" name="nama_pengguna" required>
		  </div>
		  <div class="form-group">
		    <label>Kata Sandi</label>
		    <input type="kata_sandi" class="form-control" placeholder="Masukkan Kata Sandi" name="pass" required>
		    <span class="eye" onclick="Myfunction()">
				<i id="hide1" class="fa fa-eye"></i>
				<i id="hide2" class="fa fa-eye-slash"></i>
			</span>
		  </div>
		  <button type="submit" class="btn btn-block btn-lg btn-success" href="daftar.php">
		  	<i class="fas fa-sign-in-alt"></i> Daftar
		  </button>
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
<?php } ?>
</body>
</html>