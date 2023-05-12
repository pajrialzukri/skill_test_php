

<div class="main-content-container container-fluid px-4" style="margin-top:50px">
	<!-- Page Header -->
	<div class="page-header row no-gutters py-4">
		<div class="col-12 col-sm-4  text-sm-left mb-0">
			<h3 class="page-title">Input Menu Baru</h3>
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
								<form enctype="multipart/form-data" action="menu/add_post.php" method="post"  role="form">
									<div class="modal-body">
										<div class="md-form mb-3" style="margin-top:-15px;">
											<label data-error="wrong" data-success="right" for="defaultForm-email">Nama Menu : </label>
											<input type="text" id="nama_menu" name="nama_menu" class="form-control validate">
										</div>
										<div class="md-form mb-3" style="margin-top:-15px;">
											<label data-error="wrong" data-success="right" for="defaultForm-email">Harga / Porsi: </label>
											<input type="number" id="harga" name="harga" class="form-control validate">
										</div>
										<div class="md-form mb-3" style="margin-top:-15px;">
											<label data-error="wrong" data-success="right" for="defaultForm-email">Stok : </label>
											<input type="number" id="stok" name="stok" class="form-control validate">
										</div>
										

										<div class="input-group md-form mb-3">
											<label data-error="wrong" data-success="right" for="defaultForm-email">Upload Image:</label>
											<div class="input-group mb-3">
												
												<input type="file" class="form-control-file form-control validate" id="gambar_menu" name="gambar_menu">

											</div>
										</div>

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