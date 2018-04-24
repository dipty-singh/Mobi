<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	<link href="../css/style.css" rel="stylesheet">
  <title>MobiWorld</title>
</head>
<body>
	<?php include('header.php'); ?>
<div id="myCarousel" class="carousel slide carous" data-ride="carousel">
	<div class="carousel-inner">
		<div class="item active">
			<center>
				<img class="imgcar" src="../img/mob8.jpg">
			</center>
		</div>
		<div class="item">
			<center>
				<img class="imgcar" src="../img/m3.jpg">
			</center>
		</div>
		<div class="item">
			<center>
				<img class="imgcar" src="../img/mob2.jpg">
			</center>
		</div>
		<div class="item">
			<center>
				<img class="imgcar" src="../img/mob3.jpg">
			</center>
		</div>
		<div class="item">
			<center>
				<img class="imgcar" src="../img/mob4.jpg">
			</center>
		</div>
		<div class="item">
			<center>
				<img class="imgcar" src="../img/mob5.jpg">
			</center>
		</div>
		<div class="item">
			<center>
				<img class="imgcar" src="../img/m1.jpg">
			</center>
		</div>
	</div>
<!--     <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
  </a> -->
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