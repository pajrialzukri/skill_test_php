<?php
$id = !empty($_GET['id']) ? $_GET['id'] : "";
$query = "
select * from tb_menu where id_menu = '$_GET[id]'
";
$sql = mysqli_query($conn, $query) or die("Error Executing The Data(s)");

$menu = mysqli_fetch_array($sql);
?>

<div class="main-content-container container-fluid px-4" style="margin-top:50px">
	<!-- Page Header -->
	<div class="page-header row no-gutters py-4">
		<div class="col-12 col-sm-4  text-sm-left mb-0">
			<h3 class="page-title">Edit Menu</h3>
		</div>
	</div>
	<!-- End Page Header -->
	<!-- Default Light Table -->
	<div class="row">

		<div class="col-lg-12">
			<div class="card card-small mb-4">
				<ul class="list-group list-group-flush">
					<li class="list-group-item p-3">
						<div class="row">
							<div class="col">
								<form enctype="multipart/form-data" action="menu/edit_post.php" method="post"  role="form">
									<div class="modal-body">
										<div class="md-form mb-3" style="margin-top:-15px;">
											<label data-error="wrong" data-success="right" for="defaultForm-email">Nama Menu : </label>
											<input type="text" id="nama_menu" name="nama_menu" value="<?php echo $menu['nama_menu']; ?>" class="form-control validate">
										</div>
										<div class="md-form mb-3" style="margin-top:-15px;">
											<label data-error="wrong" data-success="right" for="defaultForm-email">Harga / Porsi: </label>
											<input type="number" id="harga" name="harga" value="<?php echo $menu['harga']; ?>" class="form-control validate">
										</div>
										<div class="md-form mb-3" style="margin-top:-15px;">
											<label data-error="wrong" data-success="right" for="defaultForm-email">Stok : </label>
											<input type="number" id="stok" name="stok" value="<?php echo $menu['stok']; ?>" class="form-control validate">
										</div>
										

										<div class="input-group md-form mb-3">
											<label data-error="wrong" data-success="right" for="defaultForm-email">Upload Image:</label>
											<div class="input-group mb-3">
												
												<input type="file" class="form-control-file form-control validate" id="gambar_menu" name="gambar_menu">

											</div>

											 <img src="../gambar/<?php echo $menu['gambar_menu'];?>" id="previewne" class="rounded border p-1" style="width:110px; height:70px;">
										</div>

										  <input type="hidden" class="form-control" name="id_menu" id="id_menu" value="<?php echo $menu['id_menu']; ?>">	
										<div style="float: right;">										
										<button type="button" class="btn btn-secondary" onclick="history.back();">Back</button>
										<button type="submit" class="btn btn-primary">Save</button>
										</div>

									</div>
								</form>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- End Default Light Table -->
</div>