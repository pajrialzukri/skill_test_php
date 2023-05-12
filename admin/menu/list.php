
<script type="text/javascript">
	function ConfirmDelete(id)
	{
		var x = confirm("Apakah Anda Ingin Menghapus Menu?");
		if (x){	
			$.ajax({
				type: "GET",
				url: "menu/delete.php",
				data: {
					id : id
				},
				cache: false,
				success : function(result){
					document.location.reload();
				}
			});
		}else{
			return false;
		}
	}
</script>



<div class="page-header row no-gutters py-4" style="margin-top:50px">
	<div class="col-12  text-sm-left mb-0">
		<h3 class="page-title">Daftar Menu</h3>
	</div>
</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 mb-4">
		<div class="card card-small">
			<div class="card-header border-bottom">
				<!-- <h6 class="m-0">Menu</h6> -->
				<a href="admin.php?page=menu_add" style="float: right; " ><button class="btn btn-primary ">Tambah Menu</button></a>
			</div>
			<div >
			
			</div>
			<div class="card-body pt-2" style="overflow: auto">

				<table id="example" class="table table-bordered table-paginate ">
					<thead class="thead-light">

						<tr>
							<th>No</th>
							<th>Nama Menu</th>
							<th>Harga</th>
							<th>Stok</th>
							<th>Gambar</th>
							<th>Status</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>

					 <?php
					
					$no = 1;
                  $query_menu = "select * from tb_menu order by id_menu desc";
                  $sql_menu = mysqli_query($conn, $query_menu);
                 

                  while($menu = mysqli_fetch_array($sql_menu)){
                ?>

						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $menu['nama_menu'];  ?></td>
							<td><?php echo $menu['harga'] ; ?></td>
							<td><?php echo $menu['stok'] ; ?></td>
							<td ><?php echo "<img src='../gambar/$menu[gambar_menu]' width='70px' height='50px'" ; ?></td>
							<td><?php echo $menu['status_menu'] ; ?></td>
							 <td><a  type="button" href="admin.php?page=menu_edit&id=<?php echo $menu['id_menu']; ?>" class="mb-2 btn btn-outline-warning view_data"><i class="fas fa-edit"></i></a></td>

						<td> <a  Onclick="ConfirmDelete('<?php echo $menu['id_menu']; ?>')" class="mb-2 btn btn-outline-danger" title="Delete"><i class="fa fa-trash"></i></a></td>
						</tr>
						
						<?php } ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>