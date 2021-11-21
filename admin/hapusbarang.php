<?php

$koneksi->query("DELETE FROM barang WHERE id_item='$_GET[id]'");

echo "<script>alert('data terhapus'); </script>";
echo "<script>location='index.php?halaman=barang';</script>";
?>
