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
		<h1>Edit</h1>
		<div class="card">
			<div class="card-header bg-success text-white">
				Edit Data Barang
			</div>
			<div class="card-body">
			<?php

				$id = $_GET['personid']; //mengambil id barang yang ingin diubah
				//menampilkan barang berdasarkan id
				$data = mysqli_query($connect, "select * from person where personid = '$id'");
				$row = mysqli_fetch_assoc($data);

				$noktperr = $fullnameerr = $alamaterr = $tempat_lahirerr = $tanggal_lahirerr = $no_hperr = $no_taspenerr = null;
				$ktp = $nama = $alamat = $tempat_lahir = $tanggal_lahir =	$no_hp = $no_taspen =  "";
				if ($_SERVER["REQUEST_METHOD"] == "POST"){
					$flags = TRUE;
					$ktp = $_POST['no_ktp'];
					$nama = $_POST['fullname'];
					$alamat = $_POST['alamat'];
					$tempat_lahir = $_POST['option_tempat'];
					$tanggal_lahir = $_POST['tanggal_lahir'];
					$no_hp = $_POST['no_hp'];
					$no_taspen = $_POST['no_taspen'];

					//VALIDATION for ktp
					if(empty($ktp)){
						$noktperr = "Mohon isi nomor KTP anda";
						$flags = FALSE;
					} else if(!is_numeric($ktp)) {
						$noktperr = "Mohon isi dengan angka";
						$flags = FALSE;
					} else if(strlen($ktp) < 15){
						$noktperr = "Nomor KTP 16 digit";
						$flags = FALSE;
					}

					//VALIDATION for nama
					if(empty($nama)){
						$fullnameerr = "Mohon isi nama anda";
						$flags = FALSE;
					} else if(!is_string($nama)) {
						$fullnameerr = "Mohon isi dengan huruf";
						$flags = FALSE;
					} 

					//VALIDATION for alamat
					if(empty($alamat)){
						$alamaterr = "Mohon isi alamat anda";
						$flags = FALSE;
					} 

					//VALIDATION for tempat lahir
					if(empty($tempat_lahir) || $tempat_lahir == "Choose..."){
						$tempat_lahirerr = "Mohon isi kota lahir anda";
						$flags = FALSE;
					} else if(!is_string($tempat_lahir)) {
						$tempat_lahirerr = "Mohon isi dengan huruf";
						$flags = FALSE;
					} 

					//VALIDATION for tanggal lahir
					if(empty($tanggal_lahir)){
						$tanggal_lahirerr = "Mohon isi tanggal lahir anda";
						$flags = FALSE;
					} 

					//VALIDATION for no hp
					if(empty($no_hp)){
						$no_hperr = "Mohon isi nomor KTP anda";
						$flags = FALSE;
					} else if(!is_numeric($no_hp)) {
						$no_hperr = "Mohon isi dengan angka";
						$flags = FALSE;
					} 

					//VALIDATION for no taspen
					if(empty($no_taspen)){
						$no_taspenerr = "Mohon isi nomor taspen anda";
						$flags = FALSE;
					} else if(!is_string($no_taspen)) {
						$no_taspenerr = "Mohon isi dengan angka";
						$flags = FALSE;
					} 

					if($flags){
						$datas = mysqli_query($connect, "UPDATE person set fullname='$nama', alamat='$alamat', city='$tempat_lahir', tanggal_lahir='$tanggal_lahir', no_ktp='$ktp', nohp='$no_hp', no_taspen='$no_taspen' where personid = '$id'") or die(mysqli_error($connect));
						echo "<script>alert('data berhasil diupdate.');window.location='../pages/dashboard.php';</script>";

					}
				}
			?>
				<form  action="" method="POST">
				<div class="form-group">
						<label>No KTP <span class="require">(required)</span></label>
						<input type="text" name="no_ktp" maxlength="16" class="form-control" value="<?= $row['no_ktp']; ?>">
            <span class="error"> <?php echo $noktperr;?> </span>
					</div>
					<div class="form-group">
						<label>Nama Lengkap <span class="require">(required)</span></label>
						<input type="text" name="fullname" class="form-control" value="<?= $row['fullname']; ?>">
            <span class="error"> <?php echo $fullnameerr;?> </span>
					</div>
					<div class="form-group">
						<label>Alamat <span class="require">(required)</span></label>
						<input type="text" name="alamat" class="form-control" value="<?= $row['alamat']; ?>">
            <span class="error"> <?php echo $alamaterr;?> </span>
					</div>
					<div class="form-group">
						<label>Tempat Lahir <span class="require">(required)</span></label>
						<select class="custom-select" id="inputGroupSelect02" name="option_tempat" value="<?= $row['tempat_lahir']; ?>">
							<option selected>Choose...</option>
							<option value="Medan">Medan</option>
							<option value="Jakarta">Jakarta</option>
							<option value="Bandung">Bandung</option>
							<option value="Bali">Bali</option>
							<option value="Surabaya">Surabaya</option>
						</select>
            <span class="error"> <?php echo $tempat_lahirerr;?> </span>
					</div>
					<div class="form-group">
						<label>Tanggal Lahir <span class="require">(required)</span></label>
						<input type="text" id="datepicker" maxlength="0" name="tanggal_lahir" class="form-control" value="<?= $row['tanggal_lahir']; ?>">
            <span class="error"> <?php echo $tanggal_lahirerr;?> </span>
					</div>
					<div class="form-group">
						<label>Nomor HP <span class="require">(required)</span></label>
						<input type="text" name="no_hp" class="form-control" value="<?= $row['nohp']; ?>">
            <span class="error"> <?php echo $no_hperr;?> </span>
					</div>
					<div class="form-group">
						<label>Nomor Taspen <span class="require">(required)</span></label>
						<input type="text" name="no_taspen" class="form-control" value="<?= $row['no_taspen']; ?>">
            <span class="error"> <?php echo $no_taspenerr;?> </span>
					</div>					
					<input class ="button btn btn-primary" type="submit" name= "button" value="Submit">
				</form>

				<?php
				//melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
				if (isset($_POST['submit'])) {
					//menampung data dari inputan
					$kode_barang = $_POST['kode_barang'];
					$nama_barang = $_POST['nama_barang'];
					$harga_pokok = (int)$_POST['harga_pokok'];
					$harga_jual = (int)$_POST['harga_jual'];

					//id barang tidak dimasukkan, karena sudah menggunakan AUTO_INCREMENT, id akan otomatis

					mysqli_query($connect, "update barang set kode_barang='$kode_barang', nama_barang='$nama_barang', harga_pokok='$harga_pokok', harga_jual='$harga_jual' where id ='$id'") or die(mysqli_error($connect));

					//redirect ke halaman index.php
					echo "<script>alert('data berhasil diupdate.');window.location='dashboard.php';</script>";

					//ini untuk menampilkan alert berhasil dan redirect ke halaman index
					echo "<script>alert('data berhasil disimpan.');window.location='../index.php';</script>";
				}
				?>
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