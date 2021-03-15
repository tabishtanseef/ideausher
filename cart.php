<?php
include("includes/db.php");
session_start();

if(!isset($_SESSION['user_id'])){
	header('location:index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>FoodShala - Orders</title>
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
<h1 class="cat">Your Cart</h1>
<div class="desc">Make your taste buds ready because we are going to deliver you the best food ever.</div>
<div class="container">
	<div class="row">
	<div class="col-md-6">
	<?php
		$total_price = 0;
		$user_id= $_SESSION['user_id'];
		$get_attendance="SELECT cart.id, cart.user_id, cart.dish_id, cart.qty, 
		dish.id, dish.name, dish.image, dish.price, dish.restaurant_name
		FROM ( cart
		INNER JOIN dish ON cart.dish_id = dish.id) where cart.user_id='$user_id' order by cart.id DESC";
		
		$run_attendance= mysqli_query($conn, $get_attendance);
		
		while($row_attendance=mysqli_fetch_array($run_attendance))
		{
			$id = $row_attendance['id'];
			
			$image = $row_attendance['image'];
			$qty = $row_attendance['qty'];
			$price = $row_attendance['price'];
			
			$d_name = $row_attendance['name'];
			$r_name = $row_attendance['restaurant_name'];
			$price = $qty*$price;
			$total_price = $total_price + $price;
			echo "<div class='row' class='order'>
			<div class='col-4' id='cont'>
				<img src='img/dish/$image' class='' style='width:100%;' />
			</div>
			<div class='col-8 pop' id='cont'>
				<div class='d-flex justify-content-between restaurant red'>
					$d_name 
				</div>
				<div class='d-flex justify-content-between restaurant'>
					$r_name 
				</div>
				<div class='d-flex justify-content-between restaurant'>
					Qty - $qty <span style='display:block; text-align:right;' class='bold'>Price - &#8377; $price</span>
				</div>
			</div>
			</div> 
			<hr>";
		
		} 
		?>
		
	</div>
	<div class="col-md-6">
	<?php
		$user_id= $_SESSION['user_id'];
		$get_attendance="SELECT * from customer where id='$user_id'";
		
		$run_attendance= mysqli_query($conn, $get_attendance);
		
		$row_attendance=mysqli_fetch_array($run_attendance);
		
		$id = $row_attendance['id'];
		
		$name = $row_attendance['name'];
		$num = $row_attendance['num'];
		$email = $row_attendance['email'];
		
		$address = $row_attendance['address'];
		$city = $row_attendance['city'];
		echo "<div class='row' class='order'>
		<div class='col-6 pop' id='cont'></div>
		<div class='col-6 pop' id='cont' style='text-align:center !important;'>
			<h2 class='d-flex'>Delivery Address</h2>
			<div class='d-flex  restaurant'>
				Name - $name <br>
				Contact No.  - $num <br>
				Address - $address <br>
				City - $city <br>
				Total Price - &#8377; $total_price<br><br>
			</div>
			<div class='d-flex'>
				<center><button type='button' class='btn btn-success' data-ripple-color='dark' onClick='placeorder($user_id)'>Place Order</button></center>
			</div>
		</div>
		</div> 
		";
		
		?>
	</div>
	</div>
	</div>
</div>

<?php include('footer.php');?>
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
  <!-- End your project here-->
  </body>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript"></script>
</html>
