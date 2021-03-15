<?php
include("includes/db.php");
session_start();
if(isset($_SESSION['user_id'])){
	header("location:index.php");
}

$error = false;
if (isset($_POST['submit'])) {
	
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$num = mysqli_real_escape_string($conn, $_POST['num']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$add = mysqli_real_escape_string($conn, $_POST['address']);
	$city = mysqli_real_escape_string($conn, $_POST['city']);
	
	
	if(empty($_POST['offer'])) {
		echo"<script>alert('Please fill the form completly!');</script>";
	}
	else{
		$checked_count = count($_POST['offer']);
		if($checked_count==1){
			foreach($_POST['offer'] as $selected) {
				if($selected=='veg'){
					$veg=1;
					$nonveg=0;
				}else{
					$veg=0;
					$nonveg=1;
				}
			}
		}else{
			$veg=1;
			$nonveg=1;
		}
	}

	
	if (!preg_match('/^\d{10}$/',$num)) {
		$error = true;
		$num_error = "Contact No. must only contain 10 Digits";
	}
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$email_error = "Please Enter Valid Email ID";
	}

	$image = $_FILES['image']['name'] ;

	//image temp names
	$temp_name = $_FILES['image']['tmp_name'] ;

	$file = rand(1000,100000)."-".$_FILES['image']['name'] ;
	$files = preg_replace('/\s+/', '_', $file);
	$temp_file = $_FILES['image']['tmp_name'] ;
	$file_size = $_FILES['image']['size'];
    $file_type = $_FILES['image']['type'];
	$folder="img/restaurant/";
	$target_file = $folder.basename($_FILES["image"]["name"]);
    $FileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
    move_uploaded_file($temp_file,$folder.$files);
	
	if (!$error) {		 
		$g = "SELECT id FROM restaurant WHERE email ='$email'";
		$r = mysqli_query($conn,$g);
		$ch = mysqli_fetch_array($r);
		if (strlen($ch['id']) != 0)
		{
		  echo"<script>alert('This Restaurant is already registered!');</script>";
		}	
		else{
			echo"<script>alert('$veg');</script>";
			echo"<script>alert('$nonveg');</script>";
			
			if(mysqli_query($conn, "INSERT INTO restaurant(name,num,email,password,address,city,image,veg,nonveg) VALUES
			('$name','$num','$email','$password','$add','$city','$files',$veg,$nonveg)")) {
				header("Location: index.php");
			} else {
				echo"<script>alert('Error in registering!');</script>";
			}
		}
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
    <link rel="stylesheet" href="css/register.css" />
	<!-- Custom styles -->
    <style>
	</style>
  </head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-6"></div>
				<div class="col-md-6 fo" >
					<div class="card">
					  <div class="card-body">
						<h5 class="card-title">Register Your Restaurant</h5>
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform" enctype="multipart/form-data">
						<!-- 2 column grid layout with text inputs for the first and last names -->
						  <div class="form-outline mb-4">
							<input type="text" id="form3Example1" name="name" class="form-control"/>
							<label class="form-label" for="form3Example1">Restaurant Name</label>
						  </div>
						   <div class="form-outline mb-4">
							<input type="text" id="form3Example2" name="num" class="form-control" />
							<label class="form-label" for="form3Example2">Contact No.</label>
						  </div>
						  <!-- Email input -->
						  <div class="form-outline mb-4">
							<input type="email" id="form3Example3" name="email" class="form-control" />
							<label class="form-label" for="form3Example3">Email address</label>
						  </div>
						  <!-- Password input -->
						  <div class="form-outline mb-4">
							<input type="password" id="form3Example4" name="password" class="form-control" />
							<label class="form-label" for="form3Example4">Password</label>
						  </div>
						  <div class="form-outline mb-4">
							<input type="text" id="form3Example5" name="address" class="form-control" />
							<label class="form-label" for="form3Example5">Address</label>
						  </div>
						  
						  <div class="form-outline mb-4">
							<input type="text" id="form3Example6" name="city" class="form-control" />
							<label class="form-label" for="form3Example6">City</label>
						  </div>
							<div class="form-file">
							  <input type="file" class="form-file-input" name="image" id="customFile" />
							  <label class="form-file-label" for="customFile">
								<span class="form-file-text">Restaurant Image (300px X 200px)</span>
								<span class="form-file-button">Upload</span>
							  </label>
							</div>
						  <!-- Checkbox -->
						  <br>
						  <div class="row mb-4">
							<div class="col-md-5 col-12">
							You are offering
							</div>
							<div class="col-md-3 col-6">
							  <div class="form-check d-flex justify-content-center mb-4">
								<input class="form-check-input mr-2" type="checkbox" name="offer[]" value="veg" id="form2Example3" />
								<label class="form-check-label" for="form2Example3">
								  Veg
								</label>
							  </div>
							</div>
							<div class="col-md-4 col-6">
							  <div class="form-check d-flex justify-content-center mb-4">
								<input class="form-check-input mr-2" type="checkbox" name="offer[]" value="nonveg" id="form2Example4" />
								<label class="form-check-label" for="form2Example4">
								  Non-Veg
								</label>
							  </div>
							</div>
						  </div>
						  
						  <!-- Submit button -->
						  <button type="submit" name="submit" class="btn btn-success btn-block mb-4">
							Sign up
						  </button>

						  <!-- Register buttons -->
						  <div class="text-center">
							<p>or Register with:</p>
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
						</form>
					  </div>
					</div>
				</form>
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
