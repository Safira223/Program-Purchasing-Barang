<h2>Data Purchasing</h2><br><br>

<form action="layout.php" method="get">
    <div class="col-md-3">
        <input type="text" class="form-control" name="keyword">
    </div>
    <button class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
</form><br><br>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>No MR</th>
			<th>Nama Cabang</th>
			<th>Tanggal</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>
		<tbody>
			<?php $nomor=1; ?>
			<?php $ambil = $koneksi->query("SELECT * FROM purchasing JOIN pelanggan 
			ON purchasing.id_pelanggan=pelanggan.id_pelanggan"); ?>
			<?php while($pecah = $ambil->fetch_assoc()){  ?>
			<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['mr']; ?></td>
			<td><?php echo $pecah['nama_pelanggan']; ?></td>
			<td><?php echo $pecah['tanggal_pembelian']; ?></td>
			<td><?php echo $pecah['status_pembelian']; ?></td>
			<td>
				<a href="index.php?halaman=detail&id=<?php echo $pecah['id_purchasing']; ?>" 
				class="btn btn-info"><i class="	fa fa-check-square-o"></i> Detail</a>

				<?php if ($pecah['status_pembelian']!=="pending"): ?>
				<a href="index.php?halaman=pembayaran&id=<?php echo $pecah['id_purchasing'] ?>" class="btn btn-success"><i class="fa fa-book"></i> Nota Pembayaran</a>
				<?php endif ?>
				
				<a href="tampilan.php?halaman=cetak&id=<?php echo $pecah['id_purchasing']; ?>" 
				class="btn btn-danger" target="_blank"><i class="fa fa-print"></i> Print</a>
			</td>
		</tr>
		<?php $nomor++; ?>
	<?php } ?>
		</tbody>
	</thead>
</table>