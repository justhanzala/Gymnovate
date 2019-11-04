<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="gym.css">

	<title></title>
</head>
<body>
	<div class="container">
		
		<header>
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				 	<h2 class="navbar-brand">Gymnovate</h2>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				   		<div class="navbar-nav">
				    	 	<a class="nav-item nav-link" href="addmembers.php">Add Member</a>
				    		<a class="nav-item nav-link" href="fees_submit.php">Add Fees</a>
				    		<a class="nav-item nav-link" href="trash.php">Trash</a>
				     	</div>
				  	</div>

				  	<form class="form-inline" method="POST" action="search.php">
			  			<input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
			    		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			 		</form>

				</nav> 
		</header>