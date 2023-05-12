<?php
include "../../koneksi.php";

$nama_menu = $_POST['nama_menu'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
if($stok > 0){
	$status_menu = 'Tersedia';
} else {
	$status_menu = 'Habis';
}

$direktori = "../../gambar/";  

$tmp_name = $_FILES["gambar_menu"]["tmp_name"];
$name = pathinfo($_FILES["gambar_menu"]["name"], PATHINFO_EXTENSION);
$nama_baru = $_POST['nama_menu'].".".$name;
move_uploaded_file($tmp_name, $direktori."/".$nama_baru);
$gambar_menu = $nama_baru;

$query_tambah_menu = "insert into tb_menu values ('','$nama_menu','$harga','$stok','$status_menu','$gambar_menu')";
$sql_tambah_menu= mysqli_query($conn, $query_tambah_menu);
              // if($sql_tambah_menu){
              //   header('location: entri_referensi.php');
              // }



echo "
<script type='text/javascript'>
document.location='../admin.php?page=menu';
</script>";		

?>