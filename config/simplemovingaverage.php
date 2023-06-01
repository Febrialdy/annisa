<?php
  require_once ('connect.php');
  $datafaktual = 0;
  $dataprediksi = 0;
?>


<div class="card-body">
  <h3> Proses Single Moving Average dengan data faktual <?= $nperiode ?> periode terakhir </h3>
  <table id="example3" class="table table-striped table-bordered">
    <thead>
      <tr style="text-align: center;">
        <th width="50px">Periode</th>
        <th>Kode</th>
        <th>Nama</th>
        <th>Bulan</th>
        <th>Tahun</th>
        <th>Stock</th>
        <th>Smoothing</th>
        <th>SMA</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $temp = 0;
        $listdatasma = [];
        $no = 1;
        
        
        $listdata = mysqli_query($connect,"SELECT * FROM laporan inner join barang on barang.idbarang = laporan.idbarang where laporan.idbarang = '".$idbarang."'");
        
        $datas = [];
        $datasforecasting = [];
        while($row = mysqli_fetch_assoc($listdata)){
          array_push($datas, $row['stok_akhir']);
          $datafaktual += $row['stok_akhir'];
        }
        $lengthDatas = sizeof($datas);
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
          if($no == $nperiode) {
            array_push($datasforecasting, 0); 
          }
          for($i = $no-$nperiode; $i < $no; $i++){
            $temp += $datas[$i];
          }
          $temp = $temp / $nperiode;
          array_push($datasforecasting, $temp);
          array_push($listdatasma, $temp);
          echo round($temp, 4);
          
        }else{
          array_push($datasforecasting, 0);
          echo "0";
        } ?></td>
        <td> <?php if ($no > $nperiode){
            echo round($listdatasma[$no-$nperiode-1], 4);
          }else{
            echo "0";
          }?>
         </td>
      </tr>
      
      <?php if($lengthDatas == $no){ ?>
        <tr style="background: #C7E8CA;">
          <td> <?= $noPrediksi; ?> </td>
          <td colspan="2"> <?= $data['kode_barang'];  ?> </td>
          <td colspan="3"> <?=$data['nama_barang'];  ?> </td>
          <td> Prediksi </td>
          <td>  <?php if ($no > $nperiode){
            $smatemp = $temp;
            array_push($datasforecasting, $temp);
            echo round($smatemp, 4);
            $temp = 0;
          }else{
            array_push($datasforecasting, 0);
            echo "1";
          }?> </td>
      </tr>
       <?php } ?> 
      <?php $no++; endforeach; ?>
    </tbody>
  </table>
</div>
<div class="card-body">
  <h3> Uji Data </h3>
  <table id="example4" class="table table-striped table-bordered">
    <thead>
      <tr style="text-align: center;">
        <th width="50px">Periode</th>
        <th>Data Faktual</th>
        <th> Data Prediksi</th>
        <th>MAPE</th>
        <th>MSE</th>
        <th>MAE</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    $mape = 0;
    $mse = 0;
    $mae = 0;
    for($i =0; $i < $lengthDatas; $i++): ?>
      <tr>
        <td><?= $i+1; ?></td>
        <td><?= $datas[$i]; //untuk menampilkan nama ?></td>
        <td><?= round($datasforecasting[$i], 4); //untuk menampilkan nama ?></td>
        <td><?= round(abs($datas[$i] - $datasforecasting[$i]) / $datas[$i], 4); //untuk menampilkan nama ?></td>
        <td><?= round(pow($datas[$i] - $datasforecasting[$i], 2), 4); //untuk menampilkan nama ?></td>
        <td><?= round(abs($datas[$i] - $datasforecasting[$i]), 4); //untuk menampilkan nama ?></td>
      </tr>
    <?php
    $mape += abs($datas[$i] - $datasforecasting[$i]) / $datas[$i];
    $mse += pow($datas[$i] - $datasforecasting[$i], 2) / $datas[$i];
  
    $mae += abs($datas[$i] - $datasforecasting[$i]);
   
    endfor; ?>   
    <?php $hasilmse = $mse / $lengthDatas;
    $hasilmae = $mae / $lengthDatas; ?>
    </tbody>
  </table>
  <p> Maka,  MAPE Adalah = <?php echo round(($mape/$lengthDatas), 4); ?>% Kemudian MSE adalah <?php echo round($hasilmse, 4); ?> dan hasil MAE adalah <?php echo round($hasilmae, 4); ?> </p>
</div>

<script>
	// $(document).ready(function () {
  //   	$('#example3').DataTable();
	// });
  // $(document).ready(function () {
  //   	$('#example4').DataTable();
	// });
</script>