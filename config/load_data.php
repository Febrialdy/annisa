<?php
  require_once ('connect.php');
?>


<div class="card-body">
  <table id="example" class="table table-striped table-bordered">
    <thead>
      <tr style="text-align: center;">
        <th width="50px">Periode</th>
        <th>Kode</th>
        <th>Nama</th>
        <th>Bulan</th>
        <th>Tahun</th>
        <th>Stock</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $idbarang = $_POST['option_barang'];
        
        $listdata = mysqli_query($connect,"SELECT * FROM laporan inner join barang on barang.idbarang = laporan.idbarang where laporan.idbarang = '".$idbarang."'");
        // $listdata = mysqli_query($connect,"SELECT * FROM laporan inner join barang on barang.idbarang = laporan.idbarang");
        $no = 1;
        foreach($listdata as $data):
      ?>
      <tr>
        <td><?= $no; ?></td>
        <td><?= $data['kode_barang']; //untuk menampilkan nama ?></td>
        <td><?= $data['nama_barang']; //untuk menampilkan nama ?></td>
        <td><?= $data['bulan']; ?></td>
        <td><?= $data['tahun']; ?></td>
        <td><?= $data['stok_akhir']; ?></td>
      </tr>
      <?php $no++; endforeach; ?>
    </tbody>
  </table>
</div>

<script>
	$(document).ready(function () {
    	$('#example').DataTable();
	});
</script>