<?php
  require_once ('connect.php');
  include('load_data.php');

  $idbarang = $_POST['option_barang'];
  $nperiode = $_POST['nperiode'];
?>

<div class="card-body">
  <h3> Proses Smoothing dengan data faktual <?php echo $nperiode; ?> Periode terakhir </h3>
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
      <?php
        $temp = 0;
        $prediksi = 'prediksi';
        $listdata = mysqli_query($connect,"SELECT * FROM laporan inner join barang on barang.idbarang = laporan.idbarang where laporan.idbarang = '".$idbarang."'");
        
        $datas = [];
        while($row = mysqli_fetch_assoc($listdata)){
          array_push($datas, $row['stok_akhir']);
        }
        $lengthDatas = sizeof($datas);
        $no = 1;
        $noPrediksi = $lengthDatas + 1;
        
        foreach($listdata as $data):
      ?>
      <tr>
        <td><?= $no; ?></td>
        <td><?= $data['kode_barang']; //untuk menampilkan nama ?></td>
        <td><?= $data['nama_barang']; //untuk menampilkan nama ?></td>
        <td><?= $data['bulan']; ?></td>
        <td><?= $data['tahun']; ?></td>
        <td><?= $data['stok_akhir']; ?></td>
        <td><?php if($no >= $nperiode){
          
          for($i = $no-$nperiode; $i < $no; $i++){
            $temp += $datas[$i];
          }
          $temp = $temp / $nperiode;
          echo round($temp, 4);
          $temp = 0;
        }else{
          
          echo "0";
        } ?></td>
      </tr>
      <?php $no++; endforeach; ?>
    </tbody>
  </table>
</div>

<?php include('simplemovingaverage.php'); ?>

<script>
	// $(document).ready(function () {
  //   	$('#example2').DataTable();
	// });
</script>