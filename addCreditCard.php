<?php 
    require_once('connect.php'); 
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="styleform.css">
</head>
<body>

<h2 style="font-weight: 400;">Add my Credit Card</h2>
<div class="row">
  <div class="col-50">
    <div class="container">
      <form action="addCreditCardProcess.php" method="post">
      
        <div class="row">

          <div class="col-50" style="font-weight: 200;">
            <h3 style="font-weight: 200;">Credit Card Information</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" name="cardname" placeholder="Name">
            <label for="ccnum">Credit card number</label>
            <input type="text" name="cardnumber" placeholder="XXXX-XXXX-XXXX-XXXX">
            <div class="row">
                <div class="col-50">
                    <label for="expyear">Exp Month</label>
                    <input type="text" name="expmonth" placeholder="XX">
                </div>
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" name="expyear" placeholder="XX">
              </div>
            </div>
          </div>
        </div>
        <input type="submit" value="Add Credit Card" class="btn" name="sub">
      </form>
    </div>
  </div>
</div>

</body>
</html>
