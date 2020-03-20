<?php
include "functions.php";
if(isset($_POST["changeBannerBtn"])){
    $changeGymName = changeBannerName();
}
include "header.php";
if(isset($_POST["changeUsernameBtn"])){
        $updateUsername = updateUsername();
        ?>
        <script type="text/javascript">
            Swal.fire({
                position: 'top',
                icon: 'success',
                title: 'Username Updated',
                showConfirmButton: false,
                timer: 2000
            });
		</script>
        <?php
}
if(isset($_POST["changePasswordBtn"])){
    $getPassword = getPassword();
    if($getPassword == true){
        $updatePassword = updatePassword();
        ?>
        <script type="text/javascript">
            Swal.fire({
                position: 'top',
                icon: 'success',
                title: 'password Updated',
                showConfirmButton: false,
                timer: 2000
            });
		</script>
        <?php
    }else{
        ?>
        <script type="text/javascript">
            Swal.fire({
                position: 'top',
                icon: 'error',
                title: 'Current password was wrong!',
                showConfirmButton: false,
                timer: 1500
            });
		</script>

        <?php
    }
}

?>

<div class="mt-4">
    <div class="text-center brand p-5 general-option col-xs-4">
        <h1 class="Gym-banner">Gym Banner</h1>
        <form method="post" autocomplete="off" class="bannerRes">
            <input class="form-control d-inline w-50" name="gymName" id="gymName" placeholder="Gym Banner" value="<?= $gymBanner["Gym_name"] ?>">
            <button type="submit" id="changeBannerBtn" class="btn btn-primary m-3" name="changeBannerBtn">Change</button>
        </form>
        <hr>
    </div>
    <div class="mt-4">
        <div class="p-5 w-100 general-option memberNamePass text-center d-flex">
            <div class="w-50 uNameOption float-left webkit">
                <h3>Username</h3>
                <form autocomplete="off" method="post">
                    <li class="m-2">
                        Username/<b><?= $_SESSION['username'] ?></b>
                    </li>
                    <input class="form-control w-50 m-2" name="changeUsername" id="changeUsername" placeholder="Change Username" value="<?= $_SESSION['username']?>">
                    <button class="btn btn-outline-secondary m-3 m-2" name="changeUsernameBtn">Change</button>
                </from>
            </div>
            <div class="w-50 pWordOption float-right webkit">
                <h3>Password</h3>
                <form class="text-center" method="post" autocomplete="off">
                    <input type="password" class="form-control w-50 m-3" name="current-Password" id="current-Password" placeholder="Current Password">
                    <input class="form-control w-50 m-2" name="changePassword" id="changePassword" placeholder="New Password">
                    <button class="btn btn-outline-secondary m-3" name="changePasswordBtn">Change</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>