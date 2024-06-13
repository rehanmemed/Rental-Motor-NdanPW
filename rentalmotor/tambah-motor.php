<?php
session_start();
include 'db.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NdanPW</title>
    <link rel="stylesheet" type="text/css" href="css/style1.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
</head>
<body>
<!-- header -->
<header>
    <div class="container">
        <h1><a href="dashboard.php">NdanPW</a></h1>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="profil.php">Profil</a></li>
            <li><a href="data-motor.php">Motor</a></li>
            <li><a href="data-kategori.php">Kategori</a></li>
            <li><a href="data-sewa.php">Sewa</a></li>
            <li><a href="keluar.php">Keluar</a></li>
        </ul>
    </div>
</header>

<!-- content -->
<div class="section">
    <div class="container">
        <h3>Tambah Data Motor</h3>
        <div class="box">
            <form action="" method="POST" enctype="multipart/form-data">
                <select class="input-control" name="kategori" required>
                    <option value="">--Pilih--</option>
                    <?php
                    $kategori = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY kategori_id DESC");
                    while ($r = mysqli_fetch_array($kategori)) {
                        ?>
                        <option value="<?php echo $r['kategori_id'] ?>"><?php echo $r['kategori_name'] ?></option>
                    <?php } ?>
                </select>

                <input type="text" name="merk_motor" class="input-control" placeholder="merk motor" required>
                <input type="file" name="motor_img" class="input-control" required>
                <input type="text" name="jumlah_motor" class="input-control" placeholder="jumlah motor" required>
                <textarea class="input-control" name="motor_desc" placeholder="Deskripsi" required></textarea><br>
                <select class="input-control" name="status">
                    <option value="">--Pilih--</option>
                    <option value="1">Booked</option>
                    <option value="0">Ready</option>
                </select>
                <button type="submit" name="submit" class="btn">Submit</button>
            </form>
            <?php
            if (isset($_POST['submit'])) {
                // Menampung inputan dari form
                $kategori = $_POST['kategori'];
                $merk_motor = $_POST['merk_motor'];
                $motor_desc = $_POST['motor_desc'];
                $jumlah_motor = $_POST['jumlah_motor'];
                $motor_status = $_POST['motor_status'];

                // Menampung data file yang diupload
                $filename = $_FILES['motor_img']['name'];
                $tmp_name = $_FILES['motor_img']['tmp_name'];

                $type1 = explode('.', $filename);
                $type2 = $type1[1];

                $motor_img = 'motor' . time() . '.' . $type2;

                // Menampung data format file yang diizinkan
                $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                // Validasi format file
                if (!in_array($type2, $tipe_diizinkan)) {
                    // Jika format file tidak ada di dalam tipe diizinkan
                    echo '<script>alert("Format file tidak diizinkan")</script>';
                } else {
                    // Jika format file sesuai dengan yang ada di dalam array tipe diizinkan
                    // Proses upload file
                    move_uploaded_file($tmp_name, './motor/' . $motor_img);

                    $insert = mysqli_query($conn, "INSERT INTO tb_motor (kategori_id, merk_motor, motor_desc, motor_img, motor_status) VALUES (
                        '$kategori',
                        '$merk_motor',
                        '$motor_desc',
                        '$motor_img',
                        '$motor_status'
                    )");

                    if ($insert) {
                        echo '<script>alert("Tambah data berhasil")</script>';
                        echo '<script>window.location="data-motor.php"</script>';
                    } else {
                        echo 'gagal ' . mysqli_error($conn);
                    }
                }
            }
            ?>
        </div>
    </div>
</div>

<!-- footer -->
<footer>
    <div class="container">
        <small>Copyright © 2024 All rights reserved | by NdanPWMotor.</small>
    </div>
</footer>
<script>
    CKEDITOR.replace('motor_desc');
</script>
</body>
</html>
