<?php
include "functions.php";
include "header.php";
$members_data = getMembersData("*");
$feerecord = getMembersfeerecord();
$members_dataCount = count($members_data);
?>
<div class="col-12 text-center monthOverName">
    <h1>Month</h1>
</div>
<?php

for ($i = 0; $i < $members_dataCount; $i++) {
    ?>
        <div class="justify-content-center text-white bg-danger member-wrap p-4 rounded m-2">
            <div class="float-right">
                <a class="text-dark btn" href="fees_submit.php?member_id=<?= $members_data[$i]['member_id'] ?>">Add Fees</a>
            </div>
            <h2><?= $members_data[$i]['member_id'] ?>. <?= $members_data[$i]['full_name'] ?> </h2>
            <p><?=  $members_data[$i]['mobile_number'] ?></p>
            <p class="float-right"><?= $members_data[$i]['doj'] ?></p><h6 class="float-right">Joining Date.</h6>
        </div>
    <?php
}
include "footer.php";
?>