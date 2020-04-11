<?php
include('koneksi.php');
include('function.php');
?>
<?php
$username_err = $password_err = $nama_err = $level_err = $konfir_password_err = "";
$username = $password = $nama = $level = $konfir_password = "";
if($_SERVER['REQUEST_METHOD']=='POST'){
	if(empty(trim($_POST['username']))){
		$username_err = "Maaf username tidak boleh kosong";
	}else{
		if(Cek_User($_POST['username'])){
		$username_err = "Maaf username sudah ada";
		}else{
		$username = test_input($_POST['username']);
		$username = mysqli_real_escape_string($koneksi, $username);
		}
	}
	if(empty(trim($_POST['password']))){
		$password_err = "Maaf password tidak boleh kosong";

	}else{
		$password = test_input($_POST['password']);
		$password = mysqli_real_escape_string($koneksi, $password);
	}
	if(empty(trim($_POST['konfir_password']))){
		$konfir_password_err = "Maaf konfirmasi password tidak boleh kosong";
	}else{
		$konfir_password = trim($_POST['konfir_password']);
		if($password != $konfir_password){
			$konfir_password_err = "Maaf password tidak cocok";
		}
	}
	if(empty(trim($_POST['nama']))){
		$nama_err = "Maaf nama tidak boleh kosong";
	}else{
		$nama = test_input($_POST['nama']);
		$nama = mysqli_real_escape_string($koneksi, $nama);
	}
	if(empty(trim($_POST['level']))){
		$level_err = "Maaf level tidak boleh kosong";
	}else{
		$level = test_input($_POST['level']);
		$level = mysqli_real_escape_string($koneksi, $level);
	}
	if(empty($username_err) && empty($password_err) && empty($nama_err) && empty($level_err) && empty($konfir_password_err)){
		if(Add_User($username, $password, $nama, $level)){
			echo "Data berhasil disimpan";
		}else{
			echo "Data gagal disimpan";
		}
	}
}

?>
<html>
<head>
	<title>LOGIN VERA SETYANINGRUM</title>
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
		<h2 align="center">DAFTAR USER BARU</h2>
		<hr/>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
	<div class="form-group">
		<input class="form-control" type="text" name="username" id="username" placeholder="Masukan username" value="<?php echo $username; ?>" />
		<span class="error-form"><?php echo $username_err; ?></span>
	</div>
	
	<div class="form-group">
		<input class="form-control" type="password" name="password"  placeholder="Masukan password" />
	<span class="error-form"><?php echo $password_err; ?></span>

	</div>
	<div class="form-group">
		<input class="form-control" type="password" name="konfir_password"  placeholder="Masukan konfirmasi password" />
	<span class="error-form"><?php echo $konfir_password_err; ?></span>

	</div>
	<div class="form-group">
		<input class="form-control" type="text" name="nama"  placeholder="Masukan nama dari pengguna" value="<?php echo $nama; ?>" />
	<span class="error-form"><?php echo $nama_err; ?></span>

	</div>
	<div class="form-group">
		<input class="form-control" type="text" name="level"  placeholder="Masukan level pengguna" value="<?php echo $level; ?>" />
	<span class="error-form"><?php echo $level_err; ?></span>

	</div>
	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="kirim" value="DAFTAR" />
        <br><br>
        <h5>Sudah Punya Akun?</h5>
        <br>
        <a class="btn btn-primary" href="index.php">LOGIN</a>
	</div>
	</form>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	</body>
	</html>
