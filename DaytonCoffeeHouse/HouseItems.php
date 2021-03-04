<?php
    include('functions/functions.php');
    require('opendb.php');
?>
<!DOCTYPE html>
<html lang="en"> 
  <head>
      <title>House Items</title>
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
         $items = houseitem_info($db);  //Grabbing all items from the onlineitems table
         foreach ($items as $itemInfo){  //Looping through each item
            $itemName = $itemInfo['houseItem'];   //Grabbing the item name
            $itemPrice = $itemInfo['price'];
            $itemDescription = $itemInfo['description'];
            echo "<h3>$itemName</h3>";
            echo "$$itemPrice<br>";
            echo "$itemDescription.<br>";
         }
         echo "<br><h1>Suggestions</h1>";
         ?>
        <form action="" method="post">
           <label for="first">First Name</label>
           <input type="text" name="first" id="first" value=''>
           <label for="last" id="lastLabel">Last Name</label>
           <input type="text" name="last" id="last" value=''><br>
           <textarea name="special" id="textArea" placeholder="Tell us some of the things you'd like to see!"></textarea><br>
           <input type="submit" name="share" id="suggestion" value="Submit" />
        </form>
    </main>     
    <footer> </footer>   
  </body>
</html>