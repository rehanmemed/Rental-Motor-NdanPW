<?php 
	session_start();
	if ($_SESSION['status_login'] != true) {
		echo '<script>window.location="login.php"</script>';
	}
	include 'db.php';
	$motor = mysqli_query($conn, "SELECT * FROM tb_motor LEFT JOIN tb_kategori USING (kategori_id) ORDER BY motor_id DESC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>NdanPWMotor</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
		rel="stylesheet">

	<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.css">

	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/aos.css">

	<link rel="stylesheet" href="css/ionicons.min.css">

	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">

	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.html">NdanPW<span>Motor</span></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
				aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
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
	<div class="hero-wrap" data-stellar-background-ratio="0.5" style="background-image: url(images/bgg.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
				<div class="col-lg-8 ftco-animate">
					<div class="text w-100 text-center mb-md-5 pb-md-5">
						<h1 class="mb-4">Cepat &amp; Mudah untuk Rental Kendaraan</h1>
						<p style="font-size: 18px;">selalu ada ketika anda membutuhkan. selalu ada ketika anda butuh kendaraan. kami selalu cepat dan mudah untuk semua kebutuhan rental kendaraan.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<section class="ftco-section ftco-no-pt bg-light">
		<div class="container">
			<div class="row no-gutters">
				<div class="col-md-12	featured-top">
					<div class="row justify-content-center no-gutters">
						<div class="col-md-10 d-flex align-items-center">
							<div class="services-wrap rounded-right w-100">
								<h3 class="heading-section text-center mb-4">Cara Lebih Baik untuk Menyewa Motor</h3>
								<div class="row d-flex mb-4">
									<div class="col-md-4 d-flex align-self-stretch ftco-animate">
										<div class="services w-100 text-center">
											<div class="icon d-flex align-items-center justify-content-center"><span
													class="flaticon-route"></span></div>
											<div class="text w-100">
												<h3 class="heading mb-2">Pilih Lokasi Penjemputan</h3>
											</div>
										</div>
									</div>
									<div class="col-md-4 d-flex align-self-stretch ftco-animate">
										<div class="services w-100 text-center">
											<div class="icon d-flex align-items-center justify-content-center"><span
													class="flaticon-handshake"></span></div>
											<div class="text w-100">
												<h3 class="heading mb-2">Pilih Motor terbaik</h3>
											</div>
										</div>
									</div>
									<div class="col-md-4 d-flex justify-content-center align-self-stretch ftco-animate">
										<div class="services w-100 text-center">
											<div class="icon d-flex align-items-center justify-content-center"><span
													class="flaticon-route"></span></div>
											<div class="text w-100 text-center mx-auto m-auto">
												<h3 class="heading mb-2 text-center">Pesan Rental Motor Anda</h3>
											</div>
										</div>
									</div>
								</div>
								<p class="text-center mt-5"><a href="motor.php"
										class="btn text-center mx-auto m-auto ml-auto btn-primary py-3 px-4">Booking Rental Motor Sekarang Juga</a>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
	</section>


	<section class="ftco-section ftco-no-pt bg-light">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 heading-section text-center ftco-animate mb-5">
					<span class="subheading">Apa yang kita tawarkan</span>
					<h2 class="mb-2">Motor Terbaik</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="carousel-car owl-carousel">
						<?php 
						$motor = mysqli_query($conn, "SELECT * FROM tb_motor LEFT JOIN tb_kategori USING (kategori_id) ORDER BY motor_id DESC");
						if (mysqli_num_rows($motor) > 0) {
							while ($row = mysqli_fetch_array($motor)) {
						?>	
						<div class="car-wrap rounded ftco-animate">
							<a href="motor.php?id=<?php echo $row['motor_id'] ?>" class="img d-flex align-items-end" style="background-image: url('motor/<?php echo $row['motor_img'] ?>');">
							</a>
              			<div class="price-wrap d-flex">
									<p><h4><?php echo $row['merk_motor'] ?></h4></p> 
								</div>
						</div>
						<?php }} else { ?>
						<p>Motor Tidak Tersedia</p>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section ftco-about">
		<div class="container">
			<div class="row no-gutters">
				<div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center"
					style="background-image: url(images/tentang.jpg);">
				</div>
				<div class="col-md-6 wrap-about ftco-animate">
					<div class="heading-section heading-section-white pl-md-5">
						<span class="subheading">Tentang Kami</span>
						<h2 class="mb-4">Welcome to NdanPWMotor</h2>

						<p>NdanPWMotor adalah solusi rental motor terbaik, menawarkan motor berkualitas yang terawat dengan layanan antar jemput praktis. Pesan sekarang dan nikmati perjalanan nyaman dan aman.</p>
						<p>Memilih NdanPWMotor berarti Anda memilih kualitas, kenyamanan, dan pelayanan terbaik. Dengan pengalaman dan dedikasi kami dalam industri rental motor, kami selalu siap memenuhi kebutuhan mobilitas Anda dengan solusi yang praktis dan efisien. Bergabunglah dengan ribuan pelanggan yang telah mempercayakan kebutuhan rental motornya kepada kami. Hubungi kami sekarang dan nikmati pengalaman berkendara yang luar biasa bersama NdanPWMotor. Alamat kami di Kartasura, Sukoharjo, UIN Surakarta, atau hubungi kami melalui telepon di +62 82137959528 atau email di ndanpw@gmail.com. Ikuti juga kami di Twitter, Facebook, dan Instagram untuk update terbaru dan penawaran spesial. NdanPWMotor - Selalu ada ketika Anda membutuhkan, selalu ada untuk kebutuhan kendaraan Anda.</p>
						<p><a href="motor.php" class="btn btn-primary py-3 px-4">Booking Sekarang</a></p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 heading-section text-center ftco-animate mb-5">
					<span class="subheading">Jasa</span>
					<h2 class="mb-2">Layanan Kami</h2>
				</div>
			</div>
			<div class="row d-flex">
				<div class="col-md-3 d-flex align-self-stretch ftco-animate">
					<div class="services services-1 color-1">
						<div class="icon d-flex align-items-center justify-content-center"><span
								class="flaticon-route"></span></div>
						<div class="media-body">
							<h3 class="heading mb-3">Ambil Ditempat</h3>
							<p>Ambil motor langsung ke tempat penyewaan.</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 d-flex align-self-stretch ftco-animate">
					<div class="services services-1 color-2">
						<div class="icon d-flex align-items-center justify-content-center"><span
								class="flaticon-handshake"></span></div>
						<div class="media-body">
							<h3 class="heading mb-3">Jaminan Mudah</h3>
							<p>Jaminan penyewaan mudah hanya dengan salah satu idenditas.</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 d-flex align-self-stretch ftco-animate">
					<div class="services services-1 color-3">
						<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-handshake"></span>
						</div>
						<div class="media-body">
							<h3 class="heading mb-3">Booking Mudah</h3>
							<p>Booking dapat dilakukan diwebsite dengan mudah.</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 d-flex align-self-stretch ftco-animate">
					<div class="services services-1 color-4">
						<div class="icon d-flex align-items-center justify-content-center"><span
								class="flaticon-route"></span></div>
						<div class="media-body">
							<h3 class="heading mb-3">Antar Jemput</h3>
							<p>Antar jemput motor untuk customer yg jauh ketempat penyewaan.</p>
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
						<h2 class="ftco-heading-2">Informaasi</h2>
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
