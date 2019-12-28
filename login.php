<head>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<?php
	include "functions.php";
	include "header.php";

	if(isset($_POST["submit"])){
		$username = $_POST["Username"];
		$Password = $_POST["Password"];
		session_start();

		$GetUsersData = GetUsersData($username, $Password);
		
		if($GetUsersData == true){
			$_SESSION['username'] = $username;
			header('location:index.php');
		} else{ ?>
			<script type="text/javascript">
					Swal.fire({
						position: 'top',
						icon: 'error',
						title: 'username or password was wrong!',
						showConfirmButton: false,
						timer: 1500
					})
			</script>

			<?php
		}
	}
?>
	<div class="row d-flex align-item-center">

		<div class="col-sm-9 col-md-7 col-lg-5 m-auto">
			<div class="card card-signin my-5">
				<div class="card-body">
					<h5 class="card-title text-center">Login</h5>

					<form class="form-signin" method="POST">
						<div class="form-label-group">
							<input type="username" id="inputEmail" class="form-control" placeholder="Username" name="Username" required autofocus>
						</div>

						<div class="form-label-group">
							<input type="password" id="inputPassword" class="form-control" placeholder="Password" name="Password" required>
						</div>

						<div class="custom-control custom-checkbox mb-3">
							<input type="checkbox" class="custom-control-input" id="customCheck1">
							<label class="custom-control-label" for="customCheck1">Remember password</label>
						</div>

						<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit">Login</button>
						<hr class="my-4">
					</form>

				</div>
			</div>
		</div>
	</div>
<?php
	include "footer.php";
?>