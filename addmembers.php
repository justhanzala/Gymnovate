<?php 
	include "functions.php";
	$message = array("text" => "", "status" => "");
	if (isset($_POST["submit"])) {
		$name = $_POST["name"];
		$mobile = $_POST["mobile"];
		$doj = $_POST["doj"];
		if ($name == "" || $mobile == "" || $doj == "") {		
			$message['text'] = "Something is Empty!";				
			$message['status'] = "alert-danger";				
		}else{
			$insert = insertdata("members", "full_name, mobile_number, doj", "".$name.", ".$mobile.", ".$doj."");
			if ($insert) {			
				$message['text'] = "Data successfully entered";
				$message['status'] = "alert-success";
			}else{			
				$message['text'] = $conn->error;
				$message['status'] = "alert-danger";
			}
		}
	}

	//hanzala

		$div = 0;
	$members_data = getMembersData("*");
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
	<link rel="stylesheet" type="text/css" href="style.css">
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
		    	 	<a class="nav-item nav-link active" href="addmembers.php">add member</a>
		    		<a class="nav-item nav-link" href="fees_submit.php">add fees</a>
		    		<a class="nav-item nav-link" href="trash.php">trash peoples</a>
		     	</div>
		  	</div>



		  	<form class="form-inline" method="POST" action="search.php">
	  			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
	    		<a href="search.php?full_name=<?= $members_data[$div]['full_name'] ?>"><button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Search</button></a>
	 		</form>



		</nav>
		<div class="col-12 text-center">
      		<h1>Add Gym Member.</h1>
    	</div>
		<form class="form-inline d-flex justify-content-center mt-4 mb-4" method="post">
		    <div class="form-group">
		      <input type="text" class="form-control rounded-0" id="name" placeholder="Enter Full Name" name="name">
		    </div>
		    <div class="form-group">
		      <input type="text" class="form-control rounded-0" id="mobile" placeholder="Enter Mobile Number" name="mobile">
		    </div>
		    <div class="input-group">
				  <input type="date" class="form-control rounded-0" placeholder="Date" name="doj">
				  <div class="input-group-append">
				  	<input type="submit" name="submit" class="btn btn-outline-secondary rounded-0" value="Submit">
				  </div>
			</div>
		</form>
		<div class='col-md-12 text-center mt-1'>
			<div class='alert <?= $message['status'] ?>'><?= $message['text']; ?></div>
		</div> <?php
		for ($div = 0; $div < $memberDataCount; $div++) { ?>
			<div class="justify-content-center member-wrap p-4 rounded m-2">
				<div class="float-right">
					<a href="update_member.php?member_id=<?= $members_data[$div]['member_id'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
					<a href="delete_member.php?member_id=<?= $members_data[$div]['member_id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
				</div>
				<h2><?= $members_data[$div]['member_id'] ?>. <?= $members_data[$div]['full_name'] ?> </h2>
				<p><?=  $members_data[$div]['mobile_number'] ?></p>
				<p class="float-right"><?= $members_data[$div]['doj'] ?></p>
    		</div>
		<?php }
		?>
	</div> <!-- container -->
</body>
</html>