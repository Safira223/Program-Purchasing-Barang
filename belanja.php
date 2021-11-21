<?php
session_start();
include 'koneksi.php';
include 'menu.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title> Belanja </title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
	<link rel="stylesheet" href="admin/assets/css/project.css">
	<link rel="icon" type="image/png" href="assets/images/logo/favicon-96x96.png" sizes="96x96">
</head>
<body>
<div class="container">
	<br><form action="pencarian.php" method="get" class="navbar-form navbar-right">
            <input type="text" class="form-control" name="keyword">
            <button class="btn btn-primary">Cari</button>
    </form>
	<!-- konten -->
	<section class="konten" style="margin-top: 100px;">
		<h2><strong>DATA BARANG</strong></h2><br><br>
		<a href="tambah.php" class="btn btn-danger">Tambah Data</a><br><br>
		<div class="row">
			<?php $ambil = $koneksi->query("SELECT * FROM barang "); ?>
			<?php while ($barang=$ambil->fetch_assoc()){ ?>
			<div class="col-md-2 center">
				<div class="thumbnail">
					<img src="foto_produk/cart.jpg" alt="" class="img-responsive">
					<div class="caption">
						<h3><?php echo $barang['item']; ?></h3>
						<h5>Rp. <?php echo number_format($barang['harga']); ?></h5>
						<a href="beli.php?id=<?php echo $barang['id_item']; ?>" class="btn btn-primary">Beli</a>
						<a href="detail.php?id=<?php echo $barang['id_item']; ?>" class="btn btn-warning">Detail</a>
					</div>
				</div>
			</div>
		<?php }; ?>
		</div>
	</section>
</div>

</body>
</html>