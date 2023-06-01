<?php
  include '../config/connect.php';
  require("pdf/fpdf.php");

  $pdf = new FPDF('P','mm','A4');

  $id = $_GET['personid']; //mengambil id barang yang ingin diubah
				//menampilkan barang berdasarkan id
				$data = mysqli_query($connect, "select * from person where personid = '$id'");
				$row = mysqli_fetch_assoc($data);
        $fullname = $row['fullname'];
        $datenow = date("d/m/y");

  $pdf->AddPage();
  // Insert a logo in the top-left corner at 300 dpi
// Insert a dynamic image from a URL
$pdf->Image('../logo.png', 5, 0, 40, 0, 'PNG');
  $pdf->SetFont("Arial", "B", 14);
  $pdf->Cell(190,5,"SURAT PERNYATAAN OTENTIKASI PENSIUN",0,2,'C');
  $pdf->Cell(190,5,"PT. Bank Sumut Cabang Stabat",0,2,'C');
  $pdf->SetFont("Arial", "", 10);
  $pdf->Cell(190,5,"Jl. KH. Zainul Arifin No. 58, Kwala Bingai",0,2,'C');
  $pdf->Cell(190,5,"Kec. Stabat, Kabupaten Langkat, Sumatera Utara 20811 Telp. 0821-8381-5567",0,2,'C');
  $pdf->Ln();
  $pdf->Ln();
  $pdf->Cell(190,5,"Yth. Kepada Bapak/Ibu $fullname",0,2,'L');
  $pdf->Cell(190,5,"Di",0,2,'L');
  $pdf->Cell(190,5,"Tempat",0,2,'L');
  $pdf->Ln();
  $pdf->Ln();
  $pdf->Cell(190,5,"Yang bertanda tangan dibawah ini:",0,2,'L');
  $pdf->Cell(75,5,"Nama:",0,0,'L');
  $pdf->Cell(3,5,":",0,0,'L');
  $pdf->Cell(75,5,$row['fullname'],0,1,'L');
  $pdf->Cell(75,5,"Nomor KTP:",0,0,'L');
  $pdf->Cell(3,5,":",0,0,'L');
  $pdf->Cell(75,5,$row['no_ktp'],0,1,'L');
  $pdf->Cell(75,5,"Nomor Taspen",0,0,'L');
  $pdf->Cell(3,5,":",0,0,'L');
  $pdf->Cell(75,5,$row['no_taspen'],0,1,'L');
  $pdf->Cell(75,5,"Tempat Lahir",0,0,'L');
  $pdf->Cell(3,5,":",0,0,'L');
  $pdf->Cell(75,5,$row['city'],0,1,'L');
  $pdf->Cell(75,5,"Tanggal Lahir",0,0,'L');
  $pdf->Cell(3,5,":",0,0,'L');
  $pdf->Cell(75,5,$row['tanggal_lahir'],0,1,'L');
  $pdf->Cell(75,5,"Alamat",0,0,'L');
  $pdf->Cell(3,5,":",0,0,'L');
  $pdf->Cell(75,5,$row['alamat'],0,1,'L');
  $pdf->Cell(75,5,"Nomor HP",0,0,'L');
  $pdf->Cell(3,5,":",0,0,'L');
  $pdf->Cell(75,5,$row['nohp'],0,1,'L');
  $pdf->Ln();
  $pdf->Cell(190,5,"Pada tanggal $datenow telah melakukan otentikasi pensiun di PT. Bank Sumut Cabang Stabat. ",0,2,'L');
  $pdf->Cell(190,5,"Dengan demikian surat ini dibuat sebenar-benarnya. ",0,2,'L');
  $pdf->Ln();
  $pdf->Ln();
  $pdf->Ln();
  $pdf->Ln();
  $pdf->Cell(75,5,"Stabat, $datenow",0,0,'L');
  $pdf->Cell(40,5,"",0,0,'L');
  $pdf->Cell(75,5,"Stabat, $datenow",0,1,'L');
  $pdf->Cell(75,5,"Pejabat Yang Berwenang",0,0,'L');
  $pdf->Cell(40,5,"",0,0,'L');
  $pdf->Cell(75,5,"Yang Menyatakan",0,1,'L');
  $pdf->Cell(75,5,"",0,0,'L');
  $pdf->Cell(40,5,"",0,0,'L');
  $pdf->Cell(75,5,"",0,1,'L');
  $pdf->Cell(75,5,"",0,0,'L');
  $pdf->Cell(40,5,"",0,0,'L');
  $pdf->Cell(75,5,"",0,1,'L');
  $pdf->Cell(75,5,"",0,0,'L');
  $pdf->Cell(40,5,"",0,0,'L');
  $pdf->Cell(75,5,"",0,1,'L');
  $pdf->Cell(75,5,"(..........................................)",0,0,'L');
  $pdf->Cell(40,5,"",0,0,'L');
  $pdf->Cell(75,5,$row['fullname'],0,1,'L');
 
  $pdf->Output();

?>