<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db.php';

if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
    exit;
}

$motor_id = $_GET['id'];
$motor = mysqli_query($conn, "SELECT * FROM tb_motor WHERE motor_id = $motor_id");
if (!$motor) {
    die("Query Error: " . mysqli_error($conn));
}
$row = mysqli_fetch_assoc($motor);

$user_id = $_SESSION['user_id'];
if (!$user_id) {
    die("User ID is not set in session.");
}

$user = mysqli_query($conn, "SELECT * FROM tb_user WHERE user_id = '$user_id'");
if (!$user) {
    die("User Query Error: " . mysqli_error($conn));
}
$p = mysqli_fetch_object($user);
if (!$p) {
    die("User not found in the database.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>NdanPWMotor</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
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
    <link rel="stylesheet" href="css/style1.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.html">NdanPW<span>Motor</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
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

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bgg.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Motor > Detail Motor <i class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">Detail Motor</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="sectionz">
        <div class="containerR">
            <div class="box1">
                <div class="col-22">
                    <img src="motor/<?php echo $row['motor_img'] ?>" width="80%" style="display: block; margin: 0 auto;">
                </div>
                <div class="col-22">
                    <br><h2 class="nama"><?php echo $row['merk_motor'] ?></h2><br>
                    <h3>Biaya Rental :</h3>
                    <p><?php echo $row['motor_desc'] ?></p>
                </div>
                <p>Silahkan transfer pada rekening di bawah ini</p>
                <p>BRI :XXXXX</p>
                <p>BNI :XXXXX</p>
                <p>Silahkan upload bukti bayar</p>
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="file" name="bukti_bayar" class="input-control" required>
                    <button type="submit" name="submit" class="btn">Submit</button>
                </form>
                <?php
                if(isset($_POST['submit'])) {
                    //echo "<pre>";
                    //var_dump($_FILES['bukti_bayar']);
                    //var_dump($_POST);
                    //echo "</pre>";

                    if(isset($_FILES['bukti_bayar']['name']) && $_FILES['bukti_bayar']['name'] != '') {
                        $target_dir = "buktibayar/";
                        $target_file = $target_dir . basename($_FILES["bukti_bayar"]["name"]);

                        if (move_uploaded_file($_FILES["bukti_bayar"]["tmp_name"], $target_file)) {
                            echo "File successfully uploaded to $target_file.<br>";

                            $admin_query = mysqli_query($conn, "SELECT * FROM tb_admin LIMIT 1");
                            if (!$admin_query) {
                                die("Admin Query Error: " . mysqli_error($conn));
                            }
                            $admin = mysqli_fetch_assoc($admin_query);
                            //var_dump($admin);

                            $insert = mysqli_query($conn, "INSERT INTO tb_sewa (bukti_bayar, motor_id, merk_motor, user_id, nama_user, kartu_identitas, telp_user) VALUES (
                                '".$target_file."',
                                '".$row['motor_id']."',
                                '".$row['merk_motor']."',
                                '".$p->user_id."',
                                '".$p->nama_user."',
                                '".$p->kartu_identitas."',
                                '".$p->telp_user."'
                            )");
                            if (!$insert) {
                                die("Insert Error: " . mysqli_error($conn));
                            } else {
                                echo '<script>alert("Data sewa berhasil disimpan.");</script>';
                            }
                        } else {
                            die("File Upload Error: " . $_FILES["bukti_bayar"]["error"]);
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>

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
                            <li><a href="#" class="py-2 d-block">Tentang</a></li>
                            <li><a href="#" class="py-2 d-block">Service</a></li>
                            <li><a href="#" class="py-2 d-block">Terms and Conditions</a></li>
                            <li><a href="#" class="py-2 d-block">Best Price Guarantee</a></li>
                            <li><a href="#" class="py-2 d-block">Privacy & Cookies Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Support</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Frequently Asked Questions</a></li>
                            <li><a href="#" class="py-2 d-block">Privacy & Terms</a></li>
                            <li><a href="#" class="py-2 d-block">Rental Terms</a></li>
                            <li><a href="#" class="py-2 d-block">Contact Us</a></li>
                            <li><a href="#" class="py-2 d-block">Site Map</a></li>
                            <li><a href="#" class="py-2 d-block">About Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Apakah ada pertanyaan?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">Kartasura, Sukoharjo, UIN Surakarta</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+62 82137959528</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">ndanpw@gmail.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>Copyright &copy;
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
