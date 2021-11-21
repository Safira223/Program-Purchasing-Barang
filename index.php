<?php
session_start();
include 'koneksi.php';
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Mentari Group</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="assets/images/logo/favicon-96x96.png" sizes="96x96">


    <!-- CSS ====================================== -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="assets/css/vendor/ionicons.min.css">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/css/plugins/slick.css">
    <link rel="stylesheet" href="assets/css/plugins/animation.css">
    <link rel="stylesheet" href="assets/css/plugins/jqueryui.min.css">

    <!-- Vendor & Plugins CSS (Please remove the comment from below vendor.min.css & plugins.min.css for better website load performance and remove css files from avobe) -->
 
    <!-- Main Style CSS (Please use minify version for better website load performance) -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!--<link rel="stylesheet" href="assets/css/style.min.css">-->

</head>

<body>

    <div class="main-wrapper">

        <header class="fl-header">

            <!-- header bottom Start -->
            <div class="header-bottom-area header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-4 col-5">
                            <div class="logo-area">
                                <a href="index.html"><img src="assets/images/logo/logo.png" width="50%" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-8 d-none d-lg-block">
                            <div class="main-menu-area text-center">
                                <!--  Start Mainmenu Nav-->
                                <nav class="main-navigation">
                                    <ul>
                                        <li class="active"><a href="index.php">Home</a>
                                        </li>
                                        <li><a href="belanja.php">Belanja</a>
                                        </li>
                                        <?php if (isset($_SESSION["pelanggan"])): ?>
                                            <li><a href="riwayat.php">Riwayat Belanja</a></li>
                                            <li><a href="logout.php">Logout</a></li>
                                    
                                        <?php else: ?>
                                            <li><a href="login.php">Login</a></li>
                                        <?php endif  ?>
                                        
                                        <li><a href="admin/login.php">Admin</a></li>
                                    </ul>
                                </nav>

                            </div>
                        </div>

                        <div class="col-lg-2 col-md-8 col-7">
                            <div class="right-blok-box d-flex">
                                <div class="shopping-cart-wrap">
                                    <a href="#"><i class="ion-ios-cart-outline"></i></a>
                                    <ul class="mini-cart">
                                        <li class="mini-cart-btns">
                                            <div class="cart-btns">
                                                <a href="keranjang.php">Lihat Keranjang</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="mobile-menu-btn d-block d-lg-none">
                                    <div class="off-canvas-btn">
                                        <i class="ion-android-menu"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header bottom End -->
        </header>


        <!-- Hero Section Start -->
        <div class="hero-slider hero-slider-one">

            <!-- Single Slide Start -->
            <div class="single-slide" style="background-image: url(assets/images/slider/slide-bg-1.jpg)">
                <!-- Hero Content One Start -->
                <div class="hero-content-one container">
                    <div class="row">
                        <div class="col-lg-10 col-md-10">
                            <div class="slider-text-info">
                                <h2>Sejarah <span>Perusahaan</span> </h2>
                                <p style="max-width: max-content;">Mentari Group didirikan tahun 2012 dengan diawali dengan usaha perdagangan gula, molasses dan hasil pertanian, dikukuhkan dengan Akte Pendirian Notaris no.3 tanggal 4 Desember 2012 dan Surat Keputusan Menteri Kehakiman No.AHU-04234.AH.01.01.Tahun 2013. Mentari Group berkembang dalam bidang kelapa sawit dimulai dengan mendirikan Pabrik Pengolahan Kelapa Sawit di Selensen, Riau pada tahun 2014, dan kemudian mengakuisisi Perusahaan Perkebunan dan Pengolahan Kelapa Sawit di Kapuas, Kalimantan Tengah pada tahun 2017 dan Pabrik
Pengolahan Kelapa Sawit di Merangin, Jambi. Bisnis lain yang sedang dikembangkan selaras dengan bidang perkebunan dan pengolahan Sawit adalah pabrik pupuk, refinery dan bulking station di daerah Talang Dukuh Jambi dan Pulang Pisau untuk kedepannya.</p>                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Hero Content One End -->
            </div>
            <!-- Single Slide End -->


            <!-- Single Slide Start -->
            <div class="single-slide" style="background-image: url(assets/images/slider/slide-bg-2.jpg)">
                <!-- Hero Content One Start -->
                <div class="hero-content-one container">
                    <div class="row">
                        <div class="col-lg-10 col-md-10">
                            <div class="slider-text-info">
                                <h2>Visi <span>Perusahaan</span> </h2>
                                <p>Menjadi Perusahaan terbaik dalam Perdagangan, Logistik dan Industri berbasis perkebunan sawit yang unggul dalam kompetisi global.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Hero Content One End -->
            </div>
            <!-- Single Slide End -->


            <!-- Single Slide Start -->
            <div class="single-slide" style="background-image: url(assets/images/slider/slide-bg-3.jpg)">
                <!-- Hero Content One Start -->
                <div class="hero-content-one container">
                    <div class="row">
                        <div class="col-lg-10 col-md-10">
                            <div class="slider-text-info">
                                <h2>Misi <span>Perusahaan</span> </h2>
                                <ol>
                                    <li> Perusahaan berdasarkan kaidah Good Corporate Governance yang taat pada ketentuan Hukum untuk kesejahteraan Stakeholders (Para Pemangku Kepentingan).</li>
                                    <li>Mengelola Sumber Daya yang dikelola berdasarkan kaidah: Best Practices Management untuk menghasilkan Produk Berkualitas dan Kompetitif.</li>
                                    <li>Mengedukasi sumber daya manusia serta meningkatkan pengetahuan dan kecakapan di bidangnya.</li>
                                    <li>Membangun Sinergi dengan lingkungan usaha khususnya masyarakat di sekitar.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Hero Content One End -->
            </div>
            <!-- Single Slide End -->
        </div>
        <!-- Hero Section End -->



        <footer>
            <div class="footer-top section-pb section-pt-60">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="widget-footer mt-30">
                                <h6 class="title-widget">CONTACT US</h6>
                                <ul class="footer-contact">
                                    <li>
                                        <label>Phone</label>
                                        <a href="#">+6221-27515827</a>
                                    </li>
                                    <li>
                                        <label>Email</label>
                                        <a href="#">contact@mentarigroup.co.id</a>
                                    </li>       
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="widget-footer mt-30">
                                <ul class="footer-contact">
                                    <li>
                                        <label>Head Office</label>
                                        Jalan Ciputat Raya No. 14 <br> Kebayoran Lama, Jakarta Selatan 12240
                                    </li>
                                    <li>
                                        <label>Operating Office</label>
                                        Plaza Simatupang, Jalan TB Simatupang Kavling IS-1 Pondok Pinang <br> Kebayoran Lama, Jakarta Selatan 12310
                                    </li>
                                </ul>
                            </div>
                        </div>

                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="copy-right-text text-center">
                                <p>Copyright &copy; 2020. All Right Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- JS ============================================ -->

    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>

    <!-- Slick Slider JS -->
    <script src="assets/js/plugins/slick.min.js"></script>
    <!--  Jquery ui JS -->
    <script src="assets/js/plugins/jqueryui.min.js"></script>
    <!--  Scrollup JS -->
    <script src="assets/js/plugins/scrollup.min.js"></script>
    <script src="assets/js/plugins/ajax-contact.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

</body>
</html>