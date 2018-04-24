<html>
<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <link href="../../css/style.css" rel="stylesheet">
  <title>MobiWorld</title>
</head>
<body>
  <?php include('header.php');
    $total_amt = 0;
    $prod_id='';
   ?>
    <div class="container">
      <div style="margin-top: 100px;" class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
        <?php if(!empty($cart)){
        foreach($cart as $key) {
        $total_amt = $total_amt + $key->price;
        if($prod_id = '')
        {
          $prod_id = $key->id;
        }
        else{
          $prod_id = $prod_id+','+$key->id;
        }
         ?>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="bord row">
              <p style="color: red; float: right; padding: 20px; cursor: pointer;" onclick="remove_cart(<?=($key->cart_id)?>)">X</p>
              <img class="img_home_prod col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4" src="<?=($key->product_img);?>">
              <div style="padding-top: 30px;" class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <center><span><b>Product Name:</b> <?=($key->product_name);?></span>
                <span><b>Amount: </b> Rs. <?=($key->price);?></span></center>
              </div>
            </div>
          </div>
        <?php }
        $gst = $total_amt/100*5;
         ?>
      </div>
      <div style="margin-top: 100px;" class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
        <div class="bord">
          <h1>Details</h1>
          <input type="hidden" id="cart_id" value="<?=($key->cart_id)?>">
          <input type="hidden" name="id" id="prod_id" value="<?=($prod_id);?>">
          <table style="width: 100%;" class="table-responsive">
            <tr style="height: 30px;">
              <td><b>Total Sub Price</b></td>
              <td>Rs. <span id="total_amt"><?php echo $total_amt; ?></span></td>
            </tr>
            <tr style="height: 30px;border-bottom: 1px solid black;">
              <td><b>GST</b></td>
              <td>Rs. <span id="total_amt"><?php echo $gst; ?></span></td>
            </tr>
            <tr style="height: 30px;">
              <td><b>Total Price</b></td>
              <td>Rs. <span id="total_amt"><?php echo $total_amt+$gst; ?></span></td>
            </tr>
          </table>
          <textarea id="address_cart" cols="50" rows="6" class="form-control" placeholder="Enter Address"></textarea>
          <center><input id="booking" type="button" class="btn btn-info" name="" value="Buy Now"></center>
        </div>
      </div>
    </div>
      <?php } else{ ?>
        <div class="row" style="margin-top: 100px;">
          <div class="bord col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <center><h2>No Item in Cart</h2></center>
          </div>
        </div>
      <?php } ?>
<script type="text/javascript">

      function remove_cart(id){
      var prod_id = id;
        $.ajax({
          type: "POST",
          dataType: 'json',
          url: "http://localhost/mobi/index.php/User/remove_cart",
          data: 'prod_id='+prod_id,
          success:function(response){
            console.log(response);
            if (response.success) {
              location.reload(true);
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


    $(document).ready(function(){

    $('#booking').click(function(){
      var prod_id = $('#prod_id').val();
      var address = $('#address_cart').val();
      console.log(prod_id);
      console.log("address "+address);
      if (address == '') {
        sweetAlert('Enter Address');
      }
      else{
        $.ajax({
          type: "POST",
          dataType: 'json',
          url: "http://localhost/mobi/index.php/User/booking_cart",
          data: 'prod_id='+prod_id+'&address='+address,
          success:function(response){
            console.log(response);
            if (response.success) {
              window.location.href = "http://localhost/mobi/index.php/User/pay/"+response.id;
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
  </body>
</html>
