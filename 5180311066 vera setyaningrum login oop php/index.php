<?php
include('koneksi.php');
?>
<?php
$username_err = $password_err ="";
if($_SERVER['REQUEST_METHOD']=='POST'){

	if(empty(trim($_POST['username']))){
		$username_err = "Username tidak boleh kosong";
	}else{
		$username=trim($_POST['username']);
	}
	//
	if(empty(trim($_POST['password']))){
		$password_err = "Password tidak boleh kosong";
	}else{
		$password = trim($_POST['password']);
	}
	//cek sebelum melakukan select ke DB
	if(empty($username_err) && empty($password_err)){

		$sql = "SELECT id, username, password, nama,  level FROM tb_user WHERE username = ?";
		if($stmt = mysqli_prepare($koneksi, $sql)){
			mysqli_stmt_bind_param($stmt,"s",$param_username);
			$param_username = $username;
			if(mysqli_stmt_execute($stmt)){
				mysqli_stmt_store_result($stmt);
				if(mysqli_stmt_num_rows($stmt)==1){
					mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $nama, $level);
					if(mysqli_stmt_fetch($stmt)){
						if(password_verify($password, $hashed_password)){
							session_start();
							$_SESSION['id']=$id;
							$_SESSION['username']=$username;
							$_SESSION['nama']=$nama;
							$_SESSION['level']=$level;

							if($_SESSION['level']==1){
								header("location:admin");
							}elseif($_SESSION['level']==2){	
								header("location:user");
							}

							//
						}else{
							$password_err = "Maaf password tidak cocok";
						}
					}
				}else{
					$username_err ="Maaf username tidak ditemukan";
				}
			}else{
				echo "Gagal melakukan login, coba lagi nanti";
			}
		}
		mysqli_stmt_close($stmt);


	}
	mysqli_close($koneksi);
}

?>
<html>
<head>
	<title>LOGIN VERA</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<style type="text/css">
	.error-form{
		color: red;
	}
</style>
</head>
<body>
<div class="container">
<div align="center" class="col">
	<div class="col-md-6">
		<h2 align="center">LOGIN</h2>
		<hr/>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
	<div class="form-group">
		<input class="form-control" type="text" name="username" id="username" placeholder="Masukan username.."  />
		<span class="error-form"><?php echo $username_err; ?></span>
	</div>
	
	<div class="form-group">
		<input class="form-control" type="password" name="password"  placeholder="Masukan password.." />
	<span class="error-form"><?php echo $password_err; ?></span>
	</div>
	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="kirim" value="LOGIN" />
		<br><br>
        <h5>Belum Punya Akun?</h5>
        <br>
        <a class="btn btn-primary" href="daftar.php">DAFTAR</a>
	</div>
</form>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	</body>
	</html>

