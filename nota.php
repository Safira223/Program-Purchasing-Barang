<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Detail Pembelian</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="admin/assets/css/project.css">
    <link rel="icon" type="image/png" href="assets/images/logo/favicon-96x96.png" sizes="96x96">
</head>
<body>

<?php include 'menu.php'; ?>

<section class="konten">
    <div class="container">
    <br><h3>DETAIL PURCHASING</h3><br><br>
<?php 
$ambil = $koneksi->query("SELECT *FROM purchasing JOIN pelanggan
    ON purchasing.id_pelanggan=pelanggan.id_pelanggan 
    WHERE purchasing.id_purchasing='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

<!-- Jika pelanggan yg beli tidak sama dengan pelanggan yg login, maka dilarikan ke riwayat 
agar nota orang lain tidak terlihat -->
<!-- pelanggan yg beli harus pelanggan yg login -->
<?php
//mendapatkan id_pelanggan yg beli
$id_pelanggan_beli = $detail["id_pelanggan"];
//mendapatkan id_pelanggan yg login
$id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];

if ($id_pelanggan_beli !== $id_pelanggan_login)
{
    echo "<script>alert('login dulu');</script>";
    echo "<script>location='riwayat.php';</script>";
    exit();
}
?>


<div class="row">
    <div class="col-md-4">
    <h4>Data MR</h4>
        <strong>No. MR : <?php echo $detail['mr']; ?></strong><br>
        <p>
            Tanggal MR : <?php echo $detail['tanggal_pembelian']; ?><br>
            Total Pembelian : Rp. <?php echo number_format($detail['total_pembelian']); ?>
        </p>
    </div>
    <div class="col-md-4">
    <h4>Data Pengirim</h4>
        <strong>Nama Cabang : <?php echo $detail['nama_pelanggan']; ?></strong><br>
        <p>
            Nama Departemen : <?php echo $detail['dep']; ?><br>
            Sektor : <?php echo $detail['sektor']; ?>
        </p>
    </div>
</div><br>
<table class="table table-secondary">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Satuan</th>
            <th>Harga</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1; ?>
        <?php $ambil = $koneksi->query("SELECT *FROM purchasing_barang JOIN barang
        ON purchasing_barang.id_item=barang.id_item
        WHERE purchasing_barang.id_purchasing='$_GET[id]'"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['item']; ?></td>
            <td><?php echo $pecah['jumlah']; ?></td>
            <td><?php echo $pecah['satuan']; ?></td>
            <td><?php echo $pecah['harga']; ?></td>
     
            <td>Rp. <?php echo number_format ($pecah['harga']*$pecah['jumlah']); ?>
            </td>
        </tr>
        <?php $nomor++ ?>
        <?php }; ?>
    </tbody>
    <tfoot>
        <tr class="table-active">
            <th colspan="5">Total Belanja</th>
            <th>Rp. <?php echo number_format($detail['total_pembelian']); ?> </th>
        </tr>
    </tfoot>
</table>
<br>
<div class="row">
    <div class="col-md-7">
        <div class="alert alert-info">
            <p>
                Apabila terjadi kesalahan dalam input data, silahkan hubungi kantor pusat PT. Mentari Laju Jaya Usaha melalui : <br>
                <strong> Tel : +6221 2751 5827 <br>
                Fax: +6221 2751 5675</strong>
            </p>
        </div>
    </div>
</div>
    </div>
</section>
</body>
</html>