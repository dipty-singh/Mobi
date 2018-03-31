<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="../../../css/style.css" rel="stylesheet">
  <title>MobiWorld</title>
</head>
<body>
	<?php include('header.php'); ?>
	<div class="container" style="margin-top: 20px;">
		<div class="row">
			<?php foreach ($prod as $key) { ?>
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4"><div class="bord"><a href="http://localhost/mobi/index.php/User/product_detail/<?=($key->id);?>" style="text-decoration: none; color: black;"><center><img class="img_home_prod" src="<?=($key->product_img);?>"><span><h1><?=($key->product_name);?></h1></span></a></center></div></div>
			<?php } ?>			
		</div>
	</div>
</body>
</html>