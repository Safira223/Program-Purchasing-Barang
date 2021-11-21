﻿<?php
session_start();
$koneksi = new mysqli("localhost","root","","data_mr");

if (!isset($_SESSION['admin']))
{
    echo "<script>alert('anda harus login');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}
?>
<?php
$tanggal = date ("Y-m-d");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mentari Group</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <link rel="icon" type="image/png" href="assets/images/logo/favicon-96x96.png" sizes="96x96">
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin Mentari</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 55px;
float: right;
font-size: 18px;"> Last Access : 10 Agustus 2020 &nbsp; <a href="index.php?halaman=logout" class="btn btn-danger square-btn-adjust"><i class="fa fa-sign-out"></i> Logout</a></div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/logo.png" class="user-image img-responsive"/>
					</li>
                    <li><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
                    <li><a href="index.php?halaman=barang"><i class="fa fa-tags"></i>Barang</a></li>
                    <li><a href="index.php?halaman=purchasing"><i class="fa fa-shopping-cart"></i>Purchasing</a>
                    </li>
                    <li><a href="index.php?halaman=pelanggan"><i class="fa fa-user"></i>Cabang</a>
                    </li>
                </ul>
            </div>
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
            <?php
                if (isset($_GET['halaman']))
                {
                    if ($_GET ['halaman']=="barang")
                    {
                        include 'barang.php';
                    }
                    elseif ($_GET['halaman']=="purchasing")
                    {
                        include 'purchasing.php';
                    }
                    elseif ($_GET['halaman']=="pelanggan") 
                    {
                        include 'pelanggan.php';
                    }
                    elseif ($_GET['halaman']=="detail")
                    {
                        include 'detail.php';
                    }
                    elseif ($_GET['halaman']=="tambahbarang")
                    {
                        include 'tambahbarang.php';
                    }
                    elseif ($_GET['halaman']=="tambahpelanggan")
                    {
                        include 'tambahpelanggan.php';
                    }
                    elseif ($_GET['halaman']=="hapusbarang")
                    {
                        include 'hapusbarang.php';
                    }
                    elseif ($_GET['halaman']=="hapuspelanggan")
                    {
                        include 'hapuspelanggan.php';
                    }
                    elseif ($_GET['halaman']=="editbarang")
                    {
                        include 'editbarang.php';
                    }
                    elseif ($_GET['halaman']=="editpelanggan")
                    {
                        include 'editpelanggan.php';
                    }
                    elseif ($_GET['halaman']=="logout") 
                    {
                        include 'logout.php';
                    } 
                    elseif ($_GET['halaman']=="pembayaran") 
                    {
                        include 'pembayaran.php';
                    }
                } 
                else
                {
                    include 'home.php';
                }
                ?>
            </div>     
            <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
            </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- MORRIS CHART SCRIPTS -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
</body>
</html>