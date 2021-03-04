<?php
    include('functions/functions.php');
    require('opendb.php');
    if (isset($_POST['clear'])){ //If the clear button is selected it will clear the cart
       clear_cart_user($db, 'user1');
    }
    if (isset($_POST['update'])){   //If the update button is selected it will update the item quantity
          update_cart_quantity($db, $_POST['item'], $_POST['quantity']);
    }
?>
<!DOCTYPE html>
<html lang="en"> 
  <head>
      <title>Cart</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="images/DCH.ico">
      <link rel="stylesheet" href="css/normalize.css">
      <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
      <header>
          <a href="index.php"><img src="images/Home.jpg" alt="home_button" id="home"></a><br>
          <a href="OrderOnline.php"><img src="images/GoBack.png" alt="back_button" id="goback"></a>
      </header>     
      <main>
        <form action="" method="post">
        <input type="submit" name = "clear" value="Clear Cart" />
        </form>
        <form action="UpdateInfo.php" method="post">
        <input type="submit" name = "confirm" value="Checkout" />
        </form>
        <?php
        $cart = get_cart($db, 'user1');   //Getting everything inside of the cart
        echo '<table>';
        foreach ($cart as $item){   //Looping through the items
            $itemName = $item['onlineItem'];  //Grabbing the item name
            echo '<tr>';
            echo '<td>' . $item['onlineItem'] . '</td>';
            echo '<td>';
            $quantity = $item['quantity'];    //Grabbing the item quantity
        ?>
        <form action="" method="post">
        <input type="text" name="quantity" value="<?php echo $quantity;?>">   
        <?php
            echo '</td>';
            echo '<td>' . $item['price'] . '</td>';
            echo '<td>';
        ?>
        <input type="hidden" name="item" value="<?php echo $itemName;?>">
        <?php
            echo '<input type="submit" name = "update" value="Update Quantity" />';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
        ?>
      </main>     
      <footer> </footer>   
  </body>
</html>