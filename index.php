<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
</head>
<body class="bg-success">
	<div class="container py-5 h-100">
		<div class="row d-flex justify-content-center align-items-center h-100">
			<div class="col-12 col-md-8 col-lg-6 col-xl-5">
				<div class="card " style="border-radius: 1rem;">
					<div class="card-body p-4 text-center">
						<form action="proses_login.php" method="post">
							<h2 class=" mb-5 "  >Login Akun</h2>
							<!-- Email input -->
							<div class="form-group">
								<div class="input-group mb-3">
									<div class="input-group input-group-seamless">
										<span class="input-group-prepend">
											<span class="input-group-text pb-3 pt-3">
												<i class="fas fa-user"></i>
											</span>
										</span>
										<input type="text" class="form-control"  placeholder="Username" name="username" > 
									</div>
								</div>

								<div class="input-group mb-3">
									<div class="input-group input-group-seamless">
										<span class="input-group-prepend">
											<span class="input-group-text pb-3 pt-3">
												<i class="fas fa-lock"></i>
											</span>
										</span>
										<input type="password" class="form-control"  placeholder="Password" name="password" > 
									</div>
								</div>

								<!-- Submit button -->
								<button type="submit" class="btn btn-primary px-5 mt-3 mb-3">Login</button>
							</form>
						</div>
					</div>
				</div>
			</div>


			<div class=" mt-5  ">
				<div class="row ">
					<div class="col">
						<div class="card" style="width: 18rem;">
							<div class="card-body">
								<h5 class="card-title">Login Admin</h5>
								<p>Username : <b>admin</b> </p>
								<p>password : <b>123</b> </p>
							</div>
						</div>



					</div>
					<div class="col">
						<div class="card" style="width: 18rem;">
							<div class="card-body">
								<h5 class="card-title">Login Pelayan</h5>
								<p>Username : <b>pelayan</b> </p>
								<p>password : <b>123</b> </p>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card" style="width: 18rem;">
							<div class="card-body">
								<h5 class="card-title">Login Kasir</h5>
								<p>Username : <b>kasir</b> </p>
								<p>password : <b>123</b> </p>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
	</body>
	</html>