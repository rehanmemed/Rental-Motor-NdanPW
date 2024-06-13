<?php 
	session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
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
        <h3>Data Sewa</h3>
        <div class="box">
           
            <table border="1" cellspacing="0" class="table">
                <thead>
                    <tr>
                        <th width="60px">No</th>
                        <th>Bukti Bayar</th>
                        <th>Motor ID</th>
                        <th width="150px">Merk Motor</th>
                        <th>User ID</th>
                        <th>Nama User</th>
                        <th>Sewa ID</th>
                        <th>No Telepon</th>
                        <th>Kartu Identitas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        $sewa = mysqli_query($conn, "SELECT * FROM tb_sewa ORDER BY sewa_id DESC");
                        if(mysqli_num_rows($sewa) > 0){
                            while($row = mysqli_fetch_assoc($sewa)){
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><a href="<?php echo $row['bukti_bayar'] ?>" target="_blank">Lihat</a></td>
                        <td><?php echo $row['motor_id'] ?></td>
                        <td><?php echo $row['merk_motor'] ?></td>
                        <td><?php echo $row['user_id'] ?></td>
                        <td><?php echo $row['nama_user'] ?></td>
                        <td><?php echo $row['sewa_id'] ?></td>
                        <td><?php echo $row['telp_user'] ?></td>
                        <td><a href="<?php echo $row['kartu_identitas'] ?>" target="_blank">Lihat</a></td>
                    </tr>
                    <?php 
                            }
                        } else {
                    ?>
                    <tr>
                        <td colspan="9">Tidak ada data</td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


	<!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright © 2024 All rights reserved | by NdanPWMotor.</small>
		</div>
	</footer>
</body>
</html>