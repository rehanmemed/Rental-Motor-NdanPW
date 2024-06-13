<?php 
	
	include 'db.php';

	if(isset($_GET['idk'])){
		$delete = mysqli_query($conn, "DELETE FROM tb_kategori WHERE kategori_id = '".$_GET['idk']."' ");
		echo '<script>window.location="data-kategori.php"</script>';
	}

	if(isset($_GET['idp'])){
		$motor = mysqli_query($conn, "SELECT motor_img FROM tb_motor WHERE motor_id = '".$_GET['idp']."' ");
		$p = mysqli_fetch_object($motor);

		unlink('./motor/'.$p->pmotor_img);

		$delete = mysqli_query($conn, "DELETE FROM tb_motor WHERE motor_id = '".$_GET['idp']."' ");
		echo '<script>window.location="data-motor.php"</script>';
	}

?>