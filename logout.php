<?php
ob_start();
session_start();
session_unset();
session_destroy();
setcookie('user_id', null, -1, '/');
setcookie('restaurant_id', null, -1, '/');
header("Refresh:2; url=index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>FoodShala - Logout</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
</head>
<body>
<style>

body{
	background:#F5F5F5;
	margin: 0 0 55px 0;
}
div{
	width:100%;
	margin-top:10px;
	font-family: 'Roboto', sans-serif;
	font-size:18px;
	font-weight:400;
}
</style>
<body>
<center>
<img src="img/tick.png" style="margin-top:200px; width:100px;" >
<div>
You have been logged out from your account successfully.
</div>
</center>
</body>
</html>