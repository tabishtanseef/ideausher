<?php
include("includes/db.php");
session_start();
if(!isset($_SESSION['restaurant_id'])){
	header("location:index.php");
}else{
	$r_id = $_SESSION['restaurant_id'];
	$r_name = $_SESSION['restaurant_name'];
}

if (isset($_POST['add_dish'])) {
	
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$price = mysqli_real_escape_string($conn, $_POST['price']);
	$tagline = mysqli_real_escape_string($conn, $_POST['tag']);
	$desc = mysqli_real_escape_string($conn, $_POST['desc']);
	$cat = $_POST['cat'];
	$qty = $_POST['qty'];
	
	$image = $_FILES['image']['name'] ;
	$temp_name = $_FILES['image']['tmp_name'] ;
	$file = rand(1000,100000)."-".$_FILES['image']['name'] ;
	$files = preg_replace('/\s+/', '_', $file);
	$temp_file = $_FILES['image']['tmp_name'] ;
	$file_size = $_FILES['image']['size'];
    $file_type = $_FILES['image']['type'];
	$folder="img/dish/";
	$target_file = $folder.basename($_FILES["image"]["name"]);
    $FileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$checkpic = substr($files,-4);
	if($checkpic==".jpg" || $checkpic==".png"  ){
		echo"<script>alert('$files');</script>";
		move_uploaded_file($temp_file,$folder.$files);
		
		if(mysqli_query($conn, "INSERT INTO dish(name, category, price, qty, tagline, description, image, restaurant_id, restaurant_name) VALUES
			('$name', '$cat', '$price', '$qty', '$tagline', '$desc', '$files', '$r_id', '$r_name')")) {
			
		} else {
			echo"<script>alert('Error in registering!');</script>";
		}
	}else{
		echo"<script>alert('Please Upload an Image!');</script>";
	}
}


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>FoodShala - Add Dish</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <link rel="stylesheet" href="css/add_dish.css" />
	<!-- Custom styles -->
    <style>
	</style>
  </head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-6 fo" >
					<div class="card">
					  <div class="card-body">
						<h5 class="card-title">
						<span class="card-title red"><?php echo $_SESSION['restaurant_name']; ?></span>
						<br><br>
						Add new Dish to <a href="index.php" class="food">FoodShala</a></h5>
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="adddish" enctype="multipart/form-data">
						  <div class="row mb-4">
							<div class="col-md-5 col-12">
							Dish Category
							</div>
							<?php 
							if($_SESSION['veg']==1 && $_SESSION['nonveg']==1){
								
								echo"
								<div class='col-md-3 col-6'>
								  <div class='form-check d-flex justify-content-center mb-4'>
									<input class='form-check-input mr-2' type='radio' name='cat' value='veg' id='form2Example3' />
									<label class='form-check-label' for='form2Example3'>
									  Veg
									</label>
								  </div>
								</div>
								<div class='col-md-4 col-6'>
								  <div class='form-check d-flex justify-content-center mb-4'>
									<input class='form-check-input mr-2' type='radio' name='cat' value='nonveg' id='form2Example4' />
									<label class='form-check-label' for='form2Example4'>
									  Non-Veg
									</label>
								  </div>
								</div>
							  </div>";
								
							}else if($_SESSION['veg']==1 && $_SESSION['nonveg']==0){
								
								echo"
								<div class='col-md-3 col-6'>
								  <div class='form-check d-flex justify-content-center mb-4'>
									<input class='form-check-input mr-2' type='radio' name='cat' checked value='veg' id='form2Example3' />
									<label class='form-check-label' for='form2Example3'>
									  Veg
									</label>
								  </div>
								</div>
								<div class='col-md-4 col-6'>
								  <div class='form-check d-flex justify-content-center mb-4'>
									<input class='form-check-input mr-2' type='radio' name='cat' disabled value='nonveg' id='form2Example4' />
									<label class='form-check-label' for='form2Example4'>
									  Non-Veg
									</label>
								  </div>
								</div>
							  </div>";
								
							}else if($_SESSION['veg']==0 && $_SESSION['nonveg']==1){
								
								echo"
								<div class='col-md-3 col-6'>
								  <div class='form-check d-flex justify-content-center mb-4'>
									<input class='form-check-input mr-2' type='radio' name='cat' disabled value='veg' id='form2Example3' />
									<label class='form-check-label' for='form2Example3'>
									  Veg
									</label>
								  </div>
								</div>
								<div class='col-md-4 col-6'>
								  <div class='form-check d-flex justify-content-center mb-4'>
									<input class='form-check-input mr-2' type='radio' name='cat' checked value='nonveg' id='form2Example4' />
									<label class='form-check-label' for='form2Example4'>
									  Non-Veg
									</label>
								  </div>
								</div>
							  </div>";
								
							}else{
								
							}
							?>
							
							
						  <div class="form-outline mb-4" style="margin-top:-20px;">
							<input type="text" id="form3Example1" name="name" class="form-control"/>
							<label class="form-label" for="form3Example1">Dish Name</label>
						  </div>
						  <div class="form-outline mb-4">
							<input type="text" id="form3Example4" name="price" class="form-control" />
							<label class="form-label" for="form3Example4">Price</label>
						  </div>
						  <div class="form-outline mb-4">
							<input type="text" id="form3Example4" name="qty" class="form-control" />
							<label class="form-label" for="form3Example4">Quantity</label>
						  </div>
						  <div class="form-outline mb-4">
							<input type="text" id="form3Example2" name="tag" class="form-control" />
							<label class="form-label" for="form3Example2">Tag Line</label>
						  </div>
						  <div class="form-file">
							  <input type="file" class="form-file-input" name="image" id="customFile" />
							  <label class="form-file-label" for="customFile">
								<span class="form-file-text">Dish Image (500px X 333px)</span>
								<span class="form-file-button">Upload</span>
							  </label>
						  </div>
						  <br>
						  <div class="form-outline mb-4">
							<textarea id="form3Example3" rows="5" name="desc" class="form-control" /></textarea>
							<label class="form-label" for="form3Example3">Description</label>
						  </div>
						  <!-- Submit button -->
						  <button type="submit" name="add_dish" id="add_dish" class="btn btn-danger btn-block mb-4">
							Add Dish
						  </button>						  
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
   $(document).ready(function () {
		var pic = document.getElementById('customFile').value;
		if(pic==""){
			document.getElementById('add_dish').css('pointer-events','none');
		}
	});
  </script>
</html>
