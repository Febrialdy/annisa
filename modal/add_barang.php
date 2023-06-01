<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addBarangModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="addBarangModal" tabindex="-1" role="dialog" aria-labelledby="addBarangModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="addBarangModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<div class="card">
			<div class="card-body">
				<form action="" method="post" role="form">
				<div class="form-group">
						<label>Kode Barang</label>
						<input type="text" name="kode_barang" required="" class="form-control">
					</div>
					<div class="form-group">
						<label>Nama Barang</label>
						<input type="text" name="nama_barang" required="" class="form-control">
					</div>
					<div class="form-group">
						<label>Harga Pokok</label>
						<input type="text" name="harga_pokok" class="form-control">
					</div>
					<div class="form-group">
						<label>Harga Jual</label>
						<input type="text" name="harga_jual" class="form-control">
					</div>					
					
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="submit" value="simpan">Save</button>
      </div>
				</form>

				<?php
				//melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
				if (isset($_POST['submit'])) {
					//menampung data dari inputan
					$kode_barang = $_POST['kode_barang'];
					$nama_barang = $_POST['nama_barang'];
					$harga_pokok = (int)$_POST['harga_pokok'];
					$harga_jual = (int)$_POST['harga_jual'];

					//query untuk menambahkan barang ke database, pastikan urutan nya sama dengan di database
					$datas = mysqli_query($connect, "insert into barang (kode_barang, nama_barang, harga_pokok, harga_jual)values('$kode_barang', '$nama_barang', '$harga_pokok', '$harga_jual')") or die(mysqli_error($connect));
					//id barang tidak dimasukkan, karena sudah menggunakan AUTO_INCREMENT, id akan otomatis

					//ini untuk menampilkan alert berhasil dan redirect ke halaman index
					echo "<script>alert('data berhasil disimpan.');window.location='../index.php';</script>";
				}
				?>
			</div>
		</div>
      </div>
    </div>
  </div>
</div>