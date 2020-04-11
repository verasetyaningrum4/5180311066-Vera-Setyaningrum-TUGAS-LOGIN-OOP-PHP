<?php

session_start();

if($_SESSION['level']!=1){
	header("location:../login.php");
}
include('../function.php');

?>
<html>
<head>
	<title>LOGIN VERA</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

</head>
<body>
<div align="center" class="container">
	<h2>Ini Adalah Halaman Admin</h2>
	<h4>Anda telah Login sebagai : </h4>
	<table class="table" border=1>
	<tr>
		<th>Nama</th>
		<th>Username</th>
		<th>Level</th>
	</tr>
	<tr>
		<td><?php echo $_SESSION['nama']; ?></td>
		<td><?php echo $_SESSION['username']; ?></td>
		<td><?php echo $_SESSION['level']; ?></td>
	</tr>


	</table>
		<br><a class="btn btn-danger" href='../logout.php'>KELUAR</a>| <a class="btn btn-success" href='update.php'>UBAH DATA</a>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>