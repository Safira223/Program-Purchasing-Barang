<h2>Data Barang</h2>

<br><a href="index.php?halaman=tambahbarang" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a><br><br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Satuan</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1; ?>
        <?php $ambil=$koneksi->query("SELECT *FROM barang"); ?>
        <?php while ($barang=$ambil->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $barang['item']; ?></td>
            <td><?php echo $barang['satuan']; ?></td>
            <td>Rp. <?php echo number_format ($barang['harga']); ?></td>
            <td>
                <a href="index.php?halaman=hapusbarang&id=<?php echo $barang['id_item']; ?>" 
                class="btn-danger btn"><i class="fa fa-trash-o"></i> Delete</a>
                <a href="index.php?halaman=editbarang&id=<?php echo $barang['id_item']; ?>" 
                class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>