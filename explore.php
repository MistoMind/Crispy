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
					<a class="nav-link active" href="explore.php">Explore</a>
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

	<!-- Find Your Food Banner -->
	<section class="find-food">
		<img src="images/explore_banner.jpg" alt="Banner" width="100%">
	</section>

	<!-- Search	 -->
	<section class="search-section">
		<div class="section-title">
			Search
		</div>
		<div class="container">
		<form action="" method="POST">
				<div class="row justify-content-center">
					<div class="input-group">					
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Search</span>
						</div>
						<input type="text" class="form-control" placeholder="Search for foods & drinks ......" aria-label="Search for foods & drinks ......" aria-describedby="basic-addon2" id="searchitem" name="searchitem">
						<div class="input-group-append">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#filter">Filter</button>
							<input type="submit" class="btn btn-warning" value="Go" id="searched" name="searched">
							
						</div>					
					</div>
				</div>
			</form>
		</div>
	</section>	
  
  	<!-- Modal Filter -->
	<div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
	  		<div class="modal-content">
				<div class="modal-header">
		  			<h5 class="modal-title font-weight-bold" id="filter_title">Filter by:</h5>
		  			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
		  			</button>
				</div>
				<form action="" method="POST">
					<div class="modal-body">
						<div class="row justify-conetent-between">
							<div class="input-group md-auto">
								<div class="input-group-prepend">
									<label class="input-group-text" for="category">Category: </label>
								</div>
								<select class="form-control custom-select" id="category" name="category">
									<option>Select food category......</option>
									<?php
										require("php/get_categories.php");
										while($row = mysqli_fetch_assoc($result)){
									?>
									<option value="<?php echo $row['category_name']; ?>"><?php echo $row['category_name']; ?></option>
									<?php
										}
									?>
								</select>
							</div>
						</div>
						<div class="row justify-content-between">
							<div class="col-md-auto">
								<label class="form-check-label font-weight-bold" for="type">Type: </label>
							</div>
							<div class="col-md-auto">
								<div class="form-check">
									<input class="form-check-input" type="radio" name="type" id="veg" value="Veg">
									<label class="form-check-label" for="veg">Veg</label>
								</div>
							</div>
							<div class="col-md-auto">
								<div class="form-check">
									<input class="form-check-input" type="radio" name="type" id="nonveg" value="Non-Veg">
									<label class="form-check-label" for="nonveg">Non-Veg</label>
								</div>	
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-warning" value="Save Changes" id="filtered" name="filtered">
					</div>
	  			</div>
			</form>
		</div>
  	</div>

	<?php
	if(isset($_SESSION['addtocart_alert'])){
	?>
	<div class="container justify-content-center">
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Item added to cart!</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
	</div>
	<?php
		unset($_SESSION['addtocart_alert']);
	}
	?>

	<!-- Search Results -->
	<section id="show_items">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<?php 
					if(isset($_POST['category']) && !isset($_POST['filtered'])) $_SESSION['category'] = $_POST['category'];
					require("php/get_items.php");
					while($row = mysqli_fetch_assoc($result)){
				?>
				<div class="col-md-auto">
					<div class="food-card food-card--vertical">
						<div class="food-card_img">
							<img src="<?php echo $row['image']; ?>" alt="Item Image">
						</div>
						<div class="food-card_content">
							<div class="food-card_title-section">
								<div class="food-card_title"><?php echo $row['item_name']; ?></div>
								<div class="food-card_author">
									<?php echo $row['category_name']; ?>
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
								</div>								
							</div>
							<div class="food-card_bottom-section">
								<hr>
								<div class="space-between">
									<div class="food-card_price">
										<span>Rs.<?php echo $row['price']; ?></span>
									</div>
									<form action="php/addtocart.php" method="POST">
										<button class="btn btn-success" type="submit" id="addtocart" name="addtocart" value="<?php echo $row['item_id'];?>">Add to Cart</button>
									</form>	
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
</body>
</html>