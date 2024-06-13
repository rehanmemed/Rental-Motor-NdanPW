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
			<h3>Data Motor</h3>
			<div class="box">
				<p><a href="tambah-motor.php" class="box-tambah">Tambah Data</a></p>
				<table border="1" cellspacing="0" class="table">
					<thead>
						<tr>
							<th width="60px">No</th>
							<th>Kategori</th>
							<th>Merk</th>
							<th width="150px">Gambar</th>
							<th>jumlah</th>
							<th>Status</th>
							<th>Desc</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no = 1;
							$motor = mysqli_query($conn, "SELECT * FROM tb_motor LEFT JOIN tb_kategori USING (kategori_id) ORDER BY motor_id DESC");
							if(mysqli_num_rows($motor) > 0){
							while($row = mysqli_fetch_array($motor)){
						?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $row['kategori_name'] ?></td>
							<td><?php echo $row['merk_motor'] ?></td>
							<td><a href="motor/<?php echo $row['motor_img'] ?>" target="_blank"> <img src="motor/<?php echo $row['motor_img'] ?>" width="50px"> </a></td>
							<td><?php echo $row['jumlah_motor']?></td>
							<td><?php echo ($row['motor_status'] == 0)? 'Ready':'Booked'; ?></td>
							<td><?php echo $row['motor_desc'] ?></td>
							<td>
								<a href="edit-motor.php?id=<?php echo $row['motor_id'] ?>">Edit</a> || <a href="proses-hapus.php?idp=<?php echo $row['motor_id'] ?>" onclick="return confirm('Yakin ingin hapus ?')">Hapus</a>
							</td>
						</tr>
						<?php }}else{ ?>
							<tr>
								<td colspan="7">Tidak ada data</td>
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