<?php	
	include "functions.php";
	$months_arr = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "december");
	$members = getMembersData("full_name, member_id");
	$memebersname_count = count($members);
	
	$feedate = date('Y-m-d');
	$message = array("text" => "", "status" => "");
	$months = count($months_arr);
	$SumFees = getTotalFees();

	if (isset($_POST["submit"])) {
		$select_member = $_POST["select_member"];
		$amount = $_POST["amount"];
		$select_month = $_POST["select_month"];
		$select_year = $_POST["select_year"];
		if ($select_member == "" || $amount == "" || $select_month == "" || $select_year == "") {
			$message['text'] = "Something is Empty!";
			$message['status'] = "alert-danger";
		}else{
			$insert = insertdata("members_fee", "member_id, date, fees, month, year", "".$select_member.", ".$feedate.", ".$amount.", ".$select_month.", ".$select_year."");
			if ($insert) {			
				$message['text'] = "Data successfully entered";
				$message['status'] = "alert-success";
			}else{			
				$message['text'] = $conn->error;
				$message['status'] = "alert-danger";
			}
		}
	}
	$feerecord = getMembersfeerecord();
	$feerecord_count = count($feerecord);
	include "header.php";
?>
		<div class="col-12 text-center">
      		<h1>Add Member Fees.</h1>
    	</div>

  		<form class="form-inline d-flex justify-content-center mt-4 mb-4" method="post">
		    <div class="form-group">
		      <select name="select_member" class="custom-select" id="select_member">
	    		<option value="">select memeber...</option>
	    		<?php 
	    			for ($i=0; $i < $memebersname_count; $i++) { ?>	
	    				<option value="<?= $members[$i]['member_id'] ?>"><?= $members[$i]['full_name'] ?></option>
	    				<?php
	    			}
	    		?>
	    	  </select>
		    </div>
		    <div class="form-group">
		      <input type="text" class="form-control rounded-0" id="amount" placeholder="fee amount" name="amount">
		    </div>
		    <div class="input-group">
	  			<select class="custom-select" name="select_month" id="select_month">
	  				<option value="">Select Month</option>
					<?php
						for ($i=0; $i < count($months_arr); $i++) {
							$m = $i + 1; ?>
							<option value="<?= $m ?>"><?= $months_arr[$i] ?></option>
							<?php
						}
	  			?>
	  			</select>
	  			<select class="custom-select" name="select_year" id="select_year">
	  				<option value="">Select year</option>
					<?php
						for ($i=2019; $i < 2035; $i++) { ?>	
							<option><?= $i ?></option>
							<?php
						}
	  			?>
	  			</select>
				  <div class="input-group-append">
				  	<input type="submit" name="submit" id="submit-btn" class="btn btn-outline-secondary rounded-0" value="Submit">
				  </div>
			</div>
			<div class="ml-3 p-2 border bg-secondary text-white">
				<span>Total Amount:</span>
				<span>&#8377;<?= $SumFees ?></span>
			</div>
		</form>

		<div class='col-md-12 text-center mt-1'>
			<div class='alert <?= $message['status'] ?>'><?= $message['text']; ?></div>
		</div><?php

		for ($r=0; $r < $feerecord_count; $r++) { ?>
			<div class="justify-content-center member-wrap p-4 rounded m-2">

				<h4 class="float-right"><?= "Fee. ". $feerecord[$r]['fees'] ?></h4>
				<h2><?= $feerecord[$r]['transaction_id'] ?>. <?= $feerecord[$r]['full_name'] ?> </h2>
				<p><?=  $months_arr[$feerecord[$r]['month'] - 1] ?></p>
				<p><?=  $feerecord[$r]['year'] ?></p>
				<p class="float-right"><?= $feerecord[$r]['date'] ?></p>
    		</div>
    		
			<?php 
		} ?>

		<script>
			jQuery(document).ready(function(){

				jQuery("#submit-btn").prop('disabled', true);
				
				jQuery("#select_member, #amount, #select_month, #select_year").change(function(){
					var selectMemberLength = jQuery("#select_member").val().length
					var amountLength = jQuery("#amount").val().length
					var selectMonthLength = jQuery("#select_month").val().length
					var selectYearLength = jQuery("#select_year").val().length

					if(selectMemberLength < 1 || amountLength < 1 || selectMonthLength < 1 || selectYearLength < 1){
						jQuery("#submit-btn").prop('disabled', true);
					}else{
						jQuery("#submit-btn").prop('disabled', false);
					}
				})


			})
		</script>

		<?php
    	include "footer.php";
    		?>