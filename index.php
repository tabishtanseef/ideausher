<?php
include("includes/db.php");
session_start();

if(isset($_SESSION['restaurant_id'])){
	echo "<style>
	.btn-danger, .btn-success{
		pointer-events:none;
		background-color:grey !important;
	}
	</style>";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>FoodShala - Homepage</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <!-- Custom styles -->
    <style>
	</style>
  </head>
  <body>
    <!-- Start your project here-->
<?php include('header.php'); ?>
<!-- Carousel wrapper -->
<div  id="carouselDarkVariant"  class="carousel slide carousel-fade carousel-dark"  data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carouselDarkVariant" data-slide-to="0" class="active"></li>
    <li data-target="#carouselDarkVariant" data-slide-to="1"></li>
    <li data-target="#carouselDarkVariant" data-slide-to="2"></li>
  </ol>
  <!-- Inner -->
  <div class="carousel-inner">
    <!-- Single item -->
    <div class="carousel-item active">
      <img src="img/slider/1.jpg" class="d-block w-100" alt="..." />
    </div>
    <!-- Single item -->
    <div class="carousel-item">
      <img src="img/slider/buffet.jpg" class="d-block w-100" alt="..." />
    </div>
    <!-- Single item -->
    <div class="carousel-item">
      <img src="img/slider/3.jpg" class="d-block w-100" alt="..." />
    </div>
  </div>
  <!-- Inner -->
  <!-- Controls -->
  <a class="carousel-control-prev" href="#carouselDarkVariant" role="button" data-slide="prev" >
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselDarkVariant" role="button" data-slide="next" >
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </a>
</div>
<!-- Carousel wrapper -->

<h1 class="cat">Food By Category</h1>
<div class="desc">Make your taste buds ready because we are going to deliver you the best food ever.</div>
<div class="container">
	<div class="row">
		<div class="col-6 trans" id="cont">
		<center>
		<a class="ripple" href="veg.php">
		  <img alt="Veg" class="img-fluid rounded" src="img/veg.jpg" />
		</a>
		<div class="caption">Veg – Keep Calm and Eat Plants</div>
		</center>
		</div>
		<div class="col-6 trans" id="cont">
		<center>
		<a class="ripple" href="nonveg.php">
		  <img alt="Non-Veg" class="img-fluid rounded" src="img/non-veg.jpg" />
		</a>
		<div class="caption">Non-Veg – You can never say No to Chicken</div>
		</center>
		</div>
	</div>
</div>
<!--
<h1 class="cat">Most Popular Food Items</h1>
<div class="container">
	<div class="row">
		<div class="col-lg-3 col-6 pop" id="">
		<div class="card">
		  <div class="bg-image hover-overlay ripple" data-ripple-color="light">
			<img src="img/non-veg/1.jpg" class="img-fluid" />
			<a href="#!">
			  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
			</a>
		  </div>
		  <div class="card-body">
			<h5 class="card-title">Card title</h5>
			<p class="card-text">
			  Some quick example text to build on the card title and make up the bulk of the
			  card's content.
			</p>
			<button type="button" class="btn btn-danger" data-ripple-color="dark">Add to Cart</button>
		  </div>
		</div>
		</div>
		<div class="col-lg-3 col-6 pop" id="">
		<div class="card">
		  <div class="bg-image hover-overlay ripple" data-ripple-color="light">
			<img src="img/veg/1.jpg" class="img-fluid" />
			<a href="#!">
			  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
			</a>
		  </div>
		  <div class="card-body">
			<h5 class="card-title">Card title</h5>
			<p class="card-text">
			  Some quick example text to build on the card title and make up the bulk of the
			  card's content.
			</p>
			<button type="button" class="btn btn-danger" data-ripple-color="dark">Order Now</button>
		  </div>
		</div>
		</div>
		<div class="col-lg-3 col-6 pop" id="">
		<div class="card">
		  <div class="bg-image hover-overlay ripple" data-ripple-color="light">
			<img src="img/non-veg/2.jpg" class="img-fluid" />
			<a href="#!">
			  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
			</a>
		  </div>
		  <div class="card-body">
			<h5 class="card-title">Card title</h5>
			<p class="card-text">
			  Some quick example text to build on the card title and make up the bulk of the
			  card's content.
			</p>
			<button type="button" class="btn btn-danger" data-ripple-color="dark">Order Now</button>
		  </div>
		</div>
		</div>
		<div class="col-lg-3 col-6 pop" id="">
		<div class="card">
		  <div class="bg-image hover-overlay ripple" data-ripple-color="light">
			<img src="img/veg/2.jpg" class="img-fluid" />
			<a href="#!">
			  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
			</a>
		  </div>
		  <div class="card-body">
			<h5 class="card-title">Card title</h5>
			<p class="card-text">
			  Some quick example text to build on the card title and make up the bulk of the
			  card's content.
			</p>
			<button type="button" class="btn btn-danger" data-ripple-color="dark">Order Now</button>
		  </div>
		</div>
		</div>
	</div>
</div>
-->
<h1 class="cat">Choose Your favourite Restaurant</h1>
<div class="main-carousel" data-flickity='{"autoPlay":true,"cellAlign": "left", "contain": true}'>
	
	<?php
		$get_attendance="select id, name, image from restaurant";
		$run_attendance= mysqli_query($conn, $get_attendance);
		$n=1;
		while($row_attendance=mysqli_fetch_array($run_attendance))
		{
			$id = $row_attendance['id'];
			$name = $row_attendance['name'];
			$image = $row_attendance['image'];
			echo "
			<div class='carousel-cell'>
				<a href='menu.php?r_id=$id&r_name=$name#$id'>
				<div class='card'>
				  <div class='bg-image hover-overlay ripple' data-ripple-color='light'>
					<img src='img/restaurant/$image' class='img-fluid full' />
					<div class='mask' style='background-color: rgba(251, 251, 251, 0.15)'></div>
				  </div>
				  <div class='card-body'>
					<h5 class='card-title'>$name</h5>
				  </div>
				</div>
				</a>
			</div>";
		}
	?>
</div>
<br>
<div id="toss"></div>

<h1 class="cat">Our Special Veg Dishes</h1>
<div class="container">
	<div class="row">
	<?php
		$get_attendance="select * from dish where category='veg' order by id DESC LIMIT 6";
		$run_attendance= mysqli_query($conn, $get_attendance);
		$n=1;
		while($row_attendance=mysqli_fetch_array($run_attendance))
		{
			$id = $row_attendance['id'];
			$name = $row_attendance['name'];
			$image = $row_attendance['image'];
			$price = $row_attendance['price'];
			$qty = $row_attendance['qty'];
			$tagline = $row_attendance['tagline'];
			$description = $row_attendance['description'];
			$r_name = $row_attendance['restaurant_name'];
	
			echo "
			<div class='col-lg-4 col-6 pop' id='cont'>
			<div class='card'>
			  <div class='bg-image hover-overlay ripple' data-ripple-color='light'>
				<img src='img/dish/$image' class='img-fluid' />
				<div class='mask' style='background-color: rgba(251, 251, 251, 0.15)'></div>
			  </div>
			  <div class='card-body'>
				<h5 class='card-title dish-name'>
					<div class='d-flex justify-content-between'>
						$name <span style='display:block; text-align:right;'>&#8377; $price</span>
					</div>
					<div class='d-flex justify-content-start restaurant'>
						$r_name
					</div>
					<div class='d-flex justify-content-start tagline'>
						$tagline
					</div>
				</h5>
				<p class='card-text'>
				  $description
				</p>
				<input id='dish$id' type='number' min='1' max='$qty' class='form-control' value='1' style='text-align:center; width:75px; display:inline;'>
				<button type='button' class='btn btn-success' data-ripple-color='dark' onClick='addtocart($id)'>Add to Cart</button>
			  </div>
			</div>
			</div>";
		
		} 
		?>
		
	</div>
</div>

<h1 class="cat">Delicious Non-Veg Buffet</h1>
<div class="container">
	<div class="row">
	<?php
		$get_attendance="select * from dish where category='nonveg' order by id DESC LIMIT 6";
		$run_attendance= mysqli_query($conn, $get_attendance);
		$n=1;
		while($row_attendance=mysqli_fetch_array($run_attendance))
		{
			$id = $row_attendance['id'];
			$name = $row_attendance['name'];
			$image = $row_attendance['image'];
			$price = $row_attendance['price'];
			$tagline = $row_attendance['tagline'];
			$description = $row_attendance['description'];
			$r_name = $row_attendance['restaurant_name'];
	
			echo "
			<div class='col-lg-4 col-6 pop' id='cont'>
			<div class='card'>
			  <div class='bg-image hover-overlay ripple' data-ripple-color='light'>
				<img src='img/dish/$image' class='img-fluid' />
				<div class='mask' style='background-color: rgba(251, 251, 251, 0.15)'></div>
			  </div>
			  <div class='card-body'>
				<h5 class='card-title dish-name'>
					<div class='d-flex justify-content-between'>
						$name <span style='display:block; text-align:right;'>&#8377; $price</span>
					</div>
					<div class='d-flex justify-content-start restaurant'>
						$r_name
					</div>
					<div class='d-flex justify-content-start tagline'>
						$tagline
					</div>
				</h5>
				<p class='card-text'>
				  $description
				</p>
				<input id='dish$id' type='number' min='1' max='$qty' class='form-control' value='1' style='text-align:center; width:75px; display:inline;'>
				<button type='button' class='btn btn-success' data-ripple-color='dark' onClick='addtocart($id)'>Add to cart</button>
			  </div>
			</div>
			</div>";
		} 
		?>
	</div>
</div>
<center>
<div class="modal fade modal-quick-view" id="quickModal" tabindex="-1" role="dialog" aria-labelledby="quickModal" aria-hidden="true">
<div class="modal-dialog" role="document">
	<center>
	<div class="modal-content" style="width:100%;">
		<div class="modal-body">
			<img src="img/order.png" style='width:100px;'>
			<h5 class="cati" id="respo"></h5>
		</div>
	</div>
	</center>
</div>
</div>
</center>
<?php include('footer.php');?>
  <!-- End your project here-->
  </body>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
   <script type="text/javascript" src="js/main.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript">
   
  </script>
</html>
