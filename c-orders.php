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
<h1 class="cat">Recent Orders</h1>
<div class="desc">Make your taste buds ready because we are going to deliver you the best food ever.</div>
<div class="container">
	<?php
		$get_attendance="SELECT orders.id, orders.order_id, orders.user_id, orders.dish_id, orders.date, orders.is_delivered, 
		customer.name As cname, customer.num, customer.address, customer.city, 
		dish.name, dish.image, dish.price, dish.restaurant_name
		FROM (( orders
		INNER JOIN customer ON orders.user_id = customer.id)
		INNER JOIN dish ON orders.dish_id = dish.id) where orders.is_delivered=0 order by orders.id DESC";
		
		$run_attendance= mysqli_query($conn, $get_attendance);
		$n=1;
		while($row_attendance=mysqli_fetch_array($run_attendance))
		{
			$id = $row_attendance['id'];
			$order_id = $row_attendance['order_id'];
			
			$date = $row_attendance['date'];
			$image = $row_attendance['image'];
			$price = $row_attendance['price'];
			
			$d_name = $row_attendance['name'];
			$c_name = $row_attendance['cname'];
			$num = $row_attendance['num'];
			$address = $row_attendance['address'];
			$city = $row_attendance['city'];
			$r_name = $row_attendance['restaurant_name'];
	
			echo "<div class='row' class='order'>
			<div class='col-4' id='cont'>
				<img src='img/dish/$image' class='' style='width:100%;' />
			</div>
			<div class='col-8 pop' id='cont'>
				<div class='d-flex justify-content-between restaurant red'>
					$d_name <span style='display:block; text-align:right;'>Order Id -#$order_id</span>
				</div>
				<div class='d-flex justify-content-between restaurant'>
					$r_name 
				</div>
				<div class='d-flex justify-content-between restaurant'>
					$c_name <span style='display:block; text-align:right;'>Order Date - $date</span>
				</div>
				<div class='d-flex justify-content-between restaurant'>
					$num <span style='display:block; text-align:right;' class='bold'>Total Price - &#8377; $price</span>
				</div>
			</div>
			</div> 
			<hr>";
		
		} 
		?>
		
	</div>
</div>

<?php include('footer.php');?>
<div class="modal fade modal-quick-view" id="quickModal" tabindex="-1" role="dialog" aria-labelledby="quickModal" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
	<center>
	<div class="modal-content" style="width:70%;">
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
  <script type="text/javascript"></script>
</html>
