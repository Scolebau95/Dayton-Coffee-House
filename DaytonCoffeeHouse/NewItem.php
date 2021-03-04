<?php
    include('functions/functions.php');
    require('opendb.php');
    $Name = "";
    $Filename = "";
    $Price = "";
    $Description = "";
    if(isset($_POST['add'])){  //If the Add To Inventory button is selected
       add_to_inventory($db, $_POST['itemName'], $_POST['itemFile'], $_POST['itemPrice'], $_POST['itemDescription'], '10');
    }
?>
<!DOCTYPE html>
<html lang="en"> 
  <head>
      <title>Add New Items!</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="images/DCH.ico">
      <link rel="stylesheet" href="css/normalize.css">
      <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
      <header>
          <a href="index.php"><img src="images/Home.jpg" alt="home_button" id="home"></a><br>
          <a href="Admin.php"><img src="images/GoBack.png" alt="back_button" id="goback"></a>       
      </header>     
    <main>
        <form action="" method="post">
        <label for="newItemName">Item Name</label>    <!--Label for item-->
        <input type="text" name="itemName" id="newItemName" value='<?php echo "$Name";?>'><br>
        <label for="newFile">Filename</label>    <!--Label for item-->
        <input type="text" name="itemFile" id="newFile" value='<?php echo "$Filename";?>'><br>
        <label for="newItemPrice">Price</label>    <!--Label for item-->
        <input type="text" name="itemPrice" id="newItemPrice" value='<?php echo "$Price";?>'><br>
        <label for="newItemDesc">Description</label>    <!--Label for item-->
        <input type="text" name="itemDescription" id="newItemDesc" value='<?php echo "$Description";?>'><br>
        <input type="submit" name="add" value="Add To Inventory" /><br>
        </form>
    </main>     
    <footer> </footer>   
  </body>
</html>