<?php
    include('functions/functions.php');
    require('opendb.php');
    $total = 0;
?>
<!DOCTYPE html>
<html lang="en"> 
  <head>
      <title>Order Confirmation</title>
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
         $shipInfo = get_shipping_address_information($db, 'user1');    //Getting the user shipping address information
         foreach ($shipInfo as $item){ //Looping through each item
            $shipAddress = $item['shippingAddress'];  //Grabbing the shipping address
            $shipCity = $item['city'];    //Grabbing the shipping city
            $state = $item['location'];   //Grabbing the shipping state
            $zipcode = $item['zipcode'];  //Grabbing the shipping zipcode
         }
         echo 'You purchased the following items:<br><br>';        
         $cart = get_cart($db, 'user1');  //Getting what the user added to the cart
         echo '<table>';
         foreach ($cart as $item){  //Looping through each item
            echo '<tr>';
            echo '<td>' . $item['onlineItem'] . ' (' . $item['quantity'] . ')' . '</td>'; //Displaying each item
            $total += ($item['quantity'] * $item['price']); //Keeping a running total for the users cost
            echo '</tr>';
            //insert_into_orders($db, 'user1', $item['onlineItem'], $item['quantity'], '2020-04-10');
            }  
         echo '</table><br><br>';
         echo 'Your order total is $' . $total . ' and it is being sent to the following address:<br><br>';
         echo "$shipAddress" . ', ' . "$shipCity" . ', ' . "$state " . "$zipcode<br><br>";
         echo 'Thank you for your purchase and we look forward to your future business!';
         clear_cart_user($db, 'user1');   //Clearing the cart once the sale has concluded
         ?>
      </main>     
    <footer> </footer>   
  </body>
</html>

