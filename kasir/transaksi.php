<?php 
include '../koneksi.php';



 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Kasir</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
</head>
<body>
<div style="background-color: green; color:white; ">
		<div class="container pt-5 pb-3" >
			<div class="row">
				<div class="col-10">
					<h3 >Selamat Datang <b>Staff Kasir</b></h3>
					<p>Silahkan Lakukan Pembayaran  </p>
				</div>
				
				<div class="col-2">
					<a href="../proses_logout.php">
    <button class="btn btn-danger text-right" ><i class="fas fa-sign-out-alt"></i> Logout</button></a>
				</div>
			</div>
			
		</div>
		
	</div>

<div class="container pt-5">
    <div class="row-fluid">
    <?php
     	$id = !empty($_GET['id']) ? $_GET['id'] : "";
		$query = "
		select * from tb_order where id_order = '$_GET[id]'";
		$sql = mysqli_query($conn, $query) or die("Error Executing The Data(s)");

		$pesan = mysqli_fetch_array($sql);

		$test = $pesan['kode_transaksi'];
    ?>
      <div class="span7">
        <div class="widget-box">
          <div class="widget-title bg_lg"><span class="icon"><i class="icon-th-large"></i></span>
            <h5>Transaksi Pembayaran (<?php echo $pesan['kode_transaksi'];?>)</h5>
          </div>
          <div class="widget-content nopadding" >
            <table class="table table-bordered table-invoice-full">
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
                  $no = 1;
                
                  $query_order_fiks = "select * from tb_pesan left join tb_menu on tb_pesan.id_menu = tb_menu.id_menu  where id_order = $id and  status_pesan != 'sudah'";
                  $sql_order_fiks = mysqli_query($conn, $query_order_fiks);
                  //echo $query_order_fiks;
                  while($r_order_fiks = mysqli_fetch_array($sql_order_fiks)){
                ?>
                <tr>
                  <td><center><?php echo $no++; ?>. </center></td>
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
                  $query_harga = "select * from tb_order where  id_order = '$_GET[id]' and status_order = 'belum bayar'";
                  $sql_harga = mysqli_query($conn, $query_harga);
                  $result_harga = mysqli_fetch_array($sql_harga);
                ?>

                <tr>
                  <td></td>
                  <td><strong><center>Total</center></strong></td>
                  <td class="right"></td>
                  <td class="right"></td>
                  <td class="right"><strong>Rp. <span id="total_biaya"><?php echo $result_harga['total_harga'];?></span>,-</strong></td>
                </tr>
                <tr>
                  <td></td>
                  <td><strong><center>No. Meja</center></strong></td>
                  <td class="right"></td>
                  <td class="right"></td>
                  <td class="right"><center><strong><?php echo $result_harga['no_meja'];?></strong></center></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="widget-content nopadding" >
            <form action="#" method="post" class="form-horizontal">
              <div class="control-group">
                <label class="control-label">Membayar : Rp.</label>
                <div class="controls">
                  <input type="number" id="uang_bayar" name="uang_bayar" class="span11" placeholder="" onchange="return operasi()" required />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Kembalian : Rp.</label>
                <div class="controls">
                  <input type="number" id="uang_kembali1" class="span11" placeholder="" disabled="" />
                  <input type="hidden" id="uang_kembali" name="uang_kembali" class="span11" placeholder=""/>
                </div>
              </div>
              <p></p>
              <center>
                <button type="submit" value="<?php echo $result_harga['id_order'];?>" name="save_order" class="btn btn-success btn-mini">
                 <i class="fas fa-print"></i>
                  &nbsp;&nbsp;Transaksi Selesai&nbsp;&nbsp;
                </button>
               <!--  <button type="submit" value="" name="back_order" class="btn btn-danger btn-mini">
                 <i class="fas fa-backspace"></i>
                  &nbsp;&nbsp;Kembali&nbsp;&nbsp;
                </button> -->

                <button type="button" class="btn btn-secondary" onclick="history.back();"><i class="fas fa-backspace"></i>
                  &nbsp;&nbsp;Kembali&nbsp;&nbsp;
                </button></button>
              </center>
              <p></p><br>
            </form>
          </div>
        </div>
      </div>
      <?php
          if(isset($_REQUEST['back_order'])){
            // if(isset($_SESSION['edit_order'])){
            //   unset($_SESSION['edit_order']);
              
            // }
             echo "
					<script type='text/javascript'>
					document.location='beranda.php';
					</script>";	
          }

          if(isset($_REQUEST['save_order'])){
            if(isset($_SESSION['edit_order'])){
              unset($_SESSION['edit_order']);
            }
            $uang_bayar = $_POST['uang_bayar'];
            $uang_kembali = $_POST['uang_kembali'];
            $query_save_transaksi = "update tb_order set  uang_bayar = $uang_bayar, uang_kembali = $uang_kembali, status_order = 'sudah bayar' where id_order = '$_GET[id]'";
            echo $query_save_transaksi;
            $sql_save_transaksi = mysqli_query($conn, $query_save_transaksi);

            $query_selesai_pesan = "update tb_pesan set status_pesan = 'sudah' where id_order = '$_GET[id]' ";
            $sql_selesai_pesan = mysqli_query($conn, $query_selesai_pesan);
            // if($sql_selesai_pesan){
            //   header('location: beranda.php');
            // }
            echo "
					<script type='text/javascript'>
					document.location='beranda.php';
					</script>";	
          }
       
      ?>
    </div>
<script type="text/javascript">
  function operasi(){
    var total_biaya = $("#total_biaya").text();
    var uang_bayar = $("#uang_bayar").val();
    var kembalian = Number(uang_bayar - total_biaya);
    if(kembalian < 0){
      alert("Uang pembayaran kurang !");
      return false;
    }
    $("#uang_kembali1").val(kembalian);
    $("#uang_kembali").val(kembalian);
  }
</script>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
</body>
</html>