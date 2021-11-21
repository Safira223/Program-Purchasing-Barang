<h2>Tambah Data Barang</h2><br><br>
      
<form method="POST" encytpe="multipart/form-data">
    <div class="form-group">
        <label>Nama Barang</label>
        <input type="text" class="form-control" name="nama">
    </div>
    <div class="form-group">
        <label>Satuan</label>
        <input type="text" class="form-control" name="satuan">
    </div>
    <div class="form-group">
        <label>Harga</label>
        <input type="text" class="form-control" name="harga">
    </div>
    <button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php
    if (isset($_POST['save']))
    {
        $koneksi->query("INSERT INTO barang (item,satuan,harga)
        VALUES('$_POST[nama]','$_POST[satuan]','$_POST[harga]')");

        echo "<div class='alert alert-info'>Data Tersimpan</div>";
        echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=barang'>";
    }
?>
