<?php include '../config/connect.php'; ?>
<!DOCTYPE html>
<html>

<head>
	<title>CV. Grand Sehat</title>
</head>
<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
<!-- datepicker -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<style>
  .error{
    color: red;
    font-size: 12px;
  }

  .require{
    font-size: 10px;
  }

</style>

<body>
	<div class="container col-md-6 mt-4">
		<h1>Upload</h1>
		<div class="card">
			<div class="card-header bg-success text-white">
				Upload Otentikasi
			</div>
			<div class="card-body">
			<?php

				$id = $_GET['personid']; 
				$data = mysqli_query($connect, "select * from person where personid = '$id'");
				$row = mysqli_fetch_assoc($data);
				$myname = $row['fullname'];
				$datas = mysqli_query($connect, "select * from otentikasi where fullname = '$myname'");
				$rows = mysqli_fetch_assoc($datas);
				$mypath = $rows['mypath'];
				$datenow = date('d/m/y');

				if(isset($_POST['proses'])){
					$direktori = "../berkas/";

					$name = $row['fullname'];
					$file_name=$_FILES['NamaFile']['name'];
					move_uploaded_file($_FILES['NamaFile']['tmp_name'], $direktori.$file_name);
					$datas = mysqli_query($connect, "insert into otentikasi (fullname, mypath, lastupdate)
					values('$name', '$direktori$file_name', '$datenow')") or die(mysqli_error($connect));
					echo "<script>alert('data berhasil disimpan.');window.location='../pages/report.php';</script>";

				} else if(isset($_POST['view'])){
					header("content-type: application/pdf");
					readfile($mypath);
				}
				
			?>
				<form  action="" method="POST" enctype="multipart/form-data">
				<div class="form-group">
						<label>No KTP <span class="require">(required)</span></label>
						<input type="text" name="no_ktp" maxlength="16" class="form-control" value="<?= $row['no_ktp']; ?>" disabled>
					</div>
					<div class="form-group">
						<label>Nama Lengkap <span class="require">(required)</span></label>
						<input type="text" name="fullname" class="form-control" value="<?= $row['fullname']; ?>" disabled>
					</div>
					<div class="form-group">
						<label>Upload File <?php  echo $mypath;?> <span class="require">(required)</span></label>
						<?php
							if($mypath == null){
								echo "<input type=\"file\" name=\"NamaFile\" class=\"form-control\">";
							}
						?>
					</div>					
					<?php
							if($mypath == null){
								echo "<input class =\"button btn btn-primary\" type=\"submit\" name=\"proses\" value=\"Submit\">";
							} else{
								echo "<input class =\"button btn btn-primary\" type=\"submit\" name=\"view\" value=\"view\">";
							}
						?>
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="../assets/js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
	<script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            language: "en",
            autoclose: true,
            format: "dd, mmm yyyy"
        });
    </script>
</body>

</html>