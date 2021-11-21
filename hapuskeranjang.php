<?php  
session_start();
$id_item = $_GET["id"];
unset($_SESSION["keranjang"][$id_item]);

echo "<script>alert('Produk Telah Dihapus dari Keranjang');</script>";
echo "<script>location='keranjang.php';</script>";
?>