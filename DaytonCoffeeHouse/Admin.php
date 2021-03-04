<?php
    include('functions/functions.php');
    require('opendb.php');
    if(isset($_POST['remove'])){  //If the remove button is selected
       remove_from_online_items($db, $_POST['onlineItem']); //Remove the item on the Online Items page
    }
    if(isset($_POST['add'])){    //If the add button is selected
       add_to_online_items($db, $_POST['onlineItem'], $_POST['image'], $_POST['price'], $_POST['description'], '10');   //Add the item to the Online Items page
    }
?>
<!DOCTYPE html>
<html lang="en"> 
  <head>
      <title>Admin Services</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="images/favicon.ico">
      <link rel="stylesheet" href="css/normalize.css">
      <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
      <header>
          <a href="index.php"><img src="images/Home.jpg" alt="home_button" id="home"></a>
      </header>     
      <main id="flexcontainer">
         <?php
         $items = adminitem_info($db);   //Grabbing all items from the administrative table
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
         <!--I need to use hidden fields in order for the PHP functions at the top to work.
         If I don't specify the item name, image, price, and description below, then it will
         give an undefined index error because the $_POST portions will be empty. But by
         including the hidden fields below, it essentially fills them with the appropriate info.-->
         <form action="" method="post">
         <input type="hidden" name="onlineItem" value="<?php echo $itemName;?>">
         <input type="submit" name="add" value="Add" />
         <input type="hidden" name="image" value="<?php echo $itemImage;?>">  
         <input type="hidden" name="price" value="<?php echo $itemPrice;?>">  
         <input type="hidden" name="description" value="<?php echo $itemDesc;?>">
         <input type="submit" name="remove" value="Remove" />
         </figure>
         </form>
         <?php } ?>
         <form action="NewItem.php" method="post">
         <input type="submit" name = "newItem" value="Add New Item" />
         </form>
      </main>     
      <footer> </footer>   
  </body>
</html>