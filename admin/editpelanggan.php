<h2>Edit Cabang</h2><br><br>
<?php
$ambil=$koneksi->query("SELECT *FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
?>

<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama Cabang</label>
        <input type="text" name="nama" class="form-control" 
        value="<?php echo $pecah['nama_pelanggan']; ?>">
    </div>
    <div class="form-group">
        <label>Email Cabang</label>
        <input type="text" name="email" class="form-control" 
        value="<?php echo $pecah['email_pelanggan']; ?>">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="text" name="pass" class="form-control" 
        value="<?php echo $pecah['password_pelanggan']; ?>">
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" 
        value="<?php echo $pecah['alamat']; ?>">
    </div>
    <button class="btn btn-primary" name="simpan">Simpan</button>
</form>

<?php
    if (isset($_POST['simpan']))
    {
        $koneksi->query("UPDATE pelanggan SET nama_pelanggan='$_POST[nama]',
        email_pelanggan='$_POST[email]',password_pelanggan='$_POST[pass]',alamat='$_POST[alamat]'
        WHERE id_pelanggan='$_GET[id]'");

    echo "<script>alert('data cabang telah diedit'); </script>";
    echo "<script>location='index.php?halaman=pelanggan';</script>";
    }
?>
