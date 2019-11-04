<?php
	include "functions.php";
	$members_data = getMembersData("*", 0);
	$memberDataCount = count($members_data);
	include "header.php";
?>
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
	include "footer.php";
			?>