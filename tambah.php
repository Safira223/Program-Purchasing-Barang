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
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Barang</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
	<link rel="stylesheet" href="admin/assets/css/project.css">
	<link rel="icon" type="image/png" href="assets/images/logo/favicon-96x96.png" sizes="96x96">
</head>
<body>
<?php include 'menu.php'; ?>

	<div class="container">
	<br><h3>TAMBAH BARANG</h3><br><br>
	    <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="form-group">
                <label>Satuan</label>
                <input type="text" class="form-control" name="satuan">
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="text" class="form-control" name="harga">
            </div><br>
		<button class="btn btn-info" name="simpan">Simpan</button>
		</form>
	</div>

	<?php  
	if (isset($_POST['simpan'])) 
    {
        $koneksi->query("INSERT INTO barang (item,satuan,harga)
        VALUES('$_POST[nama]','$_POST[satuan]','$_POST[harga]')");

		echo "<script>alert('data barang bertambah'); </script>";
		echo "<script>location='belanja.php'; </script>";
	}
	?>

</body>
</html>