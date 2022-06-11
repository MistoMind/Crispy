<?php
session_start();
if(!isset($_SESSION['username'])){
	header("Location: login.php");
}
?>

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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	
	<!-- BootStrap JS -->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
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

	<section>
		<div class="section-title cart-section cart-position">
			<img src="images/Cart.png" width="5%">
			Cart
		</div>
		<div class="container py-5">
		  	<div class="row d-flex justify-content-center my-4">
				<div class="col-md-8">
					<div class="card mb-4">
						<div class="card-body">
							<?php 
								require("php/get_cart.php");
								while($row = mysqli_fetch_assoc($result)){
							?>
							<!-- Single item -->
							<div class="row">
								<div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
						  		<!-- Image -->
								<img src="<?php echo $row['image']; ?>" class="w-100" />
								<!-- Image -->
								</div>
	  
								<div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
								<!-- Data -->
									<p><strong><?php echo $row['item_name']; ?></strong></p>
									<form action="php/remove_item_cart.php" method="POST">
										<button type="input" name="remove_me" id="remove_me" value="<?php echo $row['item_id']; ?>" class="btn btn-danger btn-sm me-1 mb-2" data-mdb-toggle="tooltip" title="Remove item">Remove</button>
									</form>
								<!-- Data -->
								</div>

								<?php
									$_SESSION['quantity']=$row['quantity'];
								?>

								<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
									<!-- Quantity -->
									<form action="php/change_quantity.php" method="POST")>
										<input class="form-control" type="number" name="item_id" value="<?php echo $row['item_id']; ?>" hidden>
										<div class="form-group d-flex mb-4" style="max-width: 300px">
										<button class="btn btn-warning px-3" type="input" name="item_quantity" value="<?php if($_SESSION['quantity']>0) {$_SESSION['quantity']-=1;} echo $_SESSION['quantity']; ?>">-</button>
											<div class="form-outline">
						  						<input id="quantity_item" min="0" name="quantity" value="<?php $_SESSION['quantity']=$row['quantity']; echo $row['quantity'];?>" type="text" class="form-control">
											</div>
	  										<button class="btn btn-warning px-3" type="input" name="item_quantity" value="<?php $_SESSION['quantity']+=1; echo $_SESSION['quantity']; ?>">+</button>
										</div>
									</form>
									<!-- Quantity -->
	  
									<!-- Price -->
									<p class="text-start text-md-center"><strong>Rs.<?php echo $row['price'] ?></strong></p>
									<!-- Price -->
								</div>
							</div>
							<!-- Single item -->

							<hr class="my-4" />
							<?php
								}
							?>
						</div>
					</div>
				</div>
			
				<div class="col-md-4">
				  	<div class="card mb-4">
						<div class="card-header py-3">
				  			<h5 class="mb-0">Summary</h5>
						</div>
						<form action="php/place_order.php" method="POST">
						<div class="card-body">
				  			<ul class="list-group list-group-flush">
								<li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
									<?php
										require("php/get_total_price.php");
									?>
					  				<div><strong>Total amount</strong></div>
					  				<span><strong>Rs.<?php echo $total; ?></strong></span>
								</li>
				  			</ul>
				  			<!-- <button type="button" class="btn btn-success btn-lg btn-block">Order</button> -->
							<input class="form-control" type="number" id="total_price" name="total_price" value="<?php echo $total;?>" hidden>
							<input type="submit" class="btn btn-success btn-lgbtn-block" value="Order" id="ordered" name="ordered">
						</div>
						</form>
					</div>
				</div>
		  	</div>
		</div>
	</section>
</body>
</html>