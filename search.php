<?php

	include "functions.php";
	$members_data = getMembersData("*", 1, $full_name);
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title></title>
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		 	<h2 class="navbar-brand">gymnovate</h2>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		   		<div class="navbar-nav">
		    	 	<a class="nav-item nav-link" href="addmembers.php">add member</a>
		    		<a class="nav-item nav-link" href="fees_submit.php">add fees</a>
		    		<a class="nav-item nav-link" href="trash.php">trash peoples</a>
		     	</div>
		  	</div>

		  	<form class="form-inline" method="POST" action="search.php">
	  			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
	    		<button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Search</button>
	 		</form>

		</nav>

			
	</div>
</body>
</html>