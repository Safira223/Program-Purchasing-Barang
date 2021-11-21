<!DOCTYPE html>
<html lang="en">
<head>
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
	<link rel="icon" type="image/png" href="assets/images/logo/favicon-96x96.png" sizes="96x96">
    <!--<link rel="stylesheet" href="assets/css/style.min.css">-->
</head>
<body>
<div class="main-wrapper bg-white">
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




<!-- navbar
<nav class="navbar navbar-default">
	<div class="container">

		<ul class="nav navbar-nav">
			<li><a href="index.php">Home</a></li>
			<li><a href="belanja.php">Belanja</a></li>
			<li><a href="keranjang.php">Keranjang</a></li>
			<?php if (isset($_SESSION["pelanggan"])): ?>
				<li><a href="riwayat.php">Riwayat Belanja</a></li>
				<li><a href="logout.php">Logout</a></li>
		
			<?php else: ?>
			<li><a href="login.php">Login</a></li>
			<?php endif  ?>
			
		</ul>
	</div>
</nav> -->