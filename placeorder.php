<?php
include_once("includes/db.php");
session_start();
global $conn ;
$conn  = mysqli_connect("localhost","root","","foodshala");


function check_dish_qty($dish_id){
	
}



if(isset($_SESSION['user_id'])){  
	
	$user_id = $_SESSION['user_id'];
	$dishes_id = array();
	$dishes_qty = array();
	$total_price = 0;
	$get_attendance="SELECT * from cart where user_id='$user_id'";
	$run_attendance= mysqli_query($conn, $get_attendance);
	while($row_attendance=mysqli_fetch_array($run_attendance)){
		$dish_id = $row_attendance['dish_id'];
		array_push($dishes_id,$dish_id);
		$qty = $row_attendance['qty'];
		array_push($dishes_qty,$qty);
		$query1 = "delete from cart where dish_id='$dish_id' and user_id='$user_id'";
		$run_query1 = mysqli_query($conn,$query1);
		
		$query = "select * from dish where id='$dish_id'";
		$run_query = mysqli_query($conn,$query);
		$row_query = mysqli_fetch_assoc($run_query);
		$qty = $row_query['qty'];
		$dish = $row_query['name'];
		if($qty<=0){
			$que = "select user_id from cart where dish_id='$dish_id'";
			$run_que = mysqli_query($conn,$que);
			while($row_que = mysqli_fetch_assoc($run_que)){
				$user_id = $row_que['user_id'];
				$q = "select email from customer where id='$user_id'";
				$run_q = mysqli_query($conn,$q);
				$row_q = mysqli_fetch_assoc($run_q);
				$recipient = $row_q['email'];
				$subject = "Hurry Only 1 Hour Left";
				$email_headers = "From: tabishtanseef.goodluck@gmail.com\r\n";
				$email_headers .= "MIME-Version: 1.0\r\n";
				$email_headers .= "Content-Type: text/html; charset=ISO-8859-1 \r\n";
				$message = "Hey please place an order for $dish which is added in your cart within 1 hour or else it will be removed from your cart.<br>Thanks,<br>FoodShala.";
				$email_content = "$message\n";
				mail($recipient, $subject, $email_content, $email_headers);
				
				
				$restaurant_id = $row_query['restaurant_id'];
				$q = "select email from restaurant where id='$restaurant_id'";
				$run_q = mysqli_query($conn,$q);
				$row_q = mysqli_fetch_assoc($run_q);
				$recipient = $row_q['email'];
				$subject = "Dish Out of Stock very soon";
				$email_headers = "From: tabishtanseef.goodluck@gmail.com\r\n";
				$email_headers .= "MIME-Version: 1.0\r\n";
				$email_headers .= "Content-Type: text/html; charset=ISO-8859-1 \r\n";
				$message = "Hey Dear Restaurant Owner,<br>Please check that '$dish' is going to be out of stock very soon. Please update its quantity.<br>Thanks,<br>FoodShala.";
				$email_content = "$message\n";
				mail($recipient, $subject, $email_content, $email_headers);
				
			}
		}
		
		$price = $row_query['price'];
		$total_price = $total_price + $price;
	}
	
	$all_dishes_id = implode(',',$dishes_id);
	$all_dishes_qty = implode(',',$dishes_qty);
	
	
	date_default_timezone_set("Asia/Calcutta");
	$date=date("Y-m-d");
	$time = date("h:i:s");  
	$timestamp = strtotime($date);
	$day = date('l', $timestamp);
	
	$order_id = rand(10000000,99999999);
	
	$g = "insert into orders (user_id, order_id, dishes, qty, date, day, time)
	values ('$user_id','$order_id','$all_dishes_id','$all_dishes_qty','$date','$day','$time')";
	
	if ($r = mysqli_query($conn,$g))
	{		
		$success_message = "Order Placed"; 
		$users_arr[] = array( "message" => $success_message);
	}	
	else{
		$success_message = "Try Again";
		$users_arr[] = array( "message" => $success_message);
	}
}
else{
	$success_message = "Login";
	$users_arr[] = array( "message" => $success_message);
}
// encoding array to json format
echo json_encode($users_arr);
?>