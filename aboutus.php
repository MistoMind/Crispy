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
					<a class="nav-link" href="index.php">Home</a>
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
					<a class="nav-link active" href="aboutus.php">About Us</a>
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

	<div class="container-fluid about-section">
		<div class="row justify-content-center">
			<div class="column">
				<img src="images/Logo.png" alt="Logo" height="50%">
			</div>
			<div class="column">
				<h1>About Us</h1>
  				<p>Ever heard about a Online Restaurant which provides great quality products or service,amazing value.</p>
  				<p>Crispy Meal is the most reasonable website with premium quality food. You can totally rely on our food stuffs.</p>
    			<p>We provide better home delivery services. We provide the nation's third fastest home delivery services.</p>
			</div>
		</div>
	</div>

	<div class="our-team">
		<div class="section-title">
			Our Team
		</div>
		<div class="row justify-content-center">
  			<div class="column" style="padding: 2%;">
    			<div class="card bg-light mb-3" style="width: 18rem;">
      				<img src="images/team/1.png" alt="Anubhuti">
      				<div class="container">
        				<h2>Anubhuti Bhardwaj</h2>
        				<b>Founder</b>
        				<p>Founder of the Crispy Meal website.</p>
        				<p>anubhuti@gmail.com</p>
        				<p><button class="button">Contact Us</button></p>
      				</div>
    			</div>
  			</div>
  			<div class="column" style="padding: 2%;">
		    	<div class="card bg-light mb-3" style="width: 18rem;">
      				<img src="images/team/2.png" alt="Khush">
      				<div class="container">
        				<h2>Khush Seervi</h2>
        				<b>Designer</b>
        				<p>Nation's Best Designers we have come across.</p>
        				<p>khush@gmail.com</p>
        				<p><button class="button">Contact Us</button></p>
      				</div>
    			</div>
  			</div>
			<div class="column" style="padding: 2%;">
		    	<div class="card bg-light mb-3" style="width: 18rem;">
					<img src="images/team/3.png" alt="Ketan">
      				<div class="container">
        				<h2>Ketan Jhanwar</h2>
        				<b>Director</b>
        				<p>Person with full capability and decisive power.</p>
        				<p>ketan@gmail.com</p>
        				<p><button class="button">Contact Us</button></p>
      				</div>
    			</div>
  			</div>
			<div class="column" style="padding: 2%;">
				<div class="card bg-light mb-3" style="width: 18rem;"">	
					<img src="images/team/4.png" alt="Akshat">
      				<div class="container">
	        			<h2>Akshat Jain</h2>
        				<b>CEO</b>
    					<p>Head of the company.</p>
        				<p>akshat@gmail.com</p>
        				<p><button class="button">Contact Us</button></p>
      				</div>
    			</div>
  			</div>
		</div>
	</div>

	<!-- Footer -->
	<footer class="text-white text-center text-lg-start bg-dark">
		<div class="container p-4">
		  	<div class="row mt-4">
				<div class="col-lg-4 col-md-12 mb-4 mb-md-0">
				  	<h5 class="text-uppercase mb-4">About company</h5>  
				  	<p>Ever heard about a Online Restaurant which provides great quality products or service,amazing value.</p>
					<p>Crispy Meal is the most reasonable website with premium quality food. You can totally rely on our food stuffs.</p>
			  	</div>

			  	<div class="col-lg-4 col-md-6 mb-4 mb-md-0">
				  <h5 class="text-uppercase mb-4 pb-1">Contact Us</h5>

				  <ul class="fa-ul" style="margin-left: 1.65em;">
				  <li class="mb-3">
					  	<span class="ms-2">Gandhi Nagar, Ajmer</span>
					</li>
				  <li class="mb-3">
					  	<span class="ms-2">contact@cripsy.com</span>
					</li>
					<li class="mb-3">
					  	<span class="ms-2">+91 xxx xxx xxxx</span>
					</li>
				  	</ul>
			  	</div>

			  	<div class="col-lg-4 col-md-6 mb-4 mb-md-0">
				  	<h5 class="text-uppercase mb-4">Opening hours</h5>

				  	<table class="table text-center text-white">
						<tbody class="fw-normal">
				  	<tr>
						<td>Mon - Thu:</td>
						<td>8am - 9pm</td>
				  	</tr>
				  	<tr>
						<td>Fri - Sat:</td>
						<td>8am - 1am</td>
				  	</tr>
				  	<tr>
						<td>Sunday:</td>
						<td>9am - 10pm</td>
				  	</tr>
				  	</tbody>
				  	</table>
			  	</div>
			</div>
	  	</div>

	  	<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
		   	2022 Copyright:
			<a class="text-white" href="#Home">Crispy.com</a>
	  	</div>
  	</footer>
</body>
</html>