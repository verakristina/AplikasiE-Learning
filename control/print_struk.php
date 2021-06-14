<?php include 'koneksi.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Struk Pengiriman</title>
  <style type="text/css">
    .footer
      {
          line-height: 1.0em; font-size:11px; text-align: center; font-family: "Impact, Charcoal", sans-serif ;  
      }
   .judul { font-size:18px; text-align: center; line-height: 1.5em; font-family: "Impact, Charcoal", sans-serif ; }
   .footer { font-size:18px; text-align: center; line-height: 1.5em; font-family: "Impact, Charcoal", sans-serif ; }
          
   .sub { line-height: 1.0em; font-size:11px; text-align: center; font-family: "Impact, Charcoal", sans-serif ; }

   .isi 
   {
      font-size: 12px; 
      text-align: center;
      line-height: 1em;
      font-family: "Comic Sans MS", cursive, sans-serif;

   }
   .space { line-height: 1.5em;}

   .judjual {
          font-size: 17px;
          font-family: Arial, Helvetica, sans-serif;
          line-height: 1.0em;

   }

   .tab {
          font-size: 15px;
          font-family: "Comic Sans MS", cursive, sans-serif;
          line-height: 1.0em;
          border-collapse: collapse;


   }
   .contoh4 { font-size:16px; line-height: 2;}
    </style>

  <?php
  function tgl_indo($tanggal){
    $bulan = array (
      1 =>   'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    );


    $pecahkan = explode('-', $tanggal);
       
    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
  }
   
  ?>

<?php
date_default_timezone_set("Asia/Jakarta");

$day = date ("D");
switch ($day) {
case 'Sun' : $hari = "Minggu"; break;
case 'Mon' : $hari = "Senin"; break;
case 'Tue' : $hari = "Selasa"; break;
case 'Wed' : $hari = "Rabu"; break;
case 'Thu' : $hari = "Kamis"; break;
case 'Fri' : $hari = "Jum'at"; break;
case 'Sat' : $hari = "Sabtu"; break;
default : $hari = "??";
}

?>
<?php $az = mysqli_query($koneksi,"select * from data_aplikasi");
while ($data = mysqli_fetch_array($az)) { ?>

<div class="judul"><strong><?php echo $data['nama'] ?></strong></div>

<div class="sub"><?php echo $data['alamat'] ?></div>

<?php } ?>
  </head>
   <?php date_default_timezone_set("Asia/Jakarta"); ?>
  <?php $date = date("d/m/Y H:i:s") ?>
<div class="sub"><?php echo $date;  ?></div>
================================================================<br>
<?php $get = $_GET['kode']; ?>
<?php
      $sql1 = mysqli_query($koneksi,"SELECT *, layanan.layanan as mylayanan FROM pengiriman, layanan WHERE layanan.id_layanan=pengiriman.id_layanan AND pengiriman.id_pengiriman='$get'"); 
      while ($s = mysqli_fetch_array($sql1)) { ?>
 <table border="0" width="90%" style="border-collapse: collapse;" align="center"><br>
    <tr>
     <td align="left">Id Pengiriman</td>
     <td width="50%" align="left">:</td>
     <td><?php echo $s['id_pengiriman']?></td>
   </tr>
  
  <tr>
     <td align="left">Nama Pengirim</td>
     <td width="50%" align="left">:</td>
     <td><?php echo $s['nm_pengirim']?></td>
   </tr>
   <tr>
     <td align="left">Nama Layanan</td>
     <td width="50%" align="left">:</td>
     <td><?php echo $s['layanan']?></td>
   </tr>
   <tr>
     <td align="left">Id Tujuan</td>
     <td width="50%" align="left">:</td>
     <td><?php echo ($s['id_tujuan'])?></td>
   </tr>
   <tr>
     <td align="left">Tanggal Pengiriman</td>
     <td width="50%" align="left">:</td>
     <td><?php echo ($s['tanggal_pengiriman'])?></td>
   </tr>
   <tr>
     <td align="left">Berat</td>
     <td width="50%" align="left">:</td>
     <td><?php echo number_format($s['berat']) ?> Kg</td>
   </tr>
   <tr>
     <td align="left">Biaya Paket</td>
     <td width="50%" align="left">:</td>
     <td><?php echo number_format($s['biaya_paket']) ?></td>
   </tr>
   <tr>
     <td align="left">Total Biaya</td>
     <td width="50%" align="left">:</td>
     <td><?php echo number_format ($s['total_biaya'])?></td>
   </tr>

 </table>
 <br>


<?php } ?>
================================================================<br>
<div class="footer" align="center"><strong>THANK YOU 🙏🙏</strong></div>

<?php echo "<script>window.print()</script>"; ?>

<script src="../../build/js/custom.min.js"></script>
  </body>
</html>


        
