<?php
$curr_file = basename($_SERVER["SCRIPT_FILENAME"]);
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="gym.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<title></title>
</head>
<body>
	<div class="container"> 

	<?php
		if($curr_file !== 'login.php'){ 
			session_start();

			if(!isset($_SESSION['username'])){
				header('location:login.php');
	
			}
			
			?>
			
			<div class="member-wrap">
				<div class="float-left p-2">
					Loged In As <?= $_SESSION['username'] ?>
				</div>

				<div class="text-right p-1">
					<form action="logout.php">
						<button type="submit" name="submit" class="btn btn-outline-secondary">Logout</button>
					</form>
				</div>
			</div>

            <header>
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
						<h2 class="navbar-brand gymnovate">Gymnovate</h2>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
							<div class="navbar-nav">
								<a class="nav-item nav-link <?= $curr_file == 'addmembers.php' ? 'active' : '' ?>" href="addmembers.php">Add Member</a>
								<a class="nav-item nav-link <?= $curr_file == 'fees_submit.php' ? 'active' : '' ?>" href="fees_submit.php">Add Fees</a>
								<a class="nav-item nav-link <?= $curr_file == 'trash.php' ? 'active' : '' ?>" href="trash.php">Trash</a>
							</div>
						</div>
						<form class="form-inline" method="POST" action="search.php">
							<input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" value="<?php if(!empty($_POST['search'])) echo $_POST['search'] ?>" aria-label="Search">
							<button class="btn btn-outline-secondary my-2 my-sm-0" type="submit" >Search</button>
						</form>
					</nav> 
				</header>
			<?php
        }		
?>