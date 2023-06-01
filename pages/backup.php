<?php
  require_once ('connect.php');
  include ('load_data.php');
  //include ('simplemovingaverage.php');
  
?>

<div class="card-body">
  <table id="example2" class="table table-striped table-bordered">
    <thead>
      <tr style="text-align: center;">
        <th width="50px">Periode</th>
        <th>Kode</th>
        <th>Nama</th>
        <th>Bulan</th>
        <th>Tahun</th>
        <th>Stock</th>
        <th>Smoothing</th>
      </tr>
    </thead>
    <tbody>
     
      <tr>
        <td><?= $no; ?></td>
        <td><?= $data['kode_barang']; ?></td>
        <td><?= $data['nama_barang']; ?></td>
        <td><?= $data['bulan']; ?></td>
        <td><?= $data['tahun']; ?></td>
        <td><?= $data['stok_akhir']; ?></td>
        <td><?php if($i >= 0) {
          $temp = 0;
          for($y=$i; $y >= $i-$nperiode; $y++){
            $temp += $datas[$y];
          }
           echo $temp;
           $temp = 0;
        } else {echo "0";} ; ?></td>
      </tr>
      <?php $i++;$no++; endforeach; ?>
    </tbody>
  </table>
</div>

<script>
	$(document).ready(function () {
    	$('#example2').DataTable();
	});
</script>