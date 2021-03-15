<?php
include_once("includes/db.php");
session_start();

if(isset($_SESSION['user_id'])){  
	
	$user_id = $_SESSION['user_id'];
	$dish_id = $_POST['dish_id'];
	$qty = $_POST['qty'];
	$get_attendance="select qty from dish where id='$dish_id'";
	$run_attendance= mysqli_query($conn, $get_attendance);
	$row_attendance=mysqli_fetch_array($run_attendance);
	if($qty <= $row_attendance['qty']){
		$user_id= $_SESSION['user_id'];
		$get_att="select * from cart where dish_id='$dish_id' and user_id='$user_id'";
		$run_att= mysqli_query($conn, $get_att);
		$row_att=mysqli_num_rows($run_att);
		if($row_att==0){
			$g = "insert into cart (user_id, dish_id, qty) values ('$user_id','$dish_id','$qty')";
			
			if ($r = mysqli_query($conn,$g))
			{
				$query = "update dish set qty=qty-$qty where id='$dish_id'";
				
				$run_query = mysqli_query($conn,$query);
				if($run_query){
					$success_message = "Added to cart"; 
					$users_arr[] = array( "message" => $success_message);
				}
			}	
			else{
				$success_message = "Try Again";
				$users_arr[] = array( "message" => $success_message);
			}
		}else{
			$success_message = "Already Added";
			$users_arr[] = array( "message" => $success_message);
		}
	}else{
		if($row_attendance['qty']!=0){
			$success_message = "Quantity can not be greater than ".$row_attendance['qty'];
			$users_arr[] = array( "message" => $success_message);
		}else{
			$success_message = "Dish is currently Out of Stock";
			$users_arr[] = array( "message" => $success_message);
		}		
	}
}
else{
	$success_message = "Login";
	$users_arr[] = array( "message" => $success_message);
}
// encoding array to json format
echo json_encode($users_arr);
?>