<h2>Detail Purchasing</h2><br><br>
<?php  
$ambil = $koneksi->query("SELECT * FROM purchasing JOIN pelanggan ON purchasing.id_pelanggan=pelanggan.id_pelanggan
	WHERE purchasing.id_purchasing='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

<div class="row">
    <div class="col-md-4">
	<h3>Data MR</h3>
		<p>
        <strong>No. MR : <?php echo $detail['mr']; ?></strong><br>
            Tanggal MR : <?php echo $detail['tanggal_pembelian']; ?><br>
            Total Pembelian : Rp. <?php echo number_format($detail['total_pembelian']); ?>
        </p>
    </div>
    <div class="col-md-4">
	<h3>Data Pengirim</h3>
		<p>
        <strong>Nama Cabang : <?php echo $detail['nama_pelanggan']; ?></strong><br>
            Nama Departemen : <?php echo $detail['dep']; ?><br>
            Sektor : <?php echo $detail['sektor']; ?>
        </p>
    </div>
</div><br>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Barang</th>
			<th>Jumlah</th>
			<th>Satuan</th>
			<th>Harga</th>
			<th>Subharga</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil = $koneksi->query("SELECT * FROM purchasing_barang JOIN barang ON 
		purchasing_barang.id_item = barang.id_item WHERE purchasing_barang.id_purchasing='$_GET[id]'"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['item']; ?></td>
			<td><?php echo $pecah['jumlah']; ?></td>
			<td><?php echo $pecah['satuan']; ?></td>
			<td>Rp. <?php echo number_format($pecah['harga']); ?></td>
			<td>
				Rp. <?php echo number_format($pecah['harga']*$pecah['jumlah']); ?>
			</td>
		</tr>
		<?php $nomor++; ?>
	<?php } ?>
	</tbody>
	<tfoot>
        <tr>
            <th colspan="5">Total Belanja</th>
            <th>Rp. <?php echo number_format($detail['total_pembelian']); ?> </th>
        </tr>
    </tfoot>
</table>