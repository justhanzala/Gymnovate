<?php
	include "functions.php";
	$search = $_POST['search'];

	include "header.php";

	$months_arr = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "december");
	$months_count = count($months_arr);
	$members_data = getMembersData("*", 1, 0, $search);
	$searchdata_count = count($members_data);

	for ($i=0; $i < $searchdata_count; $i++) {
		$fees_record = getMembersfeerecord($members_data[$i]['member_id']);
		$fees_count = count($fees_record); ?>
		<div class="justify-content-center member-wrap p-4 rounded m-2">
			<div class="float-right">

				<a class="toggle-table" data-table="#table-<?= $members_data[$i]['member_id'] ?>"><i class="fa fa-table" aria-hidden="true"></i></a>

				<a href="update_member.php?member_id=<?= $members_data[$i]['member_id'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
				<a href="delete_member.php?member_id=<?= $members_data[$i]['member_id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
 			</div>
			<h2><?= $members_data[$i]['member_id'] ?>. <?= $members_data[$i]['full_name'] ?> </h2>
			<p><?=  $members_data[$i]['mobile_number'] ?></p>
			<p class="float-right"><?= $members_data[$i]['doj'] ?></p>

			<div id="table-<?= $members_data[$i]['member_id'] ?>" class="table-responsive table-container display-none">
				<table class="table table-striped table-dark table-sm">
					<thead class="thead-dark">
						<tr>
							<th>Month-Year</th>
							<th>Fees</th>
							<th class="text-align-right">date</th>
						</tr>
					</thead>
				<?php
						for($count=0; $count < $fees_count; $count++){ ?>
							<tr>
								<td> <?= $months_arr[$fees_record[$count]['month'] - 1] ?> - <?= $fees_record[$count]['year']  ?> </td>
								<td> <?= $fees_record[$count]['fees']  ?> </td>
								<td class="text-align-right"> <?= $fees_record[$count]['date']  ?> </td>
							</tr>
				<?php
						}
				?>
					
				</table>
			</div>
		</div>
		<?php
    } ?>
	<script>
		jQuery(".toggle-table").click(function(){
			var tableId = jQuery(this).data('table');
			jQuery(tableId).slideToggle()
		});
	</script><?php
	include "footer.php";
	?>