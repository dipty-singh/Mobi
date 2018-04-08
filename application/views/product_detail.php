<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	<link href="../../../css/style.css" rel="stylesheet">
  <title>MobiWorld</title>
</head>
<body>
	<?php include('header.php'); ?>
	<div class="container" style="margin-bottom: 20px;">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<img class="image_product" src="<?=($prod->product_img);?>">
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="row" style="">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<h1><?=($prod->product_name);?></h1>
						<input type="hidden" id="prod_id" name="product_id" value="<?=($prod->id);?>">
						<div class="col-md-6 col-sm-6 col-xs-6">
							<h3>Brand: </h3><h5><?=($prod->brand_name);?></h5>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<h3>Model: </h3><h5><?=($prod->model_number);?></h5>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<h3>Price: </h3><h5>Rs. <?=($prod->price);?></h5>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6" style="visibility: hidden;">
							<h3>Price: </h3><h5><?=($prod->price);?></h5>
						</div>
						<?php if ($prod->accesories != '') { ?>
						<h2><span class="glyphicon glyphicon-star-empty" style="width: 30px;"></span> Accesories</h2>
						<h4><?=($prod->accesories);?></h4>
						<?php } ?>
						<h2><span class="glyphicon glyphicon-star-empty" style="width: 30px;"></span> Features</h2>
						<ul>
						<?php
						$desc = explode(',', $prod->product_description);
						foreach ($desc as $key) {
							$des = explode(':', $key); ?>
							<li><?=($des[0]);?>	:	<?=($des[1]);?></li>
						<?php }
						 ?>
						</ul>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<input type="button" data-target="#add_model" data-toggle="modal" name="buy" value="BUY NOW" class="btn btn-info" style="width: 100%;">
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<input type="button" id="cart" name="cart" value="Add to cart" class="btn btn-info" style="width: 100%;">
						</div>
					</div>
				</div>				
			</div>
		</div>
	</div>

<div id="add_model" class="modal fade" role="dialog">
	<div class="modal-dialog" style="width: 400px;">
		<div class="modal-content">
			<div class="modal-header">
				<h1>Enter Address</h1>
				<span style="float: right; cursor: pointer; color: red;" data-dismiss="modal">X</span>
			</div>
			<div class="modal-body">
				<center>
					<!-- <form method="post" name="login_form" action=""> -->
						<textarea cols="50" rows="6" class="form-control"></textarea>
						<input type="submit" id="booking" name="sign_up" value="Book Now">
					<!-- </form> -->
				</center>
			</div>
		</div>
	</div>
</div>

	<script>
		$(document).ready(function(){
		$('#booking').click(function(){
			var prod_id = $('#prod_id').val();
			var address = $('#address').val();
			console.log(prod_id);
			$.ajax({
				type: "POST",
	 			dataType: 'json',
	 			url: "http://localhost/mobi/index.php/User/booking",
	 			data: 'prod_id='+prod_id+'&address='+address,
	 			success:function(response){
	 				console.log(response);
	 				if (response.success) {
	 					sweetAlert(response.msg);
	 				}
	 				else{
	 					sweetAlert(response.msg);
	 				}
	 			},
	 			error:function(res){
	 				console.log(res);
	 				// sweetAlert(res);
	 			}
			});
		});
	});
	</script>
</body>
</html>