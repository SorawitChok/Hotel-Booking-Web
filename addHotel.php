<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styleform.css">
    <title>Add Hotel</title>
</head>
<body>
    <h2 style="font-weight: 400;">Add Hotel</h2>      
    <div class="row">
        <div class="col-50">
            <div class="container">
                <form action="addHotelProcess.php" method="post">
                    <div class="row">
                        <div class="col-50" style="font-weight: 200;">
                          <h3 style="font-weight: 200;">Hotel Information</h3>
                          <label for="hname">Hotel Name</label>
                          <input type="text" name="hname" placeholder="Hotel Name">
                          <div class="row">
                              <div class="col-50">
                                  <label for="hstar">Hotel Star</label>
                                  <input type="text" name="hstar" placeholder="5">
                              </div>
                            <div class="col-50">
                              <label for="htel">Telephone</label>
                              <input type="text" name="htel" placeholder="xx-xxx-xxxx">
                            </div>
                          </div>
                          <label for="hcountry">Country</label>
                          <input type="text" name="hcountry" placeholder="Country">
                          <label for="hprov">Province</label>
                          <input type="text" name="hprov" placeholder="Province">
                          <label for="hdist">District</label>
                          <input type="text" name="hdist" placeholder="District">
                          <label for="hstreet">Street</label>
                          <input type="text" name="hstreet" placeholder="Street">
                          <div class="row">
                            <div class="col-50">
                                <label for="hpropnum">Property Number</label>
                                <input type="text" name="hpropnum" placeholder="xxxxx">
                            </div>
                          <div class="col-50">
                            <label for="hpostcode">Post Code</label>
                            <input type="text" name="hpostcode" placeholder="xxxxx">
                          </div>
                        </div>
                        </div>
                      </div>
                      <input name="sub" type="submit" value="Next &#8250;&#8250;" class="btn">
                </form>
            </div>
        </div>
    </div>  
</body>
</html>