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
   
      <div class="span7">
        <div class="widget-box">
          <div class="widget-title bg_lg"><span class="icon"><i class="icon-th-large"></i></span>
            <h5>Belum Bayar</h5>
          </div>
          <div class="widget-content nopadding" >
            <table class="table table-bordered table-invoice-full">
              <thead>
                <tr>
                  <th class="head0">No. Meja</th>
                  <th class="head1">Kode Transaksi</th>
                  <th class="head0 right">Total Harga</th>
                  <th class="head0 right">Bayar</th>
                  <th class="head0 right">Hapus</th>


                </tr>
              </thead>
              <tbody>
                <?php
                  $query_order = "select * from tb_order where status_order = 'belum bayar'";
                  $sql_order = mysqli_query($conn, $query_order);
                  while($order = mysqli_fetch_array($sql_order)){
                ?>
                <tr>
                  <td><center><?php echo $order['no_meja']; ?>. </center></td>
                  <td><?php echo $order['kode_transaksi'];?></td>
                  <td class="right"><center>Rp. <?php echo $order['total_harga'];?>,-</center></td>
                  <td>
                  	<a  type="button" href="transaksi.php?id=<?php echo $order['id_order']; ?>" class="btn btn-success btn-mini"><i class="fas fa-edit"></i>&nbsp;&nbsp;Transaksi</a></td>
                  <td>	
                    <form action="" method="post">
                      <button type="submit" value="<?php echo $order['id_order'];?>" name="hapus_order" class="btn btn-mini btn-danger"><i class="fa fa-trash"></i>&nbsp; Hapus</button>
                    </form>
                  </td>
                </tr>
                <?php
                  }
                  // if(isset($_REQUEST['edit_order'])){
                  //   $id_order = $_REQUEST['edit_order'];
                  //   $_SESSION['edit_order'] = $id_order;
                  //   header('location: transaksi.php');
                  // }

                  if(isset($_REQUEST['hapus_order'])){
                    $id_order = $_REQUEST['hapus_order'];
                    $query_hapus_order = "delete from tb_order where id_order = $id_order";
                    $query_hapus_pesan_order = "delete from tb_pesan where id_order = $id_order";
                    $sql_hapus_order = mysqli_query($conn, $query_hapus_order);
                    $sql_hapus_pesan_order = mysqli_query($conn, $query_hapus_pesan_order);
                    // if($sql_hapus_order){
                    //   header('location: entri_transaksi.php');
                    // }
                       echo "
					<script type='text/javascript'>
					document.location='beranda.php';
					</script>";	
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="span9 pt-5 pb-3">
        <div class="widget-box">
          <div class="widget-title bg_lg"><span class="icon"><i class="icon-th-large"></i></span>
            <h5>Transaksi Selesai</h5>
          </div>
          <div class="widget-content nopadding" >
            <table class="table table-bordered table-invoice-full">
              <thead>
                <tr>
                  <th class="head0">No.</th>
                  <th class="head0">Waktu Pesan</th>
                  <th class="head1">Kode Transaksi</th>
                  <th class="head0">No Meja</th>
                  <th class="head0 right">Total Harga</th>
                  <th class="head0 right">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $nomor = 1;
                  $query_sudah_order = "select * from tb_order  where status_order = 'sudah bayar' order by id_order desc";
                  $sql_sudah_order = mysqli_query($conn, $query_sudah_order);
                  while($r_sudah_order = mysqli_fetch_array($sql_sudah_order)){
                ?>
                <tr>
                  <td><center><?php echo $nomor++; ?>. </center></td>
                  <td><?php echo $r_sudah_order['waktu_pesan'];?></td>
                  <td><?php echo $r_sudah_order['kode_transaksi'];?></td>
                  <td><?php echo $r_sudah_order['no_meja'];?></td>
                  <td>Rp. <?php echo $r_sudah_order['total_harga'];?>,-</td>
                  <td>
                    <form action="" method="post">
                      <button type="submit" value="<?php echo $r_sudah_order['id_order'];?>" name="hapus_transaksi" class="btn btn-mini btn-danger">
                       <i class="fa fa-trash"></i>
                        &nbsp; Hapus
                      </button>
                      <a target='_blank' href="cetak_transaksi.php?konten=<?php echo $r_sudah_order['id_order'];?>" class="btn btn-mini btn-success">
                        <i class="fas fa-print"></i>
                        &nbsp; Cetak
                      </a>
                    </form>
                  </td>
                </tr>
                <?php
                  }
                  if(isset($_REQUEST['hapus_transaksi'])){
                    $id_order = $_REQUEST['hapus_transaksi'];
                    $query_hapus_transaksi = "delete from tb_order where id_order = $id_order";
                    $query_hapus_pesan = "delete from tb_pesan where id_order = $id_order";
                    $sql_hapus_transaksi = mysqli_query($conn, $query_hapus_transaksi);
                    $sql_hapus_pesan = mysqli_query($conn, $query_hapus_pesan);
                    if($sql_hapus_transaksi){
                      header('location: entri_transaksi.php');
                    }
                  }

                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
     
    </div>



<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
</body>
</html>