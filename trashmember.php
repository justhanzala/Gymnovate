<?php
	include "functions.php";
	$message = array("text" => "", "status" => "");
	$member_id = $_GET['member_id'];

	$member_delete = deletemember("members", $member_id);
	$member_fee_delete = deletemember("members_fee", $member_id);
	
	if ($member_delete && $member_fee_delete) {			
			$message['text'] = "Member with ID '".$member_id."' successfully deleted";
			$message['status'] = "alert-success";
	}else{			
			$message['text'] = $conn->error;
			$message['status'] = "alert-danger";
		}

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<title></title>
</head>
<body>
	<div class='col-md-12 text-center mt-1 d-flex justify-content-center align-items-center' style="height: 100vh">
			<div class='alert <?= $message['status'] ?>'><?= $message['text']; ?></div>
		</div>
</body>
</html>
<script type="text/javascript">
	setTimeout(function(){
		window.location.replace("trash.php");
	}, 3000);
</script>