<?php
	include "functions.php";
	$search = $_POST['search'];

	include "header.php";

	$members_data = getMembersData("*", 1, 0, $search);
	$searchdata_count = count($members_data);

	for ($i=0; $i < $searchdata_count; $i++) { ?>
		<div class="justify-content-center member-wrap p-4 rounded m-2">
			<div class="float-right">
				<a href="update_member.php?member_id=<?= $members_data['member_id'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
				<a href="delete_member.php?member_id=<?= $members_data['member_id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
			</div>
			<h2><?= $members_data[$i]['member_id'] ?>. <?= $members_data[$i]['full_name'] ?> </h2>
			<p><?=  $members_data[$i]['mobile_number'] ?></p>
			<p class="float-right"><?= $members_data[$i]['doj'] ?></p>
    	</div><?php	
    }
	include "footer.php";
		?>