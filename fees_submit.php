<?php	
	include "functions.php";
	$months_arr = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "december");
	$members = getMembersData("full_name, member_id");
	$memebersname_count = count($members);
	$feerecord = getMembersfeerecord();
	$feerecord_count = count($feerecord);
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
	include "header.php";
?>
		<div class="col-12 text-center">
      		<h1>Add Member Fees.</h1>
    	</div>

  		<form class="form-inline d-flex justify-content-center mt-4 mb-4" method="post">
		    <div class="form-group">
		      <select name="select_member" class="custom-select" id="select_member">
	    		<option selected="">select memeber...</option>
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
	  				<option>Select Month</option>
					<?php
						for ($i=0; $i < count($months_arr); $i++) {
							$m = $i + 1; ?>
							<option value="<?= $m ?>"><?= $months_arr[$i] ?></option>
							<?php
						}
	  			?>
	  			</select>
	  			<select class="custom-select" name="select_year" id="select_year">
	  				<option>Select year</option>
					<?php
						for ($i=2019; $i < 2035; $i++) { ?>	
							<option><?= $i ?></option>
							<?php
						}
	  			?>
	  			</select>
				  <div class="input-group-append">
				  	<input type="submit" name="submit" class="btn btn-outline-secondary rounded-0" value="Submit">
				  </div>
			</div>
			<div class="ml-3 p-2 border">
				<span>Total Amount:</span>
				<span>&#8377;<?= $SumFees ?></span>
			</div>
		</form>

		<div class='col-md-12 text-center mt-1'>
			<div class='alert <?= $message['status'] ?>'><?= $message['text']; ?></div>
		</div><?php
		for ($div=0; $div < $feerecord_count; $div++) { ?>
			<div class="justify-content-center member-wrap p-4 rounded m-2">
				<h4 class="float-right"><?= "Fee. ". $feerecord[$div]['fees'] ?></h4>
				<h2><?= $feerecord[$div]['transaction_id'] ?>. <?= $feerecord[$div]['full_name'] ?> </h2>
				<p><?=  $months_arr[$feerecord[$div]['month'] - 1] ?></p>
				<p><?=  $feerecord[$div]['year'] ?></p>
				<p class="float-right"><?= $feerecord[$div]['date'] ?></p>
    		</div>
    		
    		<?php } 
    	include "footer.php";
    		?>