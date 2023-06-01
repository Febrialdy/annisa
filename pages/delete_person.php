<?php				
			include '../config/connect.php'; //menghubungkan ke file koneksi untuk ke database
			$id = $_GET['personid']; //menampung id

			//query hapus
			$datas = mysqli_query($connect, "delete from person where personid ='$id'") or die(mysqli_error($connect));

			//alert dan redirect ke index.php
			echo "<script>alert('data berhasil dihapus.');window.location='dashboard.php';</script>";
	?>