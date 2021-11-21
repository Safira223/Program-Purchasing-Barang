<?php
session_start();
//koneksi database
$koneksi = new mysqli("localhost","root","","data_mr");

if (!isset($_SESSION['pelanggan']) OR empty($_SESSION['pelanggan'])) 
{
	echo "<script>alert('Silahkan Login');</script>";
	echo "<script>location='login.php';</script>";
	exit();
}

$idpem = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM purchasing WHERE id_purchasing='$idpem'");
$detpem = $ambil->fetch_assoc();

$id_pelanggan_beli = $detpem['id_pelanggan'];
$id_pelanggan_login = $_SESSION['pelanggan']['id_pelanggan'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Pembayaran</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
	<link rel="stylesheet" href="admin/assets/css/project.css">
	<link rel="icon" type="image/png" href="assets/images/logo/favicon-96x96.png" sizes="96x96">
</head>
<body>
<?php include 'menu.php'; ?>

	<div class="container">
		<br><h3>KIRIM NOTA</h3><br>
		<div class="alert alert-warning">Kirim Bukti Pembayaran Anda Disini</div><br>

		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Nama Penyetor</label>
				<input type="text" class="form-control" name="nama_penyetor">
			</div>
			<div class="form-group">
				<label>Nama Nota</label>
				<input type="text" class="form-control" name="nama_nota">
			</div>
			<div class="form-group">
				<label>Foto Bukti</label>
				<input type="file" class="form-control" name="bukti">
				<p class="text-danger">Foto bukti pembayaran dengan JPEG max 2MB</p>
			</div>
			<button class="btn btn-info" name="kirim">Kirim</button>
		</form>
	</div>

	<?php  
	if (isset($_POST['kirim'])) 
	{
		$namabukti = $_FILES['bukti']['name'];
		$lokasibukti = $_FILES['bukti']['tmp_name'];
		$namafix = date('YmdHis').$namabukti;
		move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafix");

		$nama = $_POST["nama_penyetor"];
		$nota = $_POST["nama_nota"];
		$tanggal = date("Y-m-d");

		//simpan pembayaran
		$koneksi->query("INSERT INTO pembayaran(id_purchasing, nama_penyetor, nama_nota, tanggal, bukti) 
			VALUES ('$idpem','$nama', '$nota', '$tanggal', '$namafix')");

		//update data pembayaran
		$koneksi->query("UPDATE purchasing SET status_pembelian='sudah mengirim'
			WHERE id_purchasing='$idpem'");

		echo "<script>alert('bukti pembayaran telah terkirim'); </script>";
		echo "<script>location='riwayat.php'; </script>";

	}
	?>

</body>
</html>