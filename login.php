<?php
include("includes/db.php");
session_start();
if(isset($_SESSION['user_id'])){
	header("location:index.php");
}

if (isset($_POST['c-submit'])) {
	
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	
	$result = mysqli_query($conn, "SELECT * FROM customer WHERE email = '" . $email. "' and password = '" . $password . "'");
		if ($row = mysqli_fetch_array($result)) {
			
			setcookie('user_id', $row['id'], time() + (86400 * 30), "/");
			setcookie('user_name', $row['name'], time() + (86400 * 30), "/");
			setcookie('user_num', $row['num'], time() + (86400 * 30), "/");
			
			$_SESSION['user_id'] = $row['id'];
			$_SESSION['user_name'] = $row['name'];		
			$_SESSION['user_num'] = $row['num'];			
			$_SESSION['user_email'] = $row['email'];		
			$_SESSION['user_address'] = $row['address'];		
			$_SESSION['user_city'] = $row['city'];		
			header("Location: index.php");
		} else {
			echo"<script>alert('Incorrect Details!');</script>";
		}
}

if (isset($_POST['r-submit'])) {
	
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	
	$result = mysqli_query($conn, "SELECT * FROM restaurant WHERE email = '" . $email. "' and password = '" . $password . "'");
		if ($row = mysqli_fetch_array($result)) {
			
			setcookie('restaurant_id', $row['id'], time() + (86400 * 30), "/");
			setcookie('restaurant_name', $row['name'], time() + (86400 * 30), "/");
			setcookie('restaurant_num', $row['num'], time() + (86400 * 30), "/");
			
			$_SESSION['restaurant_id'] = $row['id'];
			$_SESSION['restaurant_name'] = $row['name'];		
			$_SESSION['restaurant_num'] = $row['num'];			
			$_SESSION['restaurant_email'] = $row['email'];		
			$_SESSION['restaurant_address'] = $row['address'];	
			$_SESSION['veg'] = $row['veg'];
			$_SESSION['nonveg'] = $row['nonveg'];
			
			header("Location: index.php");
		} else {
			echo"<script>alert('Incorrect Details!');</script>";
		}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>FoodShala - Register Restaurant</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <link rel="stylesheet" href="css/login.css" />
	<!-- Custom styles -->
    <style>
	
	</style>
  </head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-6" ></div>
				<div class="col-md-6 fo" >
					<div class="card" >
						<div class="card-body">
						  <h5 class="card-title">Welcome Back to <a href="index.php" class="food">FoodShala</a></h5>
						  <!-- Pills navs -->
						  <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
							<li class="nav-item" role="presentation">
							  <a class="nav-link active" id="mdb-tab-login" data-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true" >Customer</a >
							</li>
							<li class="nav-item" role="presentation">
							  <a class="nav-link" id="mdb-tab-register" data-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="false" >Restaurant</a >
							</li>
						  </ul>
						  <!-- Pills navs -->
						  <!-- Pills content -->
						  <div class="tab-content">
							<div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="mdb-tab-login">
							  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform" enctype="multipart/form-data">
								
								<!-- Email input -->
								<div class="form-outline mb-4">
								  <input type="email" id="loginName" name="email" class="form-control" />
								  <label class="form-label" for="loginName">Your Email</label>
								</div>

								<!-- Password input -->
								<div class="form-outline mb-4">
								  <input type="password" id="loginPassword" name="password" class="form-control" />
								  <label class="form-label" for="loginPassword">Your Password</label>
								</div>

								<!-- 2 column grid layout for inline styling -->
								<div class="row mb-4">
								  <div class="col d-flex justify-content-center">
									<!-- Checkbox -->
									<div class="form-check">
									  <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
									  <label class="form-check-label" for="loginCheck"> Remember me </label>
									</div>
								  </div>

								  <div class="col">
									<!-- Simple link -->
									<a href="#!">Forgot password?</a>
								  </div>
								</div>
								<!-- Submit button -->
								<button type="submit" name="c-submit" class="btn btn-success btn-block mb-4">Sign in</button>
								<div class="text-center mb-3">
								  <p class="text-center">or:</p>
								  <p>Sign in with:</p>
								    <button type="button" class="btn btn-danger btn-floating mx-1">
									  <i class="fab fa-facebook-f"></i>
									</button>

									<button type="button" class="btn btn-primary btn-floating mx-1">
									  <i class="fab fa-google"></i>
									</button>

									<button type="button" class="btn btn-info btn-floating mx-1">
									  <i class="fab fa-twitter"></i>
									</button>

									<button type="button" class="btn btn-success btn-floating mx-1">
									  <i class="fab fa-github"></i>
									</button>
								</div>
								<!-- Register buttons -->
								<div class="text-center">
								  <p class="mb-1">Not a member? <a href="customer-register.php">Register</a></p>
								</div>
							  </form>
							</div>
							
							
							<div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="mdb-tab-register" >
							  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform" enctype="multipart/form-data">
								<!-- Email input -->
								<div class="form-outline mb-4">
								  <input type="email" name="email" id="registerEmail" class="form-control" />
								  <label class="form-label" for="registerEmail">Restaurant Email</label>
								</div>

								<!-- Password input -->
								<div class="form-outline mb-4">
								  <input type="password" name="password" id="registerPassword" class="form-control" />
								  <label class="form-label" for="registerPassword">Restaurant Password</label>
								</div>
								<!-- Submit button -->
								<div class="row mb-4">
								  <div class="col d-flex justify-content-center">
									<!-- Checkbox -->
									<div class="form-check">
									  <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
									  <label class="form-check-label" for="loginCheck"> Remember me </label>
									</div>
								  </div>

								  <div class="col">
									<!-- Simple link -->
									<a href="#!">Forgot password?</a>
								  </div>
								</div>
								<!-- Submit button -->
								<button type="submit" name="r-submit" class="btn btn-danger btn-block mb-4">Sign in</button>
								<p class="text-center">or:</p>
								<div class="text-center mb-3">
								  <p>Sign in with:</p>
								  <button type="button" class="btn btn-danger btn-floating mx-1">
									  <i class="fab fa-facebook-f"></i>
									</button>

									<button type="button" class="btn btn-primary btn-floating mx-1">
									  <i class="fab fa-google"></i>
									</button>

									<button type="button" class="btn btn-info btn-floating mx-1">
									  <i class="fab fa-twitter"></i>
									</button>

									<button type="button" class="btn btn-success btn-floating mx-1">
									  <i class="fab fa-github"></i>
									</button>
								</div>
								<!-- Register buttons -->
								<div class="text-center">
								  <p class="mb-1">New Restaurant? <a href="restaurant-register.php">Register Here!</a></p>
								</div>
							  </form>
							</div>
						  </div>
						  <!-- Pills content -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript">
   
  </script>
</html>



