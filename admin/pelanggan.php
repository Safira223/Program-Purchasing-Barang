<h2>Data Cabang</h2>

<br><a href="index.php?halaman=tambahpelanggan" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a><br><br>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Cabang</th>
			<th>Email Cabang</th>
			<th>Alamat</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil = $koneksi->query("SELECT * FROM pelanggan"); ?>
		<?php while($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_pelanggan']; ?></td>
			<td><?php echo $pecah['email_pelanggan']; ?></td>
			<td><?php echo $pecah['alamat']; ?></td>
			<td>
				<a href="index.php?halaman=hapuspelanggan&id=<?php echo $pecah['id_pelanggan']; ?>"
				class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</a>
				<a href="index.php?halaman=editpelanggan&id=<?php echo $pecah['id_pelanggan']; ?>" 
                class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
			</td>
		</tr>
		<?php $nomor++; ?>
	<?php } ?>
	</tbody>
</table>