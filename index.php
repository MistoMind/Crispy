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

	<!-- Slider with Welcome Message -->
	<section>
		<div id="slideShow" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
			  <li data-target="#slideShow" data-slide-to="0" class="active"></li>
			  <li data-target="#slideShow" data-slide-to="1"></li>
			  <li data-target="#slideShow" data-slide-to="2"></li>
			</ol>
			<div class="carousel-caption welcome-caption">
				Welcome To Crispy <br>
				Meals!!
			</div>
			<div class="index_slider carousel-inner">
			  	<div class="carousel-item active">
					<img class="d-block w-100" src="images/home-slide-1.jpg" alt="First slide">
					<div class="carousel-caption d-none d-md-block">
    					<h1>We Deliver the taste of Life</h1>
  					</div>
			  	</div>
			  	<div class="carousel-item">
					<img class="d-block w-100" src="images/home-slide-2.jpg" alt="Second slide">
					<div class="carousel-caption d-none d-md-block">
    					<h1>Best in the Town</h1>
  					</div>
			  	</div>
			  	<div class="carousel-item">
					<img class="d-block w-100" src="images/home-slide-3.jpg" alt="Third slide">
					<div class="carousel-caption d-flex align-items-center d-md-block">
    					<h1>Hungry?<br>
						Don't wait Order Now!</h1>
  					</div>
			  </div>
			</div>
			<a class="carousel-control-prev" href="#slideShow" role="button" data-slide="prev">
			  	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			  	<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#slideShow" role="button" data-slide="next">
			  	<span class="carousel-control-next-icon" aria-hidden="true"></span>
			  	<span class="sr-only">Next</span>
			</a>
		  </div>
	</section>

	<!-- Top Choices -->
	<section class="container-fluid top-choices">
		<div class="section-title">
			Top Choices
		</div>
		<div class="row justify-content-around" style="padding: 2%;">
			<?php 
			require("php/top_choices.php");
			$counter=0;
			while($counter<3){
				$row=mysqli_fetch_assoc($result)
			?>
			<div class="col-md-auto">
				<div class="card bg-light" style="width: 18rem;">
					<div class="card-header text-center">
						<?php echo $row['item_name'];?>
					</div>
					<div class="card-body">
						<img class="food-card_img card-img-top" src="<?php echo $row['image'];?>" alt="Card image cap" style="height: 15rem">
				  		<p class="card-text">One of our top choices is <?php echo $row['item_name'];?>.</p>
						<p class="ca1rd-text">And has been ordered <?php echo $row['quantity_ordered'];?> times.</p>
						<div class="row justify-content-around" style="font-size: 25px;">
							<?php
								if($row['item_type']=="Veg"){
							?>
							<span class="badge badge-success">Veg</span>
							<?php
								}else if($row['item_type']=="Non-Veg"){
							?>
							<span class="badge badge-danger">Non-Veg</span>
							<?php
								}
							?>
							<span class="badge badge-warning">Price: Rs. <?php echo $row['price'];?></span>
						</div>
					</div>
				</div>
			</div>
			<?php
			$counter = $counter+1;
			}
			?>
		</div>
	</section>

	<!-- Customer Reviews -->
	<section class="customer-review">
		<div class="section-title">
			Customer Reviews
		</div>
		<div class="carousel slide" data-ride="carousel" data-interval="2000">
			<?php
				require("php/get_feedback.php");
				$counter=1;
			?>
			<div class="custo_carou carousel-inner">
			<?php
				while($row=mysqli_fetch_assoc($result)){
				if($counter==1){
					$counter++;
				?>
				<div class="custo_carou carousel-item active">
				<?php
				}else{
				?>
				<div class="custo_carou carousel-item">
				<?php
				}
				?>
					<div class="row flex-container justify-content-center">
						<div class="col-md-4 mb-3">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title"><?php echo $row['fname'] . " " . $row['lname'];?></h4>
									<p class="card-text"><?php echo $row['description']?></p>
								</div>
							</div>
						</div>
					</div>
				</div>	
				<?php
					}
				?>			
			</div>
		</div>
	</section>

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