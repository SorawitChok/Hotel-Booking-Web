<?php
      require_once('connect.php');
      session_start();
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

<h2 style="font-weight: 400;">Payment Method</h2>
<div class="row">
  <div class="col-50">
    <div class="container">
     
      
        <div class="row">

          <div class="col-50" style="font-weight: 200;">
            <h3 style="font-weight: 200;">Payment Method</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <form action="payment.php" method="post">
                <label for="newcard">Use new credit card</label>
                <input type="text" id="cname" name="cardname" placeholder="Name">
                <label for="ccnum">Credit card number</label>
                <input type="text" id="ccnum" name="cardnum" placeholder="XXXX-XXXX-XXXX-XXXX">
                <div class="row">
                    <div class="col-50">
                        <label for="expyear">Exp Month</label>
                        <input type="text" id="expmonth" name="expmonth" placeholder="XX">
                    </div>
                    <div class="col-50">
                        <label for="expyear">Exp Year</label>
                        <input type="text" id="expyear" name="expyear" placeholder="XX">
                    </div>
                </div>
                <label for="cvv">CVV</label>
                <input type="text" id="CVV" name="CVV" placeholder="XXX">
                <input type="submit" value="Confirm" name="sub2" class="btn">
                <?php
                  echo '<input type="hidden" name="price" value="'.$_GET['price'].'">';
                  echo '<input type="hidden" name="bid" value="'.$_GET['bid'].'">';
                ?>
            </form>
            <br>
            <hr>
            <br>
            <form action="payment.php" method="post">
                <label for="existingcard">Use existing credit card</label>
                
                    <?php
                        $price = $_GET['price'];
                        $bid = $_GET['bid'];
                        $q = "select CardNo from usercreditcard where UID = ".$_SESSION['UID'].";";
                        $result = $mysqli->query($q);
                        $count = $result->num_rows;
                        if($count==0)
                        {
                            echo '<h2>You do not have any credit card registered!</h2>';
                        }
                        else
                        {
                            echo '<select name="cardnum">';
                            while($row = $result->fetch_array())
                            {
                                echo '<option value="'.$row['CardNo'].'">'.$row['CardNo'].'</option>';
                            }
                            echo '</select>';
                        }
                       echo '<input type="hidden" name="price" value="'.$price.'">';
                       echo '<input type="hidden" name="bid" value="'.$bid.'">';
                    ?>
                    <input class="btn" value="Confirm" type="submit" name="sub">
            </form>
          </div>
        </div>
    </div>
  </div>
</div>

</body>
</html>
