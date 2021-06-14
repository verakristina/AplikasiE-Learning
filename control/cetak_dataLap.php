<?php include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Laporan Data Pengiriman</title>
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">





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
  <?php $date = date("Y-m-d") ?>


<strong><h3 align="center"><b> Laporan Data Pengiriman</h3></strong>
<strong><h4 align="center"><b> Priode : <?php echo tgl_indo($date) ?> </h4></strong>
<br>
                   <table id="" class="table table-bordered">
                            <?php
                              $sql=mysqli_query($koneksi,"SELECT * FROM pengiriman");
                            ?>
                    <thead>
                        <tr width="100%" bgcolor="#DCDCDC" >
                          <th width="10%"> Id Pengiriman </th>
                          <th width="12%">Nama Pengirim</th>
                          <th width="15%">Id Layanan</th>
                          <th width="12%">Id Tujuan</th>
                          <th width="15%">Tanggal Pengiriman</th>
                          <th width="15%">Berat</th>
                          <th width="15%">Biaya Paket</th>
                          <th width="25%">Total Biaya</th>

                          </tr>
                    </thead>
                     <?php 
                  $query = ("SELECT * FROM pengiriman");
                  $hasil_query = mysqli_query($koneksi,$query);
                  $number = 1;
                  while ($row = mysqli_fetch_array($hasil_query)) {
                ?>
                      <tr>
                      <td><?php echo $row['id_pengiriman']; ?></td>
                      <td><?php echo $row['nm_pengirim']; ?></td>
                      <td><?php echo $row['id_layanan']; ?></td>
                      <td><?php echo $row['id_tujuan']; ?></td>
                      <td><?php echo $row['tanggal_pengiriman']; ?></td>
                      <td><?php echo $row['berat']; ?> Kg</td>
                      <td>Rp. <?php echo number_format($row['biaya_paket']) ?>,-</td>
                      <td>Rp. <?php echo number_format($row['total_biaya']) ?>,-</td>      
                      </tr>
                        <?php } ?>

                    </div>
                    </tbody>
                    </table><br><br><br>
                    <table border="0" width="100%">
                      <tr>
                        <td height="10px" width="25"></td>
                        <td width="50%"></td>
                        <td width="25%" align="center">Malang, <?php echo tgl_indo($date) ?><br><br> Hormat Kami</td>
                      </tr>
                        <td height="100px"></td>
                        <td></td>
                        <td></td>
                      </tr>
                     <tr>
                        <td ></td>
                        <td></td>

                        <td align="center">(___________________)</td>
                      </tr>
                      <tr>


                    </table>
              
                    <?php echo "<script>window.print()</script>"; ?>





<script src="../../build/js/custom.min.js"></script>
  </body>
</html>


        
