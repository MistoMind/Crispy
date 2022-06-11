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
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
						aria-haspopup="true" aria-expanded="false">
						Categories
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<?php
							require("php/get_categories.php");
							while($row = mysqli_fetch_assoc($result)){
						?>
						<form action="explore.php" method="POST">
							<button type="submit" id="category" name="category" class="dropdown-item"
								value="<?php echo $row['category_name']; ?>">
								<?php echo $row['category_name']; ?></a>
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
				<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
					aria-expanded="false">
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

	<div class="row profile">
		<div class="col bg-dark" style="height:94vh;">
			<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
				<a class="nav-link text-white active" id="v-pills-profile-tab" data-toggle="pill"
					href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">Profile</a>
				<hr>
				<a class="nav-link text-white" id="v-pills-orderhistory-tab" data-toggle="pill"
					href="#v-pills-orderhistory" role="tab" aria-controls="v-pills-orderhistory"
					aria-selected="false">Order History</a>
				<hr>
				<a class="nav-link text-white" id="v-pills-feedback-tab" data-toggle="pill" href="#v-pills-feedback"
					role="tab" aria-controls="v-pills-feedback" aria-selected="false">FeedBack</a>
			</div>
		</div>
		<div class="col-10">
			<div class="tab-content" id="v-pills-tabContent">
				<!-- User Profile -->
				<div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel"
					aria-labelledby="v-pills-profile-tab">
					<div class="container-fluid">
						<div class="card" style="width: 50rem;height:45rem;margin: 5% auto;">
							<div class="card card-header bg-dark text-white text-center" style="font-size: 30px;">User
								Profile</div>
							<div class="card-body">
								<div class="row align-items-center justify-content-center">
									<div class="card" style="width: 25rem;margin-top: 5%;">
										<label for="image">
											<input type="file" name="image" id="image" style="display:none;">
											<img src="images/user_pics/user_pic.png" class="card-img-top"
												alt="Profile Picture">
										</label>
									</div>
								</div>
								<div class="row align-items-center justify-content-center">
									<div class="card information" style="width: 25rem;margin-top: 2%;">
										<input class="form-control" type="text" value="Username"
											aria-label="readonly input example" readonly>
										<hr>
										<input class="form-control" type="text" value="Email"
											aria-label="readonly input example" readonly>
									</div>
								</div>
								<div class="row align-items-end justify-content-center" style="padding-top: 10%;">
									<button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
										data-target="#editprofile">Edit Profile</button>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Order History -->
				<div class="tab-pane fade" id="v-pills-orderhistory" role="tabpanel"
					aria-labelledby="v-pills-orderhistory-tab">
					<div class="card text-center" style="margin: 2%;">
						<div class="card-header bg-dark text-white">
							<span class="orderhistorytitle">Order History</span>
						</div>
						<div class="card-body" style="overflow-y: scroll; height:70vh;">
							<table class="table table-bordered">
								<thead class="table-dark">
									<tr>
										<th scope="col">#</th>
										<th scope="col">Order-ID</th>
										<th scope="col">Date</th>
										<th scope="col">Total Price</th>
									</tr>
								</thead>
								<tbody>
									<?php
									require('php/get_orders.php');
									$counter = 1;
									for($i=0;$i<$tot_rows;$i++){
										$currID = $row[$i]['order_id'];
									?>
									<tr data-toggle="collapse" data-target="#table<?php echo $counter;?>" class="accordion-toggle">
										<th scope="row"><?php echo $counter;?></th>
										<td><?php echo $row[$i]['order_id'];?></td>
										<td><?php echo $row[$i]['order_date'];?></td>
										<td>Rs.<?php echo $row[$i]['total_price'];?></td>
									</tr>
									<tr>
										<td colspan="12" class="hiddenRow">
											<div class="accordian-body collapse" id="table<?php echo $counter;?>">
												<table class="table">
													<thead>
														<th>Item Name</th>
														<th>Quantity</th>
														<th>Price</th>
													</thead>
													<tbody>
													<?php
													while(true){
													?>
														<tr>
															<td><?php echo $row[$i]['item_name'];?></td>
															<td><?php echo $row[$i]['order_quantity'];?></td>
															<td>Rs.<?php echo $row[$i]['price'];?></td>
														</tr>
													<?php
														$nextID = $row[$i+1][0];
														if($currID!=$nextID) break;
														$i++;
													}
													?>
													</tbody>
												</table>
											</div>
										</td>
									</tr>
									<?php
									$counter++;
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<!-- FeedBack -->
				<div class="tab-pane fade" id="v-pills-feedback" role="tabpanel" aria-labelledby="v-pills-feedback-tab">
					<div class="card" style="margin: 2%;">
						<div class="card-header bg-dark text-white">
							<span class="orderhistorytitle">FeedBack</span>
						</div>
						<div class="card-body">
							<form action="php/addfeedback.php" method="POST">
								<div class="form-group justify-content-around">
									<label for="feedbacktitle">Write your feedback below:-</label>
									<textarea class="form-control" name="feedback" rows="5"
										placeholder="Write your review here..............."></textarea>
								</div>
								<button type="submit" class="btn btn-warning">Submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Edit Profile -->
	<div class="modal fade" id="editprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title font-weight-bold" id="editprofile_title">Edit Profile:</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="POST">
					<div class="modal-body">
						<form action="php/registration.php" method="POST">
							<div class="input-group mb-3">
								<span class="input-group-text">Username</span>
								<input type="text" class="form-control" name="username" id="username"
									placeholder="Enter Username">
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text">Your Name</span>
								<input type="text" class="form-control" name="fname" id="fname"
									placeholder="First name">
								<input type="text" class="form-control" name="lname" id="lname" placeholder="Last name">
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text">Age</span>
								<input type="number" class="form-control" name="age" id="age" placeholder="Enter Age">
							</div>
							<div class="input-group mb-3">
								<div class="row">
									<div class="col-md-auto">
										<span class="input-group-text">Gender</span>
									</div>
									<div class="col-md-auto">
										<div class="form-check">
											<input class="form-check-input" type="radio" name="gender" value="Male">
											<label class="form-check-label" for="male">male</label>
										</div>
									</div>
									<div class="col-md-auto">
										<div class="form-check">
											<input class="form-check-input" type="radio" name="gender" value="Female">
											<label class="form-check-label" for="female">female</label>
										</div>
									</div>
								</div>
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text">Email</span>
								<input type="email" class="form-control" name="email" id="email"
									aria-describedby="emailHelp" placeholder="Enter Email">
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text">Address</span>
								<input type="text" class="form-control" name="address" id="address"
									placeholder="Enter your home address">
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text">Phone Number</span>
								<input type="tel" class="form-control" name="phonenumber" id="phonenumber"
									placeholder="Enter your phone number">
							</div>
						</form>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							<input type="submit" class="btn btn-warning" value="Save Changes" id="filtered"
								name="filtered">
						</div>
				</form>
			</div>
		</div>
	</div>
</body>

</html>