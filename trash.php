<?php
	include "functions.php";
	$members_data = getMembersData("*", 0);
	$memberDataCount = count($members_data);
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<title></title>
	<style type="text/css">
		.member-wrap{
			background-color: #f0f5f1;
		}
	</style>
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
	    			<a class="nav-item nav-link active" href="trash.php">trash peoples</a>
	     		</div>
	  		</div>
	  		<form class="form-inline">
  				<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
 			</form>
		</nav>
		<div class="col-12 text-center">
      		<h1> Trash </h1>
    	</div>
		<?php
		for ($div = 0; $div < $memberDataCount; $div++) { ?>
				<div class="justify-content-center member-wrap p-4 rounded m-2">
					<div class="float-right">
						<a href="restore.php?member_id=<?= $members_data[$div]['member_id'] ?>"><i class="fa fa-refresh" aria-hidden="true"></i></a>
						<a href="trashmember.php?member_id=<?= $members_data[$div]['member_id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
					</div>
					<h2><?= $members_data[$div]['member_id'] ?>. <?= $members_data[$div]['full_name'] ?> </h2>
					<p><?=  $members_data[$div]['mobile_number'] ?></p>
					<p class="float-right"><?= $members_data[$div]['doj'] ?></p>
	    		</div>
	    	<?php
	    }
			?>			
	</div>
</body>
</html>