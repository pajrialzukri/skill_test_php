<?php

include '../koneksi.php' ;


$today = date('Ymd');
$char = 'PSN' . $today;
$query = mysqli_query($conn, "SELECT max(kode_transaksi) as max_id FROM tb_order WHERE kode_transaksi LIKE '{$char}%' ORDER BY kode_transaksi DESC ");
$data = mysqli_fetch_array($query);

$getId = $data['max_id'];
$no = substr($getId, -3, 3);

$no = (int) $no;

$no += 1;

$newId = $char . '-'.sprintf("%03s", $no);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pelayan</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
</head>
<body>
	<div style="background-color: green; color:white; ">
		<div class="container pt-5 pb-3" >
			<div class="row">
				<div class="col-8">
					<h3 >Selamat Datang <b>Staff Pelayan</b></h3>
					<p>Silahkan Lihat Menu yang Tersedia </p>
				</div>
				<div class="col-2">
					<a href="pesan.php" class="btn btn-light">List Pesanan</a>
					
				</div>
				<div class="col-2">
					<a href="../proses_logout.php">
    <button class="btn btn-danger text-right" ><i class="fas fa-sign-out-alt"></i> Logout</button></a>
				</div>
			</div>
			
		</div>
		
	</div>




	<div class="container">
		<div class="row mt-3 ">
			<div class="col-8">
				<h5>Daftar Menu</h5>
				<div class="row mt-3">
					<?php 

					$pesan = array();

					$query_lihat_pesan = "select * from tb_pesan_sementara where status_pesan != 'sudah'";
					$sql_lihat_pesan = mysqli_query($conn, $query_lihat_pesan);

					while($r_dt_pesan = mysqli_fetch_array($sql_lihat_pesan)){
						array_push($pesan, $r_dt_pesan['id_menu']);
					}
					$query_menu = "select * from tb_menu  where stok > 0 order by id_menu desc";
					$sql_menu = mysqli_query($conn, $query_menu);
					while($menu = mysqli_fetch_array($sql_menu)){

						?>
						<div class="col-4">
							<div class="card mb-3" style="width: 12rem; ">
								<img src="../gambar/<?php echo $menu['gambar_menu'];?>" class="card-img-top" alt="..." style="width: 100%; height: 100px" >
								<div class="card-body">
									<table class="table ">
										<tbody>
											<tr>
												<td><?php echo $menu['nama_menu'];?></td>
											</tr>
											<tr>
												<td>Harga / Porsi</td>
												<td>Rp. <?php echo $menu['harga'];?>,-</td>
											</tr>
											<tr>
												<td>Stok</td>
												<td><?php echo $menu['stok'];?> Porsi</td>
											</tr>
										</tbody>
									</table>
									<form action="" method="post">
										<?php
										if(in_array($menu['id_menu'], $pesan)){
											?>
											<button type="submit" value="<?php echo $menu['id_menu'];?>" name="tambah_pesan" class="btn btn-danger btn-mini" disabled>
												<i class="fas fa-shopping-cart"></i></i>&nbsp;&nbsp;Telah dipesan 
											</button>
											<?php
										} else {
											?>
											<button type="submit" value="<?php echo $menu['id_menu'];?>" name="tambah_pesan" class="btn btn-success btn-mini">
												<i class="fas fa-shopping-cart"></i></i>&nbsp;&nbsp;Pesan 
											</button>
											<?php
										}
										?>
									</form>
								</div>
							</div>
						</div>
					<?php } 

					if(isset($_REQUEST['tambah_pesan'])){

						$id_menu = $_REQUEST['tambah_pesan'];
						


						$query_tambah_pesan = "insert into tb_pesan_sementara values('',  '', '$id_menu', '', '')";
						$query_tambah_pesan_asli = "insert into tb_pesan values('',  '', '$id_menu', '', '')";
						
						$sql_tambah_pesan= mysqli_query($conn, $query_tambah_pesan);
						$sql_tambah_pesan_asli= mysqli_query($conn, $query_tambah_pesan_asli);

						$query_lihat_pesannya = "select * from tb_pesan_sementara order by id_pesan desc limit 1";
						$sql_lihat_pesannya = mysqli_query($conn, $query_lihat_pesannya);
						$result_lihat_pesannya = mysqli_fetch_array($sql_lihat_pesannya);

						$id_pesannya = $result_lihat_pesannya['id_pesan'];

						$query_olah_stok = "insert into tb_stok values('', '$id_pesannya', '', 'belum cetak')";
						$sql_olah_stok= mysqli_query($conn, $query_olah_stok);

                        //echo $query_tambah_pesan;
						echo "
						<script type='text/javascript'>
						document.location='beranda.php';
						</script>";	
					}

					?>

				</div>
			</div>

			<div class="col-4 ">
				<form action="" method="post" >
					<h5>Keranjang Pemesanan</h5>
					<table class="table table-bordered table-striped mt-3">
						<thead>
							<tr>
								
								<div class="form-group">
									<label >Kode Pemesanan</label>
									<input type="text" class="form-control"  value="<?php echo $newId; ?>" id="kode_transaksi" name="kode_transaksi" disabled>

								</div> 
							</tr>
							<tr>
								<th style="width: 60%">Menu Pesanan</th>
								<th style="width: 20%">Jumlah</th>
								<th style="width: 20%">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$query_pesan = "select * from tb_pesan_sementara natural join tb_menu where status_pesan != 'sudah'";
							$sql_draft_pesan = mysqli_query($conn, $query_pesan);

							while($pesan = mysqli_fetch_array($sql_draft_pesan)){
								?>
								
								<tr class="odd gradeX" id="form">
									<td><span id="<?php echo "nama".$pesan['id_pesan']; ?>"><?php echo $pesan['nama_menu'];?></span></td>
									<input id="<?php echo "harga".$pesan['id_pesan']; ?>" class="span8" type="hidden" value="<?php echo $pesan['harga'];?>"/>
									<td>
										<center>
											<input id="<?php echo "jumlah".$pesan['id_pesan']; ?>" class="span8" name="jumlah<?php echo $pesan['id_menu']; ?>" type="number" value="" placeholder="" onchange="return operasi()"/>
										</center>

									</td>
									<td>
										<form action="" method="post">
											<button type="submit" value="<?php echo $pesan['id_pesan'];?>" name="hapus_pesan" class="btn btn-danger btn-mini">
												<i class="fa fa-trash"></i>
											</button>
										</form>
									</td>
								</tr>
								<?php
							}
							?>
							<tr class="odd gradeX">
								<td>No. Meja</td>
								<td>
									
									<input type="hidden" id="kode_transaksi" name="kode_transaksi" required="required" value="<?php echo $newId ?>" readonly>
									<center>
										<input class="span8" name="no_meja" type="number" value="" placeholder="" />

									</center>
								</td>
								<td>

								</td>
							</tr>
							<tr class="odd gradeX">
								<td>Total Harga</td>
								<td>
									<center>
										<span class="label label-success">&nbsp;Rp. <span id="total_harga">0</span>,-&nbsp;</span>
										<input class="bg-light" id="tot" name="total_harga" type="hidden" value="" placeholder="" />
									</center>
								</td>
								<td>

								</td>
							</tr>
						</tbody>
					</table>
					<br>
					<center>
						<button type="submit" value="" name="proses_pesan" class="btn btn-mini btn-info" style="color:white">
							<i class="fas fa-share"></i> Proses Pesanan
						</button>

						
						
					</center>
				</form>
				<?php 
				if(isset($_POST['hapus_pesan'])){
					$id_pesan = $_POST['hapus_pesan'];
					$query_hapus_pesan = "delete from tb_pesan_sementara where id_pesan = $id_pesan";
					$sql_hapus_pesan = mysqli_query($conn, $query_hapus_pesan);

					echo "
					<script type='text/javascript'>
					document.location='beranda.php';
					</script>";	
					// if($sql_hapus_pesan){
					// 	header('location: beranda.php');
					// }
				}

				


				if(isset($_POST['proses_pesan'])){


					$kode_transaksi = $_POST['kode_transaksi'];
					$no_meja = $_POST['no_meja'];
					$total_harga = $_POST['total_harga'];
					$uang_bayar = '';
					$uang_kembali = '';
					$status_order = 'belum bayar';

					date_default_timezone_set('Asia/Jakarta');
					$time = Date('YmdHis');
				// echo $time;
					$query_simpan_order = "insert into tb_order values('', '$kode_transaksi',  $time, '$no_meja', '$total_harga', '$uang_bayar', '$uang_kembali', '$status_order')";
					$sql_simpan_order = mysqli_query($conn, $query_simpan_order);



					$query_tampil_order = "select * from tb_order order by id_order desc limit 1  ";
					$sql_tampil_order = mysqli_query($conn, $query_tampil_order);
					$result_tampil_order = mysqli_fetch_array($sql_tampil_order);

					$id_ordernya = $result_tampil_order['id_order'];
					echo $id_ordernya;

					$query_ubah_jumlah = "select * from tb_pesan left join tb_menu on tb_pesan.id_menu = tb_menu.id_menu 
					where  status_pesan != 'sudah'";
					$sql_ubah_jumlah = mysqli_query($conn, $query_ubah_jumlah);
					while($r_ubah_jumlah = mysqli_fetch_array($sql_ubah_jumlah)){
						$tahu = $r_ubah_jumlah['id_menu'];
						$tempe = $_POST['jumlah'.$tahu];
						$id_pesan = $r_ubah_jumlah['id_pesan'];
						$query_stok = "select * from tb_menu where id_menu = $tahu";
						$sql_stok = mysqli_query($conn, $query_stok);
						$result_stok = mysqli_fetch_array($sql_stok);
						$sisa_stok = $result_stok['stok'] - $tempe;
              //echo $tempe;
						$query_proses_ubah =  "update tb_pesan set jumlah = $tempe, id_order = $id_ordernya where id_menu = $tahu  and status_pesan != 'sudah' and id_order = 0";
					

						$query_kurangi_stok = "update tb_menu set stok = $sisa_stok where id_menu = $tahu";

						$query_kelola_stok = "update tb_stok set jumlah_terjual = $tempe where id_pesan = $id_pesan";


						$sql_kelola_stok = mysqli_query($conn, $query_kelola_stok);
						$sql_kurangi_stok = mysqli_query($conn, $query_kurangi_stok);
						$sql_proses_ubah = mysqli_query($conn, $query_proses_ubah);
						

						
					}

					$query_hapus_pesan = "delete from tb_pesan_sementara ";
					$sql_hapus_pesan = mysqli_query($conn, $query_hapus_pesan);

					echo "
					<script type='text/javascript'>
					
					document.location='pesan.php';
					</script>";	
				}


				?>
			</div>

		</div>

	</div>


</div>



<script type="text/javascript">
	function operasi(){
		var pesan = new Array();
		var jumlah = new Array();
		var total = 0;
		for(var a = 0; a < 1000; a++){
			pesan[a] = $("#harga"+a).val();
			jumlah[a] = $("#jumlah"+a).val();
		} 
		for(var a = 0; a < 1000; a++){
			if(pesan[a] == null || pesan[a] == ""){
				pesan[a] = 0;
				jumlah[a] = 0;
			}
			total += Number(pesan[a] * jumlah[a]);
		}

    //alert(total);
    $("#total_harga").text(total);
    $("#tot").val(total);
}
</script>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
</body>
</html>