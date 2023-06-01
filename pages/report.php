<?php 
	require_once('../config/connect.php'); 

	
	if (!isset($_SESSION['username'])) {
		header("Location: dashboard.php");
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Otentikasi</title>
</head>
<link rel="icon" href="icon.ico">
<link rel="stylesheet" type="text/css" href="login/assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="login/assets/css/styles.css">
<script src="https://unpkg.com/feather-icons"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

<!-- need internet to access -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Datatables -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap4.min.css">
<body>
	<!-- navbar -->
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-between">
  <a class="navbar-brand"><img src="../assets/img/icon.png" width="50px" height="50px"></a>
	<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="report.php">Report</a>
      </li>
    </ul>
  </div>
  <a class="navbar-brand title font-weight-bold" style="color: #C84B31;" href="logout.php">Log Out</a>
</nav>
	<div class="container col-lg-12 mt-4">
    <?php echo "<h3 class='text-center'>Selamat Datang, " . $_SESSION['name'] ."!". "</h3>"; ?>
		<h1 class="title text-center">Otentikasi Nasabah</h1>
    <div class="card">
			<div  class="card-header text-white title" style="background-color: #C84B31;">Data Nasabah<a href="add_person.php" class="btn btn-sm btn-success float-right"><i data-feather="plus"></i></a>
			</div>
			<div class="card-body">
				<table id="example" class="table table-striped table-bordered">
					<thead>
						<tr style="text-align: center;">
							<th width="50px">No</th>`
							<th>KTP</th>
							<th>Nama</th>
							<th>Alamat</th>
							<th>Kota</th>
							<th>Tanggal Lahir</th>
							<th>No HP</th>
							<th>No Taspen</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php

						$datas = mysqli_query($connect, 'select * from person') or die(mysqli_error($connect));
						$no = 1;
						while($row = mysqli_fetch_assoc($datas)) {

						?>
						<tr>
							<td><?= $no; ?></td>
							<td><?= $row['no_ktp']; //untuk menampilkan nama ?></td>
							<td><?= $row['fullname']; //untuk menampilkan nama ?></td>
							<td><?= $row['alamat']; //untuk menampilkan nama ?></td>
							<td><?= $row['city']; //untuk menampilkan nama ?></td>
							<td><?= $row['tanggal_lahir']; //untuk menampilkan nama ?></td>
							<td><?= $row['nohp']; //untuk menampilkan nama ?></td>
							<td><?= $row['no_taspen']; //untuk menampilkan nama ?></td>
							<td>
									<a href="upload_pdf.php?personid=<?= $row['personid']; ?>" class="btn btn-sm btn-warning"><span data-feather="file-text"></span></a>
							</td>
						</tr>

						<?php $no++; } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<script type="text/javascript" src="login/assets/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="login/assets/js/bootstrap.min.js"></script>
<script>
  feather.replace()
</script>
<script>
	$(document).ready(function () {
    	$('#example').DataTable();
	});
</script>
</body>
</html>