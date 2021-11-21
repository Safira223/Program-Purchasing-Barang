<?php  
session_start();

$koneksi = new mysqli("localhost", "root", "", "data_mr");
?>
<?php
//Mendapatkan id produk dari url 
$id_item = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM barang WHERE id_item='$id_item'");
$detail = $ambil->fetch_assoc();

//echo "<pre>";
//print_r($detail);
//echo "</pre>"
?>
<!DOCTYPE html>
<html>
<head>
	<title>Detail Barang</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
	<link rel="stylesheet" href="admin/assets/css/project.css">
	<link rel="icon" type="image/png" href="assets/images/logo/favicon-96x96.png" sizes="96x96">
</head>
<body>

<?php include 'menu.php'; ?>

<section class="konten">
	<div class="container">
		<div class="row">
			<div class="col-md-6"><br><br>
				<img src="foto_produk/cart.jpg" alt="" class="img-responsive">
			</div>
			<div class="col-md-6"><br><br>
				<h3><?php echo $detail['item'] ?></h3>
				<h4>Rp. <?php echo number_format($detail['harga']); ?></h4>

				<form method="post">
					<div class="form-group">
						<div class="input-group">
							<input type="number" min="1" class="form-control" name="jumlah">
						</div><br>
						<div class="input-group-btn">
								<button class="btn btn-info" name="buy">Tambah</button>
						</div>
					</div>
				</form>

				<?php  
				if (isset($_POST['buy'])) 
				{
					$jumlah = $_POST['jumlah'];

					$_SESSION['keranjang'][$id_item] = $jumlah;

					echo "<script>alert('Barang Telah Masuk ke Keranjang');</script>";
					echo "<script>location='keranjang.php';</script>";
				}
				?>

			</div>
		</div>
	</div>
</section>

</body>
</html>