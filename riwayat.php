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
	<title>Riwayat Belanja</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
	<link rel="stylesheet" href="admin/assets/css/project.css">
	<link rel="icon" type="image/png" href="assets/images/logo/favicon-96x96.png" sizes="96x96">
</head>
<body>

<?php include 'menu.php'; ?>


<section class="riwayat">
	<div class="container">
		<br><center><h3>Riwayat Belanja <?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?><h3></center><br><br>
		<h5>
		<table class="table table-hover table-active">
			<thead class="thead-dark">
			<tr>
				<th>No</th>
				<th>No MR</th>
				<th>Nama Cabang</th>
				<th>Tanggal</th>
				<th>Status Pembelian</th>
				<th>Aksi</th>
			</tr>
			</thead>
			<tbody>
				<?php  
				$nomor=1;
				$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
				$ambil = $koneksi->query("SELECT * FROM purchasing JOIN pelanggan 
				ON purchasing.id_pelanggan=pelanggan.id_pelanggan
				WHERE purchasing.id_pelanggan='$id_pelanggan'");
				// var_dump($ambil->fetch_assoc());die;
				while ($pecah = $ambil->fetch_assoc()) {
				?>
				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $pecah['mr'] ?></td>
					<td><?php echo $pecah['nama_pelanggan'] ?></td>
					<td><?php echo $pecah['tanggal_pembelian'] ?></td>
					<td><?php echo $pecah['status_pembelian'] ?></td>
					<td>
						<a href="nota.php?id=<?php echo $pecah['id_purchasing'] ?>" class="btn btn-info">Detail</a>

						<?php if ($pecah['status_pembelian']=="pending"): ?>
							<a href="pembayaran.php?id=<?php echo $pecah['id_purchasing']; ?>" 
							class="btn btn-success">Upload Nota</a>	
						<?php else: ?>
							<a href="lihat_pembayaran.php?id=<?php echo $pecah['id_purchasing'] ?>" 
							class="btn btn-warning">Lihat Nota</a>
							<a href="pembayaran.php?id=<?php echo $pecah['id_purchasing'] ?>" 
							class="btn btn-success">Tambah Nota</a>
						<?php endif ?>

						
					</td>
				</tr>
				<?php $nomor++; ?>
			<?php } ?>
			</tbody>
		</table>
		</h5>
	</div>
</section>

</body>
</html>