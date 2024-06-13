<?php 
	session_start();
		if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>NdanPWMotor</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <link
      href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css" />
    <link rel="stylesheet" href="css/animate.css" />

    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="css/magnific-popup.css" />

    <link rel="stylesheet" href="css/aos.css" />

    <link rel="stylesheet" href="css/ionicons.min.css" />

    <link rel="stylesheet" href="css/bootstrap-datepicker.css" />
    <link rel="stylesheet" href="css/jquery.timepicker.css" />

    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/icomoon.css" />
    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body>
    <nav
      class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light"
      id="ftco-navbar"
    >
      <div class="container">
        <a class="navbar-brand" href="index.html">NdanPW<span>Motor</span></a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#ftco-nav"
          aria-controls="ftco-nav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="services.php" class="nav-link">Jasa</a></li>
          <li class="nav-item"><a href="motor.php" class="nav-link">Motor</a></li>
          <li class="nav-item"><a href="contact.php" class="nav-link">Kontak</a></li>
          <li class="nav-item"><a href="Keluar.php" class="nav-link">Keluar</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->

    <section
      class="hero-wrap hero-wrap-2 js-fullheight"
      style="background-image: url('images/bgg.jpg')"
      data-stellar-background-ratio="0.5"
    >
      <div class="overlay"></div>
      <div class="container">
        <div
          class="row no-gutters slider-text js-fullheight align-items-end justify-content-start"
        >
          <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs">
              <span class="mr-2"
                ><a href="index.html"
                  >Home <i class="ion-ios-arrow-forward"></i></a
              ></span>
              <span>Kontak <i class="ion-ios-arrow-forward"></i></span>
            </p>
            <h1 class="mb-3 bread">Kontak Kami</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12">
            <div class="row mb-5">
              <div class="col-md-6 mb-3">
                <div class="border w-100 p-4 rounded mb-2 d-flex">
                  <div class="icon mr-3">
                    <span class="icon-map-o"></span>
                  </div>
                  <p>
                    <span>Address:</span> Kartasura, Sukoharjo, UIN Surakarta
                  </p>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <div class="border w-100 p-4 rounded mb-2 d-flex">
                  <div class="icon mr-3">
                    <span class="icon-mobile-phone"></span>
                  </div>
                  <p>
                    <span>Phone:</span>
                    <a href="tel://1234567920">+62 82137959528</a>
                  </p>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <div class="border w-100 p-4 rounded mb-2 d-flex">
                  <div class="icon mr-3">
                    <span class="icon-envelope-o"></span>
                  </div>
                  <p>
                    <span>Email:</span>
                    <a href="mailto:info@yoursite.com">ndanpw@gmail.com</a>
                  </p>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <div class="border w-100 p-4 rounded mb-2 d-flex">
                  <div class="icon mr-3">
                    <span class="icon-whatsapp"></span>
                  </div>
                  <p><span>Whatsapp:</span> <a href="#">+62 82137959528</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
		<div class="container">
			<div class="row mb-5">
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Tentang <span>NdanPW</span></h2>
						<p>selalu ada ketika anda membutuhkan. selalu ada ketika anda butuh kendaraan. kami selalu cepat dan mudah untuk semua kebutuhan rental kendaraan.</p>
						<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
							<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4 ml-md-5">
						<h2 class="ftco-heading-2">Informasi</h2>
						<ul class="list-unstyled">
							<li><a href="#" class="py-2 d-block">Tentang Kami</a></li>
							<li><a href="#" class="py-2 d-block">Jasa</a></li>
							<li><a href="#" class="py-2 d-block">Motor</a></li>
							<li><a href="#" class="py-2 d-block">Kontak</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Apakah ada pertanyaan?</h2>
						<div class="block-23 mb-3">
							<ul>
								<li><span class="icon icon-map-marker"></span><span class="text">Kartasura, Sukoharjo, UIN Surakarta</span></li>
								<li><a href="#"><span class="icon icon-phone"></span><span class="text">+62 82137959528</span></a>
								</li>
								<li><a href="#"><span class="icon icon-envelope"></span><span
											class="text">ndanpw@gmail.com</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<p>
						Copyright &copy;
						<script>document.write(new Date().getFullYear());</script> All rights reserved | by NdanPWMotor.
					</p>
				</div>
			</div>
		</div>
	</footer>

	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-migrate-3.0.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/aos.js"></script>
	<script src="js/jquery.animateNumber.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/jquery.timepicker.min.js"></script>
	<script src="js/scrollax.min.js"></script>
	<script src="js/google-map.js"></script>
	<script src="js/main.js"></script>

</body>

</html>
