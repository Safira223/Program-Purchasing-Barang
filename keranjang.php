<?php
session_start();

include 'koneksi.php';

if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) 
{
	echo "<script>alert('Keranjang kosong, silahkan pilih dulu');</script>";
	echo "<script>location='belanja.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Keranjang Belanja</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
	<link rel="stylesheet" href="admin/assets/css/project.css">
	<link rel="icon" type="image/png" href="assets/images/logo/favicon-96x96.png" sizes="96x96">
</head>
<body>

<?php include 'menu.php'; ?>

<section class="konten">
	<div class="container">
		<br><h3>KERANJANG BELANJA</h3><br><br>
		<table class="table table-bordered table-striped table-secondary">
			<thead class="thead-dark">
				<tr>
					<th>No</th>
					<th>Nama Barang</th>
					<th>Jumlah</th>
					<th>Satuan</th>
					<th>Harga</th>
					<th>Subharga</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1; ?>
				<?php foreach ($_SESSION['keranjang'] as $id_item => $jumlah): ?>
				<!-- Menampilkan barang -->
				<?php
				$ambil = $koneksi->query("SELECT * FROM barang WHERE id_item='$id_item'");
				$pecah = $ambil->fetch_assoc();
				$subharga = $pecah["harga"]*$jumlah;
				?>
				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $pecah["item"]; ?></td>
					<td><?php echo $jumlah; ?></td>
					<td><?php echo $pecah["satuan"]; ?></td>
					<td>Rp. <?php echo number_format($pecah["harga"]); ?></td>
					<td>Rp. <?php echo number_format($subharga); ?></td>
					<td>
						<a href="hapuskeranjang.php?id=<?php echo $id_item ?>" class="btn btn-danger btn-xs" >HAPUS</a>
					</td>
				</tr>
				<?php $nomor++ ?>
				<?php endforeach ?>
			</tbody>
		</table>
		<br>
		<a href="belanja.php" class="btn btn-warning">Tambah Barang</a>
		<a href="checkout.php" class="btn btn-info">Checkout</a>
	</div>
</section>

</body>
</html>