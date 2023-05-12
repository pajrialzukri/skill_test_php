<?php
include "../../koneksi.php";
$id = $_GET['id'];


$query_lihat = "select * from tb_menu where id_menu = $id";
$sql_lihat = mysqli_query($conn, $query_lihat);
$result_lihat = mysqli_fetch_array($sql_lihat);
if(file_exists('../../gambar/'.$result_lihat['gambar_menu'])){
                        //echo $result_lihat['gambar_menu'];
	unlink('../../gambar/'.$result_lihat['gambar_menu']);
}

$del = "delete from tb_menu
where id_menu = '$id'";
$q_del = mysqli_query($conn, $del);

?>