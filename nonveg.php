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
    <!-- Custom styles -->
    <style>
	</style>
  </head>
  <body>
    <!-- Start your project here-->
<?php include('header.php'); ?>
<img src="img/nonveg-banner.jpg" style="width:100%;">
<h1 class="cat">You can never say No to Chicken</h1>
<div class="desc">Make your taste buds ready because we are going to deliver you the best food ever.</div>
<div class="container">
	<div class="row">
	<?php
		$get_attendance="select * from dish where category='nonveg' order by rand()";
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
				<button type='button' class='btn btn-success' data-ripple-color='dark' onClick='addtocart($id)'>Add To cart</button>
			  </div>
			</div>
			</div>";
		
		} 
		?>
		
	</div>
</div>

<?php include('footer.php');?>
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
  <!-- End your project here-->
  </body>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
   <script type="text/javascript" src="js/main.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript">
   
  </script>
</html>
