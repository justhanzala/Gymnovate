<?php
include "functions.php";
$members = getMembersData("full_name, member_id");
$membersNameCount = count($members);
$membershipArr = array("3-Months", "6-Months", "9-Months", "12-Months");
$membershipArrCount = count($membershipArr);
$months_arr = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "december");
$monthsArrCount = count($months_arr);

$feeDate = date('y-m-d');
$message = array("text" => "", "status" => "");
if(isset($_POST["submit"])){
    $selectMember = $_POST["select_member"];
    $amount = $_POST["amount"];
    $selectMonth = $_POST["select_month"];
    $selectYear = $_POST["select_year"];
    $selectMembership = $_POST["select_membership"];
    if($selectMember == "" || $selectMembership == "" || $amount == "" || $selectMonth == "" || $selectYear == ""){
        $message['text'] = "Something is Empty!";
		$message['status'] = "alert-danger";
    }else{
        $insertMembershipData = insertData("members_fee", "member_id, date, fees, month, year, membership", "".$selectMember.", ".$feeDate.", ".$amount.", ".$selectMonth.", ".$selectYear.", ".$selectMembership."");
        if ($insertMembershipData) {			
            $message['text'] = "Data successfully entered";
            $message['status'] = "alert-success";
        }else{			
            $message['text'] = $conn->error;
            $message['status'] = "alert-danger";
        }
    }
}
$feeRecord = getMembersfeerecord();
$countFeeRecord = count($feeRecord);
include "header.php";
?>
<div class="col-12 text-center pageName">
    <h1>Add Membership</h1>
</div>
<form class="form-inline d-flex justify-content-center mt-4 mb-4" method="post" autocomplete="off">
    <div class="form-group">
        <select name="select_member" class="custom-select" id="select_member">
            <option value="">Select Member..</option>
            <?php
                for($i=0; $i < $membersNameCount; $i++){?>
                    <option value="<?= $members[$i]["member_id"] ?>"><?= $members[$i]["full_name"] ?></option>
            <?php
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <select name="select_membership" class="custom-select" id="select_membership">
            <option value="">Select Membership..</option>
            <?php
                for($i=0; $i < $membershipArrCount; $i++){ 
                    $membershipMonths = $i + 1; ?>
                    <option value="<?= $membershipMonths ?>"><?= $membershipArr[$i] ?></option>        
            <?php
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <input type="text" class="form-control rounded-0" id="amount" placeholder="Membership Fee." name="amount">
    </div>
    <div class="input-group form-group">
        <select name="select_month" class="custom-select" id="select_month">
            <option value="">Select Month..</option>
            <?php
                for($i=0; $i < $monthsArrCount; $i++){
                    $months = $i + 1; ?>
                    <option value="<?= $months ?>"><?= $months_arr[$i] ?></option>
                    <?php
                }
            ?>
        </select>
        <select name="select_year" class="custom-select" id="select_year">
            <option value="">Select Year..</option>
            <?php
                for($i=2019; $i < 2035; $i++){?>
                    <option><?= $i ?></option>
                <?php
                }
            ?>
        </select>
        <div class="input-group-append">
            <input type="submit" name="submit" id="submit-btn" class="btn btn-outline-secondary rounded-0" value="Submit">
        </div> 
    </div>
</form>
<div class="col-md-12 text-center mt-1">
    <div class="alert <?= $message["status"] ?>"><?= $message["text"]; ?></div>
</div>
<?php
    for($i=0; $i < $countFeeRecord; $i++){ 
        if(!empty($feeRecord[$i]["membership"])){
            ?>
            <div class="justify-content-center member-wrap p-4 rounded m-2">
                <h4 class="float-right membershipPlan"><?= $membershipArr[$feeRecord[$i]["membership"] - 1] ?></h4>
                <h2><?= $feeRecord[$i]["transaction_id"] ?>. <?= $feeRecord[$i]["full_name"] ?></h2>
                <p class="float-right fees"><?= "Fee. ". $feeRecord[$i]["fees"] ?></p>
                <p><?= $months_arr[$feeRecord[$i]["month"] - 1] ?></p>
                <p><?= $feeRecord[$i]["year"] ?></p>
                <p class="float-right"><?= $feeRecord[$i]["date"] ?></p>
            </div>
            <?php
        }
    }
?>
<script>
    jQuery(document).ready(function(){
        jQuery("#submit-btn").prop('disabled', true);

        jQuery("#select_member, #select_membership, #amount, #select_month, #select_year").change(function(){
            var selectMemberLength = jQuery("#select_member").val().length;
            var selectMembershipLenth = jQuery("#select_membership").val().length;
            var amountLength = jQuery("#amount").val().length;
            var selectMonthLength = jQuery("#select_month").val().length;
            var selectYearLength = jQuery("#select_year").val().length;

            if(selectMemberLength < 1 || selectMembershipLenth < 1 || amountLength < 1 || selectMonthLength < 1 || selectYearLength < 1){
                jQuery("#submit-btn").prop("disabled", true);
            }else{
                jQuery("#submit-btn").prop("disabled", false)
            }
        });
    });
</script>

<?php
include "footer.php";
?>