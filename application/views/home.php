<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="../css/style.css" rel="stylesheet">
  <title>MobiWorld</title>
</head>
<body>
	<?php include('header.php'); ?>
<div id="myCarousel" class="carousel slide carous" data-ride="carousel">
	<div class="carousel-inner">
		<div class="item active"><center><img class="imgcar" src="https://store.storeimages.cdn-apple.com/4974/as-images.apple.com/is/image/AppleInc/aos/published/images/i/ph/iphone6s/rosegold/iphone6s-rosegold-select-2015?wid=470&hei=556&fmt=jpeg&qlt=95&op_usm=0.5,0.5&.v=wS5lh2"></center></div>
		<div class="item"><center><img class="imgcar" src="https://i.ytimg.com/vi/2I6aX8CojRM/maxresdefault.jpg"></center></div>
		<div class="item"><center><img class="imgcar" src="https://images-na.ssl-images-amazon.com/images/I/71lek4W98EL._SL1500_.jpg"></center></div>
	</div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>

</div>
<div class="container" style="margin-top: 20px;">
	<div class="row">
		<?php foreach ($brand as $key) { ?>
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4"><div class="bord"><a href="http://localhost/mobi/index.php/User/product/<?=($key->brand_id);?>" style="text-decoration: none; color: black;"><center><img class="img_home_prod" src="<?=($key->brand_img);?>"><span><h1><?=($key->brand_name);?></h1></span></a></center></div></div>
		<?php } ?>
	</div>
</div>

</body>
</html>