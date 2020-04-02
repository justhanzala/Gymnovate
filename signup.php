<?php
include "functions.php";
include "header.php";

if(isset($_POST["submit"])){
    $userName = $_POST["create-username"];
	$createPassword = $_POST["create-password"];
    $confirmPassword = $_POST["confirm-password"];
    session_start();
    if(!empty($userName) && !empty($createPassword) && !empty($confirmPassword)){
        if($createPassword == $confirmPassword){
            $createUser = insertuser();
            $_SESSION['username'] = $userName;
            header('location:index.php');
        }else{
            ?>
            <script type="text/javascript">
                Swal.fire({
                    position: 'top',
                    icon: 'error',
                    title: 'Confrim was wrong!',
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>
            <?php
        }
    }
}
?>

<div class="row m-auto d-flex align-item-center">
    <div class="col-sm-9 col-md-7 col-lg-5 m-auto">
        <div class="card card-signin my-5">
            <div class="card-body">
                <h5 class="card-title text-center">Sign Up</h5>
                <hr class="my-4">
                <form class="form-signin" method="POST" autocomplete="off">
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input name="create-username" class="form-control" placeholder="Username" type="text" required autofocus>
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input name="create-password" class="form-control" placeholder="Create password" type="password" required>
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input name="confirm-password" class="form-control" placeholder="Confirm password" type="Text" required>
                    </div>
                    
                    <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit">Sign Up</button>
                    <hr class="my-4">
                    <p class="text-center">Have an account? <a href="login.php">Log In</a> </p>
                </form>

            </div>
        </div>
    </div>
</div>