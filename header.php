<?php
$curr_file = basename($_SERVER["SCRIPT_FILENAME"]);
if(isset($_POST["responsedata"])){
	getSearchSuggestions();
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="gym.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<title></title>
</head>
<body>
	<div class="container p-0"> 
		<?php
		if($curr_file !== 'login.php'){
			if($curr_file !== 'signup.php'){ 
				session_start();
				if(!isset($_SESSION['username'])){
					header('location:login.php');
				}
				$gymBanner = getBannerName();
				?>
				<header>
					<nav class="container navbar navbar-expand-lg navbar-light bg-light">
						<div class="dropdown">
							<button id="dropbtn" class="dropbtn btn btn-outline-secondary my-2 my-sm-0 fa fa-bars"></button>
							<div id="myDropdown" class="dropdown-content">
								<h5 class="text-center loggedInName"><i class="fa fa-user-circle" aria-hidden="true"></i> <?= $_SESSION['username'] ?></h5>
								<hr>
								<a href="addmembers.php">Add Member</a>
								<a href="fees_submit.php">Add Fees</a>
								<a href="month.php">Month</a>
								<a href="trash.php">trash</a>
								<a href="create_user.php">Create User</a>
								<a href="Setting.php">Setting</a>
								<a href="logout.php">Logout</a>
							</div>
						</div>
						<div class="gymManagement">
							<a href="index.php"><h3 class="navbar-brand brand-name"><?= $gymBanner['Gym_name'] ?></h3></a>
						</div>
						<div class="Search">
							<button id="SearchIcon" class="SearchIcon btn btn-outline-secondary my-2 my-sm-0 fa fa-search"></button>
							<div id="searchDropdown" class="autocomplete form-responsive dropdownSearchBar">
								<form autocomplete="off" class="form-inline" method="POST" action="search.php">
									<input class="form-control mr-sm-2 w-auto" type="search" name="search" id="search" placeholder="Search" value="<?php if(!empty($_POST['search'])) echo $_POST['search'] ?>" aria-label="Search">
									<button class="btn btn-outline-secondary my-2 my-sm-0" id="submit" type="submit" >Search</button>
								</form>
								<div id="response" class="pFixed form-control response"></div>
							</div>
						</div>
					</nav>
				</header>
				<?php
			}
		}
?>
<script>
	$(document).ready(function(){
		$('#dropbtn').click(function(){
			document.getElementById("myDropdown").classList.toggle("show");
		});
		window.onclick = function(event) {
			if (!event.target.matches('.dropbtn')) {
				var dropdowns = document.getElementsByClassName("dropdown-content");
				var i;
				for (i = 0; i < dropdowns.length; i++) {
					var openDropdown = dropdowns[i];
					if (openDropdown.classList.contains('show')) {
						openDropdown.classList.remove('show');
					}
				}
			}
		}
		$('#SearchIcon').click(function(){
			document.getElementById("searchDropdown").classList.toggle("show");
		});
		window.onclick = function(event) {
			if (!event.target.matches('.SearchIcon')) {
				var dropdowns = document.getElementsByClassName("dropdownSearchBar");
				var i;
				for (i = 0; i < dropdowns.val; i++) {
					var openDropdown = dropdowns[i];
					if (openDropdown.classList.contains('show')) {
						openDropdown.classList.remove('show');
					}
				}
			}
		}

		$(window).scroll(function(){
			var navFixed = $('.navbar'),
			scroll = $(window).scrollTop();
			if (scroll >= 100) navFixed.addClass('fixedHeader');
  			else navFixed.removeClass('fixedHeader');
		});

		$('#search').keyup(function(){
			var searchTxt = $("#search").val();
			if(searchTxt != ''){
				$.ajax({
					type:'POST',
					data:{responsedata:searchTxt},
					success:function(responsedata){
						$('#response').fadeIn();
						$('#response').html(responsedata);
					}
				});
			}else{
				$('#response').fadeOut();
				$('#response').html("");
			}
				$(document).on('click', 'li', function(){
					if($(this).text() != "Name not found"){
						$('#search').val($(this).text());
						$('#response').html('');
						$("#submit").click();
					}
            	});
				$("body").click(function(event){
						$('#response').fadeOut();
						$('#response').html("");
				});
		});
	});
</script>