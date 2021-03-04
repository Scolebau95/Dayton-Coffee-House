<?php
    include('functions/functions.php');
    require('opendb.php');
    if(isset($_POST['purchase'])){  //If the Add To Cart button is selected
          insert_into_cart($db, 'user1', $_POST['onlineItem'], '1'); //Insert the item into the cart
    }
?>
<!DOCTYPE html>
<html lang="en"> 
  <head>
      <title> Order Online </title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="images/DCH.ico">
      <link rel="stylesheet" href="css/normalize.css">
      <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
      <header>
          <a href="index.php"><img src="images/Home.jpg" alt="home_button" id="home"></a>
          <a href="Cart.php"><img src="images/Cart.png" alt="cart_button" id="cart"></a>
      </header>     
      <main id="flexcontainer">
         <?php
         $items = onlineitem_info($db);  //Grabbing all items from the onlineitems table
         foreach ($items as $itemInfo){  //Looping through each item
            $itemName = $itemInfo['onlineItem'];   //Grabbing the item name
            $itemImage = $itemInfo['image'];   //Grabbing the item image
            $imageName = "images/".$itemImage;   //Grabbing the actual image file using the image name from the images folder
            $itemPrice = $itemInfo['price']; //Grabbing the item price
            $itemDesc = $itemInfo['description'];   //Grabing the item description
            echo '<figure>';
            echo "$itemName<br>";   //Displaying the name
            echo "<img src=" . $imageName. " height = '150' width = '200'><br>"; //Displaying the image
            echo "$itemPrice<br>"; //Displaying the price
            echo "$itemDesc<br>"; //Displaying the description
         ?>
         <!--I need to use hidden field in order for the PHP function at the top to work.
         If I don't specify the item name then it will give an undefined index error because 
         the $_POST portion will be empty. But by including the hidden fields below, it 
         essentially fills it with the appropriate info.-->
         <form action="" method="post">
         <input type="hidden" name="onlineItem" value="<?php echo $itemName;?>">
         <input type="submit" name="purchase" value="Add To Cart" /><br>
         </figure>
         </form>
         <?php } ?>
      </main>     
      <footer> </footer>   
  </body>
</html>