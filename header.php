  <center>
	<img src="img/logo.png" class="logo" alt="Logo"><br>
  </center>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light" >
  <!-- Container wrapper -->
  <div class="container">   
    <!-- Toggle button -->
    <button
      class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>
    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left links -->
      <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="menu.php">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="veg.php">Veg</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="nonveg.php">Non-Veg</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact Us</a>
        </li>
		<?php 
		if(isset($_SESSION['user_id'])){
			$user_id= $_SESSION['user_id'];
			$get_attendance="select * from cart where user_id='$user_id'";
			$run_attendance= mysqli_query($conn, $get_attendance);
			$num = mysqli_num_rows($run_attendance);
			
			echo"
			<li class='nav-item'>
			  <a class='nav-link' href='c-orders.php' >Your Orders</a>
			</li>
			<li class='nav-item'>
			  <a class='nav-link' href='cart.php' >Cart($num)</a>
			</li>
			<li class='nav-item'>
			  <a class='nav-link' href='logout.php' >Logout</a>
			</li>";
		}else if(isset($_SESSION['restaurant_id'])){
			echo"
			<li class='nav-item'>
			  <a class='nav-link' href='add_dish.php' >Add Dish</a>
			</li>
			<li class='nav-item'>
			  <a class='nav-link' href='r-orders.php' >View Orders</a>
			</li>
			<li class='nav-item'>
			  <a class='nav-link' href='logout.php' >Logout</a>
			</li>";
		}
		else{
			?>
			<li class="nav-item dropdown">
			  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false" >
				Register
			  </a>
			  <!-- Dropdown menu -->
			  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
				<li><a class="dropdown-item" href="restaurant-register.php">As Restaurant</a></li>
				<li><hr class="dropdown-divider" /></li>
				<li><a class="dropdown-item" href="customer-register.php">As Customer</a></li>
			  </ul>
			</li>
			<?php
			echo"
			<li class='nav-item'>
			  <a class='nav-link' href='login.php' >Login</a>
			</li>";
		}
		?>
        
      </ul>
      <!-- Left links -->

      <!-- Search form -->
      <form class="d-flex input-group w-auto">
        <input type="search" class="form-control" placeholder="Search Your Food" aria-label="Search" />
        <button class="btn btn-outline-light" type="button" data-ripple-color="dark"> Search </button>
      </form>
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>

<!-- Navbar -->














