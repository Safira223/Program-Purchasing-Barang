<?php
session_start();
include 'koneksi.php';
include 'menu.php';
?>
<?php
$keyword = $_GET["keyword"];
$semudata = array();
$ambil = $koneksi->query("SELECT *FROM barang WHERE item LIKE '%$keyword%' 
    OR harga LIKE '%$keyword%'");
while($pecah = $ambil->fetch_assoc()) 
{
    $semuadata[]=$pecah;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pencarian</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
	<link rel="stylesheet" href="admin/assets/css/project.css">
    <link rel="icon" type="image/png" href="assets/images/logo/favicon-96x96.png" sizes="96x96">
</head>
<body>
<div class="container">
    <br><form action="pencarian.php" method="get" class="navbar-form navbar-right">
            <input type="text" class="form-control" name="keyword">
            <button class="btn btn-primary">Cari</button>
    </form>
    <section class="konten" style="margin-top: 100px;">
		<h2><strong>DATA BARANG</strong></h2><br><br>
		<a href="tambah.php" class="btn btn-danger">Tambah Data</a><br><br>
        <h4><strong>Hasil Pencarian : <?php echo $keyword ?></strong></h4><br>

    <?php if(empty($semuadata)): ?>
        <div class="alert alert-danger">Nama Barang <strong><?php echo $keyword ?></strong> Tidak Ditemukan</div>
    <?php endif ?>
    <div class="row">

        <?php foreach ($semuadata as $key => $value): ?>

        <div class="col-md-3">
            <div class="thumbnail">
                <img src="foto_produk/cart.jpg" alt="" class="img-responsive">
                <div class="caption">
                    <h3><?php echo $value['item']; ?></h3>
                    <h5>Rp.<?php echo number_format($value['harga']); ?></h5>
                    <a href="beli.php?id=<?php echo $value['id_item']; ?>" class="btn btn-primary">Beli</a>
						<a href="detail.php?id=<?php echo $value['id_item']; ?>" class="btn btn-warning">Detail</a>
                </div>
            </div>
        </div>

        <?php endforeach ?>
        </div>
    </div>
    </section>
</div>
</body>
</html>