<?php 

include "../../koneksi.php";
$id_menu=$_POST['id_menu'];
$nama_menu = $_POST['nama_menu'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
if($stok > 0){
	$status_menu = 'Tersedia';
} else {
	$status_menu = 'Habis';
}
$gbr = $_FILES["gambar_menu"]["name"];

$query_ubah_menu = "update tb_menu set nama_menu = '$nama_menu', harga = '$harga', stok = '$stok', status_menu = '$status_menu' where id_menu = '$id_menu'";;
$sql_ubah_menu = mysqli_query($conn, $query_ubah_menu);

              //$gambar = file($_POST['gambar']);
if($gbr != "" || $gbr != null){
	$direktori = "../../gambar/";  

	$tmp_name = $_FILES["gambar_menu"]["tmp_name"];
	$name = pathinfo($_FILES["gambar_menu"]["name"], PATHINFO_EXTENSION);
	$nama_baru = $_POST['nama_menu'].".".$name;
	unlink('../../gambar/'.$gambar_menu);
	move_uploaded_file($tmp_name, $direktori."/".$nama_baru);
	$gambar = $nama_baru;

	$query_ubah_gambar = "update tb_menu set gambar_menu = '$gambar' where id_menu = '$id_menu'";;
	$sql_ubah_gambar = mysqli_query($conn, $query_ubah_gambar);
}



echo "
<script type='text/javascript'>
document.location='../admin.php?page=menu';
</script>";	

?>