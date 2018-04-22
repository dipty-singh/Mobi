<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <title>MobiWorld</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  width: 30%;
/*  -ms-flex: 25%;  IE10 
  flex: 25%;*/
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}
select{
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}
input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>
  <center>
<h2>Checkout Form</h2>
  <div class="col-75">
    <div class="container">      
        <div class="row">
          <div class="col-md-4">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="type">Type of Card</label>
            <select id="ctype" name="cardtype">
              <option>Debit Card</option>
              <option>Credit Card</option>
              <option>Net Banking</option>
            </select>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" onkeypress="return event.charCode>=65 && event.charCode<=122" placeholder="cardname">
            <label for="ccnum">card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="cardnumber" maxlength="16" onkeypress="return event.charCode>=48 && event.charCode<=57">
            <label for="expmonth">Exp Month</label>
            <select id="expmonth" name="expmonth">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
              <option>7</option>
              <option>8</option>
              <option>9</option>
              <option>10</option>
              <option>11</option>
              <option>12</option>
            </select>
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <select id="expyear" name="expyear">
                  <option>2018</option>
                  <option>2019</option>
                  <option>2020</option>
                  <option>2021</option>
                  <option>2022</option>
                  <option>2023</option>
                  <option>2024</option>
                  <option>2025</option>
                  <option>2026</option>
                  <option>2027</option>
                  <option>2028</option>
                  <option>2029</option>
                  <option>2030</option>
                </select>
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="cvv" maxlength="3" onkeypress="return event.charCode>=48 && event.charCode<=57">
                <input type="hidden" name="id" id="book_id" value="<?=($book);?>">
              </div>
            </div>
          </div>
          
        </div>
        <input id="sub" type="submit" value="Continue to checkout" class="btn">
    </div>
  </div>
</center>
<script type="text/javascript">

    $(document).ready(function(){

    $('#sub').click(function(){
      var card_type = $('#ctype').val();
      var card_name = $('#cname').val();
      var card_numb = $('#ccnum').val();
      var card_exp_month = $('#expmonth').val();
      var card_exp_year = $('#expyear').val();
      var card_cvv = $('#cvv').val();
      var book_id = $('#book_id').val();
      if (card_name == '' || card_numb == '' || card_cvv == '') {
        sweetAlert('Enter all details');
      }
      else{
        $.ajax({
          type: "POST",
          dataType: 'json',
          url: "http://localhost/mobi/index.php/User/pay_now",
          data: 'card_type='+card_type+'&card_name='+card_name+'&card_num='+card_numb+'&card_month='+card_exp_month+'&card_year='+card_exp_year+'&card_cvv='+card_cvv+'&book_id='+book_id,
          success:function(response){
            console.log(response);
            if (response.success) {
              sweetAlert(response.msg);
              setTimeout(function() { 
                window.location.href = "http://localhost/mobi/index.php/User";
              }, 2000); 
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
