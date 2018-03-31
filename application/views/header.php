<div id="wr wrapper">
<div id="header">
	<div id="subheader">
<div class="container_head">
	<p>ONLINE MOBILE STORE</p>
	<?php if (isset($_SESSION['name'])) { ?>
	<!-- <a href="#" data-target="#login_model" data-toggle="modal"></a> -->
	<a href="#"><?php echo $_SESSION['name']; ?></a><a href="http://localhost/mobi/index.php/User/logout"><i class="fa fa-power-off"></i></a>
	<?php } else { ?>
	<a href="#" data-target="#login_model" data-toggle="modal">Login / Sign-Up</a>
	<?php } ?>	
	<!-- <a href="#">Guest</a><a href="#">Costumer</a> --><a href="#">Help</a>
	</div>
</div>
<!--==MAIN HEADER==-->
	<div id="main-header">
		<!--logo-->
	<div id="logo">
		<span id="ist">MoBee<hr><!-- <img src="https://i.pinimg.com/originals/90/73/a2/9073a24cd03cfe6f541cacff718daedd.jpg"> --></span>
	</div>
	<!--==search area==-->
<!-- 	<div id="search">
		<form action="">
			<input class="search-area" type="text" name="text" placeholder="search here">
			<input class="search-btn" type="submit" name="submit" value="SEARCH">
		</form>
	</div> -->
<!--==user menu==-->
<!-- 	<div id="user-menu">
	<li><a href="#">Cart</a></li>
	<li></li>+
	</div> -->
</div>
</div>
</div>
<div id="login_model" class="modal fade" role="dialog">
	<div class="modal-dialog" style="width: 400px;">
		<div class="modal-content">
			<div class="modal-header">
				<span style="float: right; cursor: pointer; color: red;" data-dismiss="modal">X</span>
			</div>
			<div class="modal-body">
				<center>
					<ul class="nav nav-pills">
						<li class="active"><a href="#login_pane" data-toggle="tab">Login</a></li>
						<li><a href="#sign_up_pane" data-toggle="tab">Sign Up</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="login_pane" class="modal_content">
							<form method="post" action="http://localhost/mobi/index.php/User/login">
								<input type="email" name="email" class="form-control" placeholder="Enter Email">
								<input type="password" name="pass" class="form-control" placeholder="Enter Password">
								<input type="submit" name="login" value="Login">
							</form>
						</div>
						<div class="tab-pane" id="sign_up_pane" class="modal_content">
							<form method="post" action="http://localhost/mobi/index.php/User/sign_up">
								<input type="text" name="name" class="form-control" placeholder="Enter Name">
								<input type="text" name="phone" class="form-control" placeholder="Enter Phone" onkeypress="return event.charCode>=48 && event.charCode<=57" max-length="10">
								<input type="email" name="email" class="form-control" placeholder="Enter Email">
								<input type="password" name="pass" class="form-control" placeholder="Enter Password">
								<input type="submit" name="sign_up" value="Sign Up">
							</form>							
						</div>
					</div>
				</center>
			</div>
		</div>
	</div>
</div>