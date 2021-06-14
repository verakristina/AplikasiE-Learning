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
  </head>
   <?php date_default_timezone_set("Asia/Jakarta"); ?>
  <?php $date = date("d/m/Y H:i:s") ?>
<div class="sub"><?php echo $date;  ?></div>
================================================================<br>
<?php $get = $_GET['kode']; ?>
<?php
      $sql1 = mysqli_query($koneksi,"SELECT pengiriman.id_pengiriman, pengiriman.tanggal_pengiriman, pengiriman.id_layanan, pengiriman.id_tujuan, pengiriman.biaya_paket, pengiriman.total_biaya, detail_pengiriman.id_detailPengiriman FROM pengiriman INNER JOIN detail_pengiriman ON pengiriman.id_pengiriman=detail_pengiriman.id_pengiriman"); 
      while ($s = mysqli_fetch_array($sql1)) { ?>
<div class="judjual"><?php echo $s['id_detailPengiriman'] ?></div>
<table border="0" class="tab" width="90%" align="center">
      <tr>
      <td width="20%"><?php echo $s['id_pengiriman']?></td>
      <td width="40%" align="right"><?php echo date($s['tanggal_pengiriman'])?></td>
      <td width="50%" align="right"> <?php echo ($s['id_layanan'])?></td>
      <td width="50%" align="right"> <?php echo ($s['id_tujuan'])?></td>
      <td width="50%" align="center"> <?php echo number_format($s['biaya_paket'])?></td>
      <td width="50%" align="right"> <?php echo number_format ($s['total_biaya'])?></td>

    </tr>
</table> 

<?php } ?>
================================================================<br>

<?php $q = mysqli_query($koneksi,"SELECT *,detail_pengiriman.total_biaya AS pot, COUNT(detail_pengiriman.id_detailPengiriman) AS a FROM pengiriman,detail_pengiriman  WHERE pengiriman.id_pengiriman=detail_pengiriman.id_detailPengiriman AND pengiriman.id_pengiriman='$get'");
while ($h = mysqli_fetch_array($q)) {
$a = $h['biaya_paket'];
$b = $h['pot'];
$c = $h['total_biaya'];
 ?>

 <table border="0" width="90%" style="border-collapse: collapse;" align="center">
  <tr>
     <td align="left">Id Detail Pengiriman</td>
     <td width="50%" align="left">:</td>
     <td align="center"><?php echo number_format($c) ?></td>
   </tr>
  
   <tr>
     <td align="left">Id Pengiriman</td>
     <td width="50%" align="left">:</td>
     <td align="center"><?php echo number_format($a) ?></td>
   </tr>
   <tr>
     <td align="left">Id Layanan</td>
     <td width="50%" align="left">:</td>
     <td align="center"><?php echo number_format($h['id_layanan']) ?></td>
   </tr>
   <tr>
     <td align="left">Id Tujuan</td>
     <td width="50%" align="left">:</td>
     <td align="center"><?php echo number_format($h['id_tujuan']) ?></td>
   </tr>
   <tr>
     <td align="left">Tanggal Pengiriman</td>
     <td width="50%" align="left">:</td>
     <td align="center"><?php echo number_format($h['tanggal_pengiriman']) ?></td>
   </tr>
   <tr>
     <td align="left">Berat</td>
     <td width="50%" align="left">:</td>
     <td align="center"><?php echo number_format($h['berat']) ?></td>
   </tr>
   <tr>
     <td align="left">Biaya Paket</td>
     <td width="50%" align="left">:</td>
     <td align="center"><?php echo number_format($h['biaya_paket']) ?></td>
   </tr>
   <tr>
     <td align="left">Total Biaya</td>
     <td width="50%" align="left">:</td>
     <td align="center"><?php echo number_format($h['total_biaya']) ?></td>
   </tr>

 </table>



<?php } ?>
================================================================<br>
<div class="footer" align="center">>_< | >_< | >_< | >_< | >_< | >_< | >_< | >_< | >_<</div>

<?php echo "<script>window.print()</script>"; ?>

<script src="../../build/js/custom.min.js"></script>
  </body>
</html>


        
