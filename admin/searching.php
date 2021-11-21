<?php
$koneksi = new mysqli("localhost","root","","data_mr");

           
$keyword = $_GET["keyword"];
$all = array();
$nomor=1;
$ambil = $koneksi->query("SELECT *FROM purchasing  JOIN pelanggan  ON purchasing.id_pelanggan=pelanggan.id_pelanggan 
    WHERE mr LIKE '%$keyword%' OR tanggal_pembelian LIKE '%$keyword%'");
while($barang = $ambil->fetch_assoc()) 
{
    $all[]=$barang;
}
?>

<html>
<head>
    <title>Data Purchasing</title>
</head>
<body>
<h2>Data Purchasing</h2><br><br>

<form action="layout.php" method="get">
    <div class="col-md-3">
        <input type="text" class="form-control" name="keyword">
    </div>
    <button class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
</form><br>

    <h4><strong>Hasil Pencarian : <?php echo $keyword ?></strong></h4><br>
    <?php if(empty($all)): ?>
        <div class="alert alert-danger">Produk <strong><?php echo $keyword ?></strong> Tidak Ditemukan</div>
    <?php endif ?>

<table class="table table-bordered">
    <thead>
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
    <?php foreach ($all as $key => $value): ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $value['mr']; ?></td>
            <td><?php echo $value['nama_pelanggan']; ?></td>
            <td><?php echo $value['tanggal_pembelian']; ?></td>
            <td><?php echo $value['status_pembelian']; ?></td>
            <td>
                <a href="index.php?halaman=detail&id=<?php echo $value['id_purchasing']; ?>" class="btn btn-info"><i class="fa fa-check-square-o"></i> Detail</a>

                <?php if ($value['status_pembelian']!=="pending"): ?>
                <a href="index.php?halaman=pembayaran&id= <?php echo $value['id_purchasing']; ?>" class="btn btn-success"><i class="fa fa-book"></i> Nota Pembayaran</a>
                <?php endif ?>
                
                <a href="tampilan.php?halaman=cetak&id=<?php echo $pecah['id_purchasing']; ?>" 
				class="btn btn-danger" target="_blank"><i class="fa fa-print"></i> Print</a>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php endforeach ?>
    </tbody>
</table>
</div>
</body>
</html>


