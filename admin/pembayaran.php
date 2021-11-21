<h2>Nota Pembayaran</h2><br><br>

<?php  

$id_purchasing = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_purchasing='$id_purchasing'");
$detail = $ambil->fetch_assoc();

?>

<div class="row">
				<?php $ambil=$koneksi->query("SELECT *FROM pembayaran
				LEFT JOIN purchasing ON pembayaran.id_purchasing=purchasing.id_purchasing
				WHERE purchasing.id_purchasing='$id_purchasing'"); ?>
        		<?php while ($detail=$ambil->fetch_assoc()){ ?>
			<div class="col-md-4">
				<table class="table">
					<tr>
						<th>NAMA PENYETOR</th>
						<td colspan="3"><?php echo $detail['nama_penyetor'] ?></td>
					</tr>
					<tr>
						<th>NAMA NOTA</th>
						<td colspan="3"><?php echo $detail['nama_nota'] ?></td>
					</tr>
					<tr>
						<th>TANGGAL UPLOAD</th>
						<td colspan="3"><?php echo $detail['tanggal'] ?></td>
					</tr>
				</table>
			</div>
			<div class="col-md-5">
				<img src="../bukti_pembayaran/<?php echo $detail['bukti'] ?>" alt="" class="img-responsive" width="300px" height="250px">
			</div>
			<?php };?>
		</div>
</div><br>