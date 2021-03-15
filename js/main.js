function placeorder(user_id){
   $.ajax({
		url: 'placeorder.php',
		type: 'POST',
		data: {'user_id':user_id},
		dataType: 'json',
		success:function(response){
			var len = response.length;
			var message = response[0]['message'];
			if(message=="Login"){
				$('#respo').html('Please Login to Continue');
				window.location.href = "login.php";
			}else if(message=="Order Placed"){
				console.log('hiiiii');
				$('#respo').html('Your Order Has Been Placed Successfully!');
				$('#quickModal').modal('show');
				setTimeout(function(){ window.location = 'index.php' }, 1500);
			}else{
				$('#respo').html('Please Try Again!');
				$('#quickModal').modal('show');
			}
		}
	});
   }
   
function addtocart(dish_id){
	qty = $('#dish'+dish_id).val();
   $.ajax({
		url: 'addtocart.php',
		type: 'POST',
		data: {'dish_id':dish_id,'qty':qty},
		dataType: 'json',
		success:function(response){
			var len = response.length;
			var message = response[0]['message'];
			if(message=="Login"){
				$('#respo').html('Please Login to Continue');
				window.location.href = "login.php";
			}else if(message=="Added to cart"){
				$('#respo').html('Dish Added to Cart!');
				$('#quickModal').modal('show');
				setTimeout(function(){ location.reload(); }, 1500);
				
			}else if(message=="Dish is currently Out of Stock"){
				$('#respo').html('Dish is currently Out of Stock!');
				$('#quickModal').modal('show');
			}else if(message=="Try Again"){
				$('#respo').html('Please Try Again!');
				$('#quickModal').modal('show');
			}else if(message=="Already Added"){
				$('#respo').html('Already Added!');
				$('#quickModal').modal('show');
			}else{
				$('#respo').html(message);
				$('#quickModal').modal('show');
			}
		}
	});
   }