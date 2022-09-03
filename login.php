<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Food</title>

	<!-- Local Includes -->
	<link rel="icon" type="image/x-icon" href="images/Logo.png">
	<link rel="stylesheet" href="css/style.css">

	<!-- BootStrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
		integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<!-- BootStrap JS -->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"
		integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
		integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
		crossorigin="anonymous"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body id="Home" style="background-color: #fafafa">
	<!-- Navigation Bar Top -->
	<nav class="navbar sticky-top navbar-expand-md">
		<a class="nav-link navbar-brand" href="index.php">
			<img src="images/Logo.png" alt="Logo" height="40" width="40">
			Crispy
		</a>
		<button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="main-navigation">
			<ul class="navbar-nav navbar-container">
				<li class="nav-item">
					<a class="nav-link active" href="index.php">Home</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Categories
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<?php
							require("php/get_categories.php");
							while($row = mysqli_fetch_assoc($result)){
						?>
						<form action="explore.php" method="POST">
							<button type="submit" id="category" name="category" class="dropdown-item" value="<?php echo $row['category_name']; ?>"><?php echo $row['category_name']; ?></a>
						</form>
						<?php
							}
						?>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="explore.php">Explore</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="aboutus.php">About Us</a>
				</li>
			</ul>
			<a class="navbar-brand" href="cart.php">
				<img src="images/Cart.png" alt="Logo" height="35" width="40">
			</a>
			
			<?php 
			if(isset($_SESSION['username'])){
			?>
			<div class="btn-group">
			  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    <?php echo $_SESSION['username'];?>
			  </button>
			  <div class="dropdown-menu dropdown-menu-right">
			    <a class="dropdown-item" href="user_profile.php">Profile</a>
			    <a class="dropdown-item" href="php/logout.php">Log Out</a>
			  </div>
			</div>
			<?php
			}else {
			?>
			<form class="form-inline" action="login.php">
				<button class="btn btn-warning" type="input">Login</button>
			</form>
			<?php
			}
			?>
		</div>
	</nav>

	<!-- Main Login Form -->
	<section>
		<div class="section-title login-section login-position">
			<img src="images/login.png" width="5%">
			Login
		</div>
		<div class="container login-text">
			<form action="php/login_user.php" method="POST">
				<div class="form-group">
				  	<label for="exampleInputUser">Username</label>
				  	<input type="text" class="form-control" id="exampleInputUser" name= "exampleInputUser" placeholder="Enter username">
				</div>
				<div class="form-group">
				  	<label for="exampleInputPassword1">Password</label>
				  	<input type="password" class="form-control" id="exampleInputPassword1" name="exampleInputPassword1" placeholder="Password">
				</div>
				<input type="submit" name="login" id="login" class="btn btn-warning" value="Submit">
			</form>
			<br>
			<div>
				Don't have a account? 
				<a href="signup.php">Sign Up</a>
			</div>
		</div>
	</section>

	<!-- All alerts -->
	<?php
	if(isset($_SESSION['login_failed_alert'])){
	?>
	<div class="container justify-content-center">
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Username or password is incorrect!</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
	</div>
	<?php
		unset($_SESSION['login_failed_alert']);
	}
	?>
	<?php
	if(isset($_SESSION['registration_alert'])){
	?>
	<div class="container justify-content-center">
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Registration successfully!</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
	</div>
	<?php
		unset($_SESSION['registration_alert']);
	}
	?>
</body>
</html>