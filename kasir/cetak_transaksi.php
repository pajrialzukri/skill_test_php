<!DOCTYPE html>
<html lang="en">
<?php
include "../koneksi.php";
session_start();
ob_start();



if(isset($_SESSION['edit_order'])){
  //echo $_SESSION['edit_order'];
  unset($_SESSION['edit_order']);

}


?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>&nbsp;</title>
  
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
<style>

@page{
  size: auto;
}
body {
  background: rgb(204,204,204); 
}

page {
  background: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.1cm rgba(0,0,0,0.5);
}
page[size="A4"] {  
  width: 29.7cm;
  height: 21cm; 
}
page[size="A4"][layout="potrait"] {
  width: 29.7cm;
  height: 21cm;  
}
page[size="A3"] {
  width: 29.7cm;
  height: 42cm;
}
page[size="A3"][layout="landscape"] {
  width: 42cm;
  height: 29.7cm;  
}
page[size="A5"] {
  width: 14.8cm;
  height: 21cm;
}
page[size="A5"][layout="landscape"] {
  width: 21cm;
  height: 19.8cm;  
}
page[size="dipakai"][layout="landscape"] {
  width: 20cm;
  height: 20cm;  
}
@media print {
  body, page {
    margin: auto;
    box-shadow: 0;
  }
}

</style>


</head>

<body>

  <page size="dipakai" layout="landscape">
    <br>
    <div class="container">
      <span id="remove">
        <a class="btn btn-success" id="ct"><span class="icon-print"></span> CETAK</a>
      </span>
    </div>
    <?php
      $id_order = $_REQUEST['konten'];
      $query_order = "select * from tb_order  where id_order = $id_order";
      $sql_order = mysqli_query($conn, $query_order);
      $result_order = mysqli_fetch_array($sql_order);
      //echo $id_order
    ?>
      <center>
        <h4>
          PHP KASIR
        </h4>
        <span>
          Jl. xxxxxxxxx Ds. xxxxxxxxx, Kec. xxxxxxxx, Kab. xxxxxxxx, xxxxxxx<br>
          Telp. +6289 xxx xxx xxx || E-mail phpkasir@gmail.com
        </span>
      </center>
            <hr>
            <div class="container">
              <table style="width: 100%" class="">
                <tr>
                  <td>
                   Kode Transaksi &nbsp;&nbsp;
                  </td>
                  <td>
                  :
                  </td>
                  <td>
                    <?php echo $result_order['kode_transaksi'];?>
                  </td>
                </tr>
              
                <tr>
                  <td>
                    Waktu Pesan
                  </td>
                  <td>
                  :
                  </td>
                  <td>
                    <?php echo $result_order['waktu_pesan'];?>
                  </td>
                </tr>
                <tr>
                  <td>
                    No Meja
                  </td>
                  <td>
                  :
                  </td>
                  <td>
                    <?php echo $result_order['no_meja'];?>
                  </td>
                </tr>
              </table>

              <hr>

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="head0">No.</th>
                    <th class="head1">Menu</th>
                    <th class="head0 right">Jumlah</th>
                    <th class="head1 right">Harga</th>
                    <th class="head0 right">Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no_order_fiks = 1;
                    $query_order_fiks = "select * from tb_pesan natural join tb_menu where id_order = $id_order";
                    $sql_order_fiks = mysqli_query($conn, $query_order_fiks);
                    //echo $query_order_fiks;
                    while($r_order_fiks = mysqli_fetch_array($sql_order_fiks)){
                  ?>
                  <tr>
                    <td><center><?php echo $no_order_fiks++; ?>. </center></td>
                    <td><?php echo $r_order_fiks['nama_menu'];?></td>
                    <td class="right"><center><?php echo $r_order_fiks['jumlah'];?></center></td>
                    <td class="right">Rp. <?php echo $r_order_fiks['harga'];?>,-</td>
                    <td class="right">
                      <strong>
                        Rp.
                        <?php 
                          $hasil = $r_order_fiks['harga'] * $r_order_fiks['jumlah'];
                          echo $hasil;
                        ?>,-
                      </strong>
                    </td>
                  </tr>
                  <?php
                    }
                    $query_harga = "select * from tb_order where id_order = $id_order";
                    $sql_harga = mysqli_query($conn, $query_harga);
                    $result_harga = mysqli_fetch_array($sql_harga);
                  ?>

                  <tr>
                    <td></td>
                    <td><strong><center>Total</center></strong></td>
                    <td class="right"></td>
                    <td class="right"></td>
                    <td class="right"><strong>Rp. <?php echo $result_harga['total_harga'];?>,-</strong></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td><strong><center>Uang Bayar</center></strong></td>
                    <td class="right"></td>
                    <td class="right"></td>
                    <td class="right"><strong>Rp. <?php echo $result_harga['uang_bayar'];?>,-</strong></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td><strong><center>Uang Kembali</center></strong></td>
                    <td class="right"></td>
                    <td class="right"></td>
                    <td class="right"><strong>Rp. <?php echo $result_harga['uang_kembali'];?>,-</strong></td>
                  </tr>
                </tbody>
              </table>
              	</div>
            <hr>
            <center>
              <h5>
                TERIMAKASIH ATAS KUNJUNGANNYA
              </h5>
            </center>
            <hr>
            
  </page>
</body>


<script type="text/javascript">
  document.getElementById('ct').onclick = function(){
    $("#remove").remove();
    window.print();
  }
  $(document).ready(function(){
    $("remove").remove();

  });
 
</script>


<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
</html>
