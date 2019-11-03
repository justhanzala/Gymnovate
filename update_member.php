<?php
	include "functions.php";
	$member_id = $_GET['member_id'];
	$member_data = getMembersData("*", 1, $member_id);
	$message = array("text" => "", "status" => "");
	if (isset($_POST['submit'])) {
		$full_name = $_POST['name'];
		$mobile_number = $_POST['mobile'];
		$doj = $_POST['doj'];
		$message = array("text" => "", "status" => "");
		$colmns = array('full_name' => $full_name, 'mobile_number' => $mobile_number, 'doj' => $doj);
		$update = updatemember("members", $colmns, $member_id);
		if ($update) {			
			$message['text'] = "'".$full_name."' your info successfully updated";
			$message['status'] = "alert-success";
		}else{			
			$message['text'] = $conn->error;
			$message['status'] = "alert-danger";
		}
		?> <script type="text/javascript">
			setTimeout(function(){
				window.location.replace("addmembers.php");
			}, 4000);
		</script> <?php
	}
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
		<div class="col-12 text-center">
      		<h1>update member info.</h1>
    	</div>
		<form class="form-inline d-flex justify-content-center mt-4 mb-4" method="post">
		    <div class="form-group">
		      <input type="text" class="form-control rounded-0" id="name" placeholder="Enter Full Name" name="name" value="<?= $member_data[0]['full_name']; ?>">
		    </div>
		    <div class="form-group">
		      <input type="text" class="form-control rounded-0" id="mobile" placeholder="Enter Mobile Number" name="mobile" value="<?= $member_data[0]['mobile_number']; ?>">
		    </div>
		    <div class="input-group">
				  <input type="date" class="form-control rounded-0" placeholder="Date" name="doj" value="<?= $member_data[0]['doj']; ?>">
				  <div class="input-group-append">
				  	<input type="submit" name="submit" class="btn btn-outline-secondary rounded-0" value="Submit">
				  </div>
			</div>
		</form>
		<div class='col-md-12 text-center mt-1 d-flex justify-content-center align-items-center' style="height: 100vh">
			<div class='alert <?= $message['status'] ?>'><?= $message['text']; ?></div>
		</div>
	</div>	
</body>
</html>