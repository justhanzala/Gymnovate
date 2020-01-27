<?php
include "functions.php";
include "header.php";
if(isset($_POST["createUserBtn"])){
	$createPassword = $_POST["create-password"];
	$confirmPassword = $_POST["confirm-password"];
    if($createPassword == $confirmPassword){
        $createUser = insertuser();
        ?>
        <script type="text/javascript">
            Swal.fire({
                position: 'top',
                icon: 'success',
                title: 'Your account has been successfully created!',
                showConfirmButton: false,
                timer: 1500
            });
		</script>

        <?php
    }else{
        ?>
        <script type="text/javascript">
            Swal.fire({
                position: 'top',
                icon: 'error',
                title: 'password was wrong!',
                showConfirmButton: false,
                timer: 1500
            });
		</script>

        <?php
    }
}
?>

<div class="bg-light mt-4 p-4">
<article class="mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Create Account</h4>
	<p class="text-center">Get started with your free account</p>
	<p class="divider-text">
        <span class="bg-light">OR</span>
    </p>
	<form method="post" autocomplete="off">
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
            </div>
            <input name="create-username" class="form-control" placeholder="Username" type="text">
        </div>
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            </div>
            <input name="create-password" class="form-control" placeholder="Create password" type="password">
        </div>
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            </div>
            <input name="confirm-password" class="form-control" placeholder="Confirm password" type="password">
        </div>
        <div class="form-group">
            <button type="submit" name="createUserBtn" class="btn btn-primary btn-block"> Create Account  </button>
        </div>
        <!-- <p class="text-center">Have an account? <a href="">Log In</a> </p> -->
    </form>
</article>
</div>

<?php
include "footer.php";
?>