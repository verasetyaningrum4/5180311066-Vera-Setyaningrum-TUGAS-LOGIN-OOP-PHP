<?php
session_start();
/*
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
	header("location:../login.php");
}
*/
if($_SESSION['level']!=2){
	header("location:../login.php");
}
?>
<html>
<head>
	<title>USER VERA</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

</head>
<body>
<div align= "center" class="container">
	<h2 align= "center">Hai Anda masuk sebagai <?php echo htmlspecialchars($_SESSION['username']); ?><br>
		Level Anda adalah : USER </h2>
		<a class="btn btn-danger" href='../logout.php'>KELUAR</a>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>