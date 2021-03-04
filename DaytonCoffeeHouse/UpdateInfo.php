<?php
    include('functions/functions.php');
    require('opendb.php');
    if(isset($_POST['update'])){
       update_customer($db, 'user1', $_POST['first'], $_POST['last'], $_POST['email'], $_POST['address'], $_POST['city'], $_POST['state'], $_POST['zip'], $_POST['phone']);
    }
?>
<!DOCTYPE html>
<html lang="en"> 
  <head>
      <title> Update Information </title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="images/DCH.ico">
      <link rel="stylesheet" href="css/normalize.css">
      <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
      <header>
         <a href="index.php"><img src="images/Home.jpg" alt="home_button" id="home"></a>
      </header>     
    <main>
         <?php
            $customerInfo = get_customer_info($db, 'user1');    //Getting the user shipping address information
            foreach ($customerInfo as $item){ //Looping through each item
               $firstname = $item['firstName'];
               $lastname = $item['lastName'];
               $email = $item['email'];
               $shipaddress = $item['shippingAddress'];  
               $city = $item['city'];    
               $state = $item['location'];   
               $zipcode = $item['zipcode'];  
               $phone = $item['phone'];
            }
         echo "<h2>Please provide the following information:</h2>";
         ?>
        <form action="" method="post">
        <label for="firstName">First Name</label>
        <input type="text" name="first" id="firstName" value='<?php echo "$firstname";?>'><br>
        <label for="lastName">Last Name</label>
        <input type="text" name="last" id="lastName" value='<?php echo "$lastname";?>'><br>
        <label for="email">Email</label>
        <input type="text" name="email" id="email" value='<?php echo "$email";?>'><br>
        <label for="shipAddress">Address</label>
        <input type="text" name="address" id="shipAddress" value='<?php echo "$shipaddress";?>'><br>
        <label for="city">City</label>
        <input type="text" name="city" id="city" value='<?php echo "$city";?>'><br>
        <label for="state">State</label>
        <input type="text" name="state" id="state" value='<?php echo "$state";?>'><br>
        <label for="zip">Zipcode</label>
        <input type="text" name="zip" id="zip" value='<?php echo "$zipcode";?>'><br>
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone" value='<?php echo "$phone";?>'><br>
        <input type="submit" name="update" value="Update Information" />
        </form>
        <form action="Confirm.php" method="post">
        <input type="submit" name="confirm" value="Confirm Order" />            
        </form>
    </main>     
    <footer> </footer>   
  </body>
</html>

