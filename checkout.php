<?php
session_start();
include 'koneksi.php';

//jika tidak ada $_SESSION["pelanggan"] (belum login)
if (!isset($_SESSION["pelanggan"])) 
{
    echo "<script>alert('Silahkan Login');</script>";
    echo "<script>location='login.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="admin/assets/css/project.css">
    <link rel="icon" type="image/png" href="assets/images/logo/favicon-96x96.png" sizes="96x96">
</head>
<body>

<?php include 'menu.php'; ?>

<section class="konten">
    <div class="container">
        <br><h3>CHECKOUT</h3><br><br>
        <table class="table table-secondary">
            <thead class="thead-dark">
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
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>No MR</label>
                    <input type="text" class="form-control" name="mr">
                </div>
                <div class="form-group">
                    <label>Tanggal MR</label>
                    <input type="date" class="form-control" name="tanggal_pembelian">
                </div><br>
            <?php $nomor=1; ?>
            <?php $totalbelanja = 0; ?>
            <?php foreach ($_SESSION['keranjang'] as $id_item => $jumlah): ?>
            <!-- menampilkan produk yg sedang diperulang berdasarkan id_produk -->
            <?php 
            $ambil = $koneksi->query("SELECT *FROM barang WHERE id_item = '$id_item'");
            $pecah = $ambil->fetch_assoc();
            $subharga = $pecah['harga']*$jumlah;
            ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $pecah['item']; ?></td>
                    <td>Rp. <?php echo number_format ($pecah['harga']); ?></td>
                    <td><?php echo $jumlah; ?></td>
					<td><?php echo $pecah['satuan']; ?></td>
                    <td>Rp. <?php echo number_format ($subharga); ?></td>
                </tr>
            <?php $nomor++; ?>
            <?php $totalbelanja+=$subharga; ?>
            <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr class="table-active">
                    <th colspan="5">Total Belanja</th>
                    <th>Rp. <?php echo number_format($totalbelanja); ?> </th>
                </tr>
            </tfoot>
        </table><br>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan'] ?>" class="form-control" >
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Masukkan Nama Departemen" name="dep">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
        		        <select name="sektor" class="form-control" required>
            	            <option value="">--Pilih Sektor--</option>
				            <option value="P">P</option>
				            <option value="E">E</option>
			            </select>
    		</div>
                </div>
            </div>
        <br><button class="btn btn-info" name="checkout">Submit</button>
        </form>
        <?php
        if(isset($_POST["checkout"]))
        {
            $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
            
            //1. menyimpan data ke tabel pembelian
            $koneksi->query("INSERT INTO purchasing (id_pelanggan,mr,tanggal_pembelian,total_pembelian,dep,sektor)
                VALUES ('$id_pelanggan','$_POST[mr]','$_POST[tanggal_pembelian]','$totalbelanja','$_POST[dep]','$_POST[sektor]')");

            //2. mendapatkan id_pembelian barusan terjadi
            $id_pembelian_barusan = $koneksi->insert_id;

            foreach ($_SESSION ["keranjang"] as $id_item => $jumlah) 
            {
                $koneksi->query("INSERT INTO purchasing_barang (id_purchasing,id_item,jumlah)
                VALUES ('$id_pembelian_barusan','$id_item','$jumlah')");
            }

            //3. Mengkosongkan keranjang belanja
            unset($_SESSION["keranjang"]);

            //4. Tampilan dialihkan ke halaman nota, nota dari pembelian yang barusan
            echo "<script>alert('checkout sukses');</script>";
            echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
        }

        ?>

    </div>
</section>
</body>
</html>