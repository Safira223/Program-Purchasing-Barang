<?php 
session_start();
$koneksi = new mysqli("localhost","root","","data_mr"); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Pelanggan</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
	<link rel="icon" type="image/png" href="assets/images/logo/favicon-96x96.png" sizes="96x96">
</head>
<body>

<?php include 'menu.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Enter Details To Login</h3>
				</div>
				<div class="panel-body">
					<form method="post">
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" name="email">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" name="password">
						</div>
						<button class="btn btn-info" name="login">Login</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php  
if (isset($_POST['login'])) 
{
	$email = $_POST['email'];
	$password = $_POST['password'];
	// lakukan query mengecek akun pelanggan di database
	$ambil = $koneksi->query("SELECT * FROM pelanggan
		WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

	$akunyangcocok = $ambil->num_rows;

	if ($akunyangcocok==1) 
	{
		//Login Berhasil
		$akun = $ambil->fetch_assoc();
		$_SESSION['pelanggan'] = $akun;
		echo "<script>alert('Login Berhasil');</script>";

		if (isset($_SESSION['keranjang']) OR !empty($_SESSION['keranjang']))
		{
			echo "<script>location='checkout.php';</script>";
		}
		else
		{
			echo "<script>location='riwayat.php';</script>";
		}
	}
	else
	{
		//Login Failed
		echo "<script>alert('Login Gagal, Password Salah');</script>";
		echo "<script>location='login.php';</script>";
	}
}
?>



</body>
</html>