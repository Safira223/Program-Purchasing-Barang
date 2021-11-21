<?php 
session_start();
$koneksi = new mysqli("localhost","root","","data_mr");

$id_purchasing = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM pembayaran 
	LEFT JOIN purchasing ON pembayaran.id_purchasing=purchasing.id_purchasing 
	WHERE purchasing.id_purchasing='$id_purchasing'");
$detbay = $ambil->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Lihat Pembayaran</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
	<link rel="stylesheet" href="admin/assets/css/project.css">
	<link rel="icon" type="image/png" href="assets/images/logo/favicon-96x96.png" sizes="96x96">
</head>
<body>

	<?php include 'menu.php'; ?>

	<div class="container">
		<br><h3>BUKTI PEMBAYARAN</h3><br><br>
		<a href="pembayaran.php?id=<?php echo $id_purchasing ?>" 
		class="btn btn-info">Tambah Nota</a><br><br>
		<div class="row">
				<?php $ambil=$koneksi->query("SELECT *FROM pembayaran
				LEFT JOIN purchasing ON pembayaran.id_purchasing=purchasing.id_purchasing
				WHERE purchasing.id_purchasing='$id_purchasing'"); ?>
        		<?php while ($detbay=$ambil->fetch_assoc()){ ?>
			<div class="col-md-4">
				<table class="table">
					<tr>
						<th>NAMA PENYETOR</th>
						<td colspan="3"><?php echo $detbay['nama_penyetor'] ?></td>
					</tr>
					<tr>
						<th>NAMA NOTA</th>
						<td colspan="3"><?php echo $detbay['nama_nota'] ?></td>
					</tr>
					<tr>
						<th>TANGGAL UPLOAD</th>
						<td colspan="3"><?php echo $detbay['tanggal'] ?></td>
					</tr>
				</table>
			</div>
			<div class="col-md-5">
				<img src="bukti_pembayaran/<?php echo $detbay['bukti'] ?>" alt="" class="img-responsive" width="300px" height="200px">
			</div>
			<?php };?>
		</div>
	</div>

</body>
</html>