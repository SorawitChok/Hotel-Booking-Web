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

<h2 style="font-weight: 400;">Payment</h2>
<div class="row">
  <div class="col-50">
    <div class="container">
      <form action="paymentProcess.php" method='post'>
      
        <div class="row">

          <div class="col-50" style="font-weight: 200;">
            <h3 style="font-weight: 200;">Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <?php
            if(isset($_POST['sub']))
            {
              $price = $_POST['price'];
              $bid = $_POST['bid'];
              $cardno = $_POST['cardnum'];
              $q = 'select * from UserCreditCard where CardNo = "'.$cardno.'" limit 1;';
              $result = $mysqli->query($q);
              $row = $result->fetch_array();
              $q0 = 'select * from bookingandaccom where BookingID ="'.$bid.'";';
              $result0 = $mysqli->query($q0);
              $row0 = $result0->fetch_array();
              $indate = date_create($row0['CheckInDate']);
              $outdate = date_create($row0['CheckOutDate']);
              $tmp = date_diff($outdate,$indate);
              $totaldate = $tmp->format('%a');
              $tax = $price * 0.07;
              $sub = $price * $totaldate;
              $ser = $sub * 0.1;
              $totalp = $sub + $ser + $tax;
              echo '<input type="text" name="cardname" placeholder="Name" value="'.$row['OwnerName'].'" disabled>';
              echo '<label for="ccnum">Credit card number</label>';
              echo '<input type="hidden" name="cardname" placeholder="Name" value="'.$row['OwnerName'].'">';
              echo '<input type="text" name="cardnumber" placeholder="XXXX-XXXX-XXXX-XXXX"  value="'.$row['CardNo'].'" disabled>';
              echo '<input type="hidden" name="cardnumber" placeholder="XXXX-XXXX-XXXX-XXXX"  value="'.$row['CardNo'].'">';
              echo '<div class="row">';
              echo '<div class="col-50">';
              echo '<label for="expyear">Exp Month</label>';
              echo '<input type="text" name="expmonth" placeholder="XX" value="'.$row['ExpMonth'].'" disabled>';
              echo '<input type="hidden" name="expmonth" placeholder="XX" value="'.$row['ExpMonth'].'" >';
              echo '</div>';
              echo '<div class="col-50">';
              echo '<label for="expyear">Exp Year</label>';
              echo '<input type="text" name="expyear" placeholder="XX"  value="'.$row['ExpYear'].'" disabled>';
              echo '<input type="hidden" name="expyear" placeholder="XX"  value="'.$row['ExpYear'].'">';
              echo '</div>';
              echo '</div>';
              echo '<label for="cvv">CVV</label>';
              echo '<input type="text" name="CVV" placeholder="XXX">';
              echo '<hr>';
              echo '<h3 style="font-weight: 200;">Price summary</h3>';
              echo '<label>Sub-Total Price : '.number_format($sub).'</label>';
              echo '<label>Tax : '.number_format($tax).'</label>';
              echo '<label>Service Fee : '.number_format($ser).'</label>';
              echo '<label>Total Price : '.number_format($totalp).'</label>';
              echo '<input type="hidden" name="price" value="'.$price.'">';
              echo '<input type="hidden" name="bid" value="'.$bid.'">';
            }
            elseif(isset($_POST['sub2']))
            {
              $price = $_POST['price'];
              $bid = $_POST['bid'];
              $cardno = $_POST['cardnum'];
              $q0 = 'select * from bookingandaccom where BookingID ="'.$bid.'";';
              $result0 = $mysqli->query($q0);
              $row0 = $result0->fetch_array();
              $indate = date_create($row0['CheckInDate']);
              $outdate = date_create($row0['CheckOutDate']);
              $tmp = date_diff($outdate,$indate);
              $totaldate = $tmp->format('%a');
              $tax = $price * 0.07;
              $sub = $price * $totaldate;
              $ser = $sub * 0.1;
              $totalp = $sub + $ser + $tax;
              echo '<input type="text" name="cardname" placeholder="Name" value="'.$_POST['cardname'].'" disabled>';
              echo '<label for="ccnum">Credit card number</label>';
              echo '<input type="hidden" name="cardname" placeholder="Name" value="'.$_POST['cardname'].'">';
              echo '<input type="text" name="cardnumber" placeholder="XXXX-XXXX-XXXX-XXXX"  value="'.$_POST['cardnum'].'" disabled>';
              echo '<input type="hidden" name="cardnumber" placeholder="XXXX-XXXX-XXXX-XXXX"  value="'.$_POST['cardnum'].'">';
              echo '<div class="row">';
              echo '<div class="col-50">';
              echo '<label for="expyear">Exp Month</label>';
              echo '<input type="text" name="expmonth" placeholder="XX" value="'.$_POST['expmonth'].'" disabled>';
              echo '<input type="hidden" name="expmonth" placeholder="XX" value="'.$_POST['expmonth'].'" >';
              echo '</div>';
              echo '<div class="col-50">';
              echo '<label for="expyear">Exp Year</label>';
              echo '<input type="text" name="expyear" placeholder="XX"  value="'.$_POST['expyear'].'" disabled>';
              echo '<input type="hidden" name="expyear" placeholder="XX"  value="'.$_POST['expyear'].'">';
              echo '</div>';
              echo '</div>';
              echo '<hr>';
              echo '<h3 style="font-weight: 200;">Price summary</h3>';
              echo '<label>Sub-Total Price : '.number_format($sub).'</label>';
              echo '<label>Tax : '.number_format($tax).'</label>';
              echo '<label>Service Fee : '.number_format($ser).'</label>';
              echo '<label>Total Price : '.number_format($totalp).'</label>';
              echo '<input type="hidden" name="price" value="'.$price.'">';
              echo '<input type="hidden" name="bid" value="'.$bid.'">';
            }
          ?>
          </div>
        </div>
        <input type="submit" name='sub' value="Confirm" class="btn">
        <?php
          if(isset($_GET['state']))
          {
            if($_GET['state']==0)
            {
              echo '<p style="color:red;">Wrong card information. Please try again</p>';
            }
          }
        ?>
      </form>
    </div>
  </div>
</div>

</body>
</html>
