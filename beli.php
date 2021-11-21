<?php
session_start();

$id_item = $_GET['id'];


if(isset($_SESSION['keranjang'][$id_item]))
{
	$_SESSION['keranjang'][$id_item]+=1;
}

else
{
	$_SESSION['keranjang'][$id_item] = 1;	
}

//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";

echo "<script>alert('barang telah masuk ke keranjang belanja');</script>";
echo "<script>location='keranjang.php'; </script>";
?>