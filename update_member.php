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
	include "header.php";
?>
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
	<?php include "footer.php"; ?>