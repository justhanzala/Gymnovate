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
	$members_data = getMembersData("*");
	$memberDataCount = count($members_data);
	include "header.php";

?>		
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

		<?php 
		} ?>

		<script>
			jQuery("#mobile").keyup(function(){
			var numlength = jQuery(this).val().length;
			console.log(numlength);

			if(numlength == 10){
				jQuery(this).removeClass('is-invalid').addClass('is-valid');
			}
			else{
				jQuery(this).addClass('is-invalid');
			}
		});
		</script>

		<?php
	include "footer.php";
		?>