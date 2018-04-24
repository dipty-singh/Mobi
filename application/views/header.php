<script>
// When the user scrolls down 20px from the top of the document, show the button
$(window).scroll(function() {
    if ($(this).scrollTop() > 50 ) {
        $('.scrolltop:hidden').stop(true, true).fadeIn();
    } else {
        $('.scrolltop').stop(true, true).fadeOut();
    }
});

$(function(){$(".scroll").click(function(){$("html,body").animate({scrollTop:$(".thetop").offset().top},"1000");return false})});

	$(document).ready(function(){


	$('#login_but').click(function(){
		var email = $('#login_email').val();
		var pass = $('#login_pass').val();
		console.log(email+" & "+pass);
		if (email=='') {
			sweetAlert('Please Enter Email');
		}
		else if(pass == '') {
			sweetAlert('Please Enter Password');
		}
		else{
			$.ajax({
				type: "POST",
	 			dataType: 'json',
	 			url: "http://localhost/mobi/index.php/User/login",
	 			data: 'email='+email+'&pass='+pass,
	 			success:function(response){
	 				console.log(response);
	 				if (response.success) {
	 					window.location.reload();
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
		}
	});

	$('#sign_but').click(function(){
		if ($('#sign_last').val()=='') {
			var name = $('#sign_name').val();
		}
		else{
			var name = $('#sign_name').val()+' '+$('#sign_last').val();
		}
		var phone = $('#sign_phone').val();
		var email = $('#sign_email').val();
		var pass = $('#sign_pass').val();
		var confirm = $('#confirm_pass').val();
		console.log(name+" & "+phone+" & "+email+" & "+pass+" & "+confirm);
		if ($('#sign_name').val() == '') {
			sweetAlert('Please Enter Name');
		}
		else if (phone == '') {
			sweetAlert('Please Enter Phone Number');
		}
		else if (email=='') {
			sweetAlert('Please Enter Email');
		}
		else if(pass == '') {
			sweetAlert('Please Enter Password');
		}
		else if (phone.length<10) {
			sweetAlert('Incorrect Phone Number')
		}
		else if (pass != confirm) {
			sweetAlert('Password not matched');
		}
		else{
			$.ajax({
				type: "POST",
	 			dataType: 'json',
	 			url: "http://localhost/mobi/index.php/User/sign_up",
	 			data: 'email='+email+'&pass='+pass+'&name='+name+'&phone='+phone,
	 			success:function(response){
	 				console.log(response);
	 				if (response.success) {
	 					window.location.reload();
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
		}
	});

});
</script>
<!-- <div id="subheader">
<div class="container_head">
 -->
<div class="thetop"></div>
<div class="wrapper wr">
<nav id="subheader" class="navbar navbar-default">
    <div class="navbar-header">
      <a style="margin-top: 15px;" class="" href="http://localhost/mobi/index.php/User">MoBiWoRlD</a>
    </div>
    <ul class="nav navbar-nav" style="margin-left: 20px; border-left: 1px solid white;">
      <li class=""><a href="http://localhost/mobi/index.php/User">Home</a></li>
      <li class=""><a href="http://localhost/mobi/index.php/User/product/1">Products</a></li>
    </ul>
	
		<?php if (isset($_SESSION['name'])) { ?>
    <a style="margin-top: 15px;" href="http://localhost/mobi/index.php/User/cart" id="cart_icon">
    	<p class="glyphicon glyphicon-shopping-cart"></p>
    </a>
  <div class="dropdown" style="margin-top: 15px; float: right;">
    <p class="dropdown-toggle" id="menu1" style="cursor: pointer; color: white;" data-toggle="dropdown"><?php echo $_SESSION['name']; ?></p>
    <ul style="min-width: 110px; width: 110px;" class="dropdown-menu" role="menu" aria-labelledby="menu1">
		<li role="presentation"><a style="color: black;" href="http://localhost/mobi/index.php/User/logout"><i class="fa fa-power-off"> Logout</i></a></li>
    </ul>
  </div>
	<?php } else { ?>
	<a style="margin-top: 15px;" href="#" data-target="#login_model" data-toggle="modal">Login / Sign-Up</a>
	<?php } ?>

</nav>
</div>

<!-- 	</div>
</div> -->
<div class='scrolltop'>
    <div class='scroll icon'><i class="fa fa-4x fa-angle-up"></i></div>
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
							<!-- <form method="post" name="login_form" action=""> -->
								<input type="email" id="login_email" name="email" class="form-control" placeholder="Enter Email">
								<input type="password" id="login_pass" name="pass" class="form-control" placeholder="Enter Password">
								<input type="submit" id="login_but" name="login" value="Login">
							<!-- </form> -->
						</div>
						<div class="tab-pane" id="sign_up_pane" class="modal_content">
							<!-- <form method="post" action="#"> -->
								<input type="text" id="sign_name" name="name" class="form-control" placeholder="Enter First Name" onkeypress="return event.charCode>=65 && event.charCode<=122">
								<input type="text" id="sign_last" name="name" class="form-control" placeholder="Enter Last Name" onkeypress="return event.charCode>=65 && event.charCode<=122">
								<input type="text" id="sign_phone" maxlength="10" name="phone" class="form-control" placeholder="Enter Phone" onkeypress="return event.charCode>=48 && event.charCode<=57">
								<input type="email" id="sign_email" name="email" class="form-control" placeholder="Enter Email">
								<input type="password" id="sign_pass" name="pass" class="form-control" placeholder="Enter Password">
								<input type="password" id="confirm_pass" name="pass" class="form-control" placeholder="Confirm Password">
								<input type="submit" id="sign_but" name="sign_up" value="Sign Up">

							<!-- </form> -->
						</div>
					</div>
				</center>
			</div>
		</div>
	</div>
</div>