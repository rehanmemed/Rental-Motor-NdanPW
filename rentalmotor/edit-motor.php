<?php 
	session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
	}

	$motor = mysqli_query($conn, "SELECT * FROM tb_motor WHERE motor_id = '".$_GET['id']."' ");
	if(mysqli_num_rows($motor) == 0){
		echo '<script>window.location="data-motor.php"</script>';
	}
	$p = mysqli_fetch_object($motor);
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
			<h3>Edit Data Motor</h3>
			<div class="box">
				<form action="" method="POST" enctype="multipart/form-data">
					<select class="input-control" name="kategori" required>
						<option value="">--Pilih--</option>
						<?php 
							$kategori = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY kategori_id DESC");
							while($r = mysqli_fetch_array($kategori)){
						?>
						<option value="<?php echo $r['kategori_id'] ?>" <?php echo ($r['kategori_id'] == $p->kategori_id)? 'selected':''; ?>><?php echo $r['kategori_name'] ?></option>
						<?php } ?>
					</select>

					<input type="text" name="nama" class="input-control" placeholder="Merk Motor" value="<?php echo $p->merk_motor ?>" required>
					
					
					<img src="motor/<?php echo $p->motor_img ?>" width="100px">
					<input type="hidden" name="foto" value="<?php echo $p->motor_img ?>">
					<input type="file" name="gambar" class="input-control">
					<input type="text" name="jumlah_motor" class="input-control" placeholder="jumlah motor" required>
					<textarea class="input-control" name="deskripsi" placeholder="Deskripsi"><?php echo $p->motor_desc ?></textarea><br>
					<select class="input-control" name="status">
						<option value="">--Pilih--</option>
						<option value="1" <?php echo ($p->motor_status == 1)? 'selected':''; ?>>Booked</option>
						<option value="0" <?php echo ($p->motor_status == 0)? 'selected':''; ?>>Ready</option>
					</select>
					<input type="submit" name="submit" value="Submit" class="btn">
				</form>
				<?php 
					if(isset($_POST['submit'])){

						// data inputan dari form
						$kategori 	= $_POST['kategori'];
						$nama 		= $_POST['nama'];
						$deskripsi 	= $_POST['deskripsi'];
						$jumlah_motor 	= $_POST['jumlah_motor'];
						$status 	= $_POST['status'];
						$foto 	 	= $_POST['foto'];

						// data gambar yang baru
						$filename = $_FILES['gambar']['name'];
						$tmp_name = $_FILES['gambar']['tmp_name'];

						

						// jika admin ganti gambar
						if($filename != ''){
							$type1 = explode('.', $filename);
							$type2 = $type1[1];

							$newname = 'film'.time().'.'.$type2;

							// menampung data format file yang diizinkan
							$tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

							// validasi format file
							if(!in_array($type2, $tipe_diizinkan)){
								// jika format file tidak ada di dalam tipe diizinkan
								echo '<script>alert("Format file tidak diizinkan")</script>';

							}else{
								unlink('./motor/'.$foto);
								move_uploaded_file($tmp_name, './motor/'.$newname);
								$namagambar = $newname;
							}

						}else{
							// jika admin tidak ganti gambar
							$namagambar = $foto;
							
						}

						// query update data produk
						$update = mysqli_query($conn, "UPDATE tb_motor SET 
												kategori_id = '".$kategori."',
												merk_motor = '".$nama."',
												motor_desc = '".$deskripsi."',
												motor_img = '".$namagambar."',
												jumlah_motor = '".$jumlah_motor."',
												motor_status = '".$status."'
												WHERE motor_id = '".$p->motor_id."'	");
						if($update){
							echo '<script>alert("Ubah data berhasil")</script>';
							echo '<script>window.location="data-motor.php"</script>';
						}else{
							echo 'gagal '.mysqli_error($conn);
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
        CKEDITOR.replace( 'deskripsi' );
    </script>
</body>
</html>