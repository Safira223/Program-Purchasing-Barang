<h2>Edit Barang</h2><br><br>
<?php
$ambil=$koneksi->query("SELECT *FROM barang WHERE id_item='$_GET[id]'");
$barang=$ambil->fetch_assoc();
?>

<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama Produk</label>
        <input type="text" name="nama" class="form-control" 
        value="<?php echo $barang['item']; ?>">
    </div>
    <div class="form-group">
        <label>Nama Produk</label>
        <input type="text" name="satuan" class="form-control" 
        value="<?php echo $barang['satuan']; ?>">
    </div>
    <div class="form-group">
        <label>Harga</label>
        <input type="text" name="harga" class="form-control" 
        value="<?php echo $barang['harga']; ?>">
    </div>
    <button class="btn btn-primary" name="simpan">Simpan</button>
</form>

<?php
    if (isset($_POST['simpan']))
    {
        $koneksi->query("UPDATE barang SET item='$_POST[nama]',
        harga='$_POST[harga]'
        WHERE id_item='$_GET[id]'");

    echo "<script>alert('data barang telah diedit'); </script>";
    echo "<script>location='index.php?halaman=barang';</script>";
    }
?>
