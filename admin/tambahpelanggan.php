<h2>Tambah Data Cabang</h2>
      
<form method="POST" encytpe="multipart/form-data">
    <div class="form-group">
        <label>Nama Cabang</label>
        <input type="text" class="form-control" name="nama">
    </div>
    <div class="form-group">
        <label>Email Cabang</label>
        <input type="text" class="form-control" name="email">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="text" class="form-control" name="pass">
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <textarea class="form-control" name="alamat" rows="10"></textarea>
    </div>
    <button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php
    if (isset($_POST['save']))
    {
        $koneksi->query("INSERT INTO pelanggan (nama_pelanggan,email_pelanggan,password_pelanggan,alamat)
        VALUES('$_POST[nama]','$_POST[email]','$_POST[pass]','$_POST[alamat]')");

        echo "<div class='alert alert-info'>Data Tersimpan</div>";
        echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pelanggan'>";
    }
?>
