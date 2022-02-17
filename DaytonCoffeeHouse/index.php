<?php
    include('functions/functions.php');
    require('opendb.php');
?>

<!DOCTYPE html>
<html lang="en"> 
  <head>
      <title> Home | Dayton Coffee House </title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="images/DCH.ico">
      <link rel="stylesheet" href="css/normalize.css">
      <link rel="stylesheet" href="css/homepage.css">
  </head>
  <body>
      <header>
         <h1>Dayton Coffee House</h1>
	        <ul>
            <li><a href="Contact.php" target="nav">Contact</a></li>
            <li><a href="HouseItems.php" target="nav">Menu</a></li>
            <li><a href="OrderOnline.php" target="nav">Order Online</a></li>
            <li><a href="Admin.php" target="nav">Admin</a></li>
         </ul>		 
      </header>     
      <main>
         <img src="images/MainPicture.jpg" alt="homepagePic" id="homepagePic">
         <hr>
      </main>     
    <footer>Come check out our new store and selections! Dayton Coffee House has opened its first location at 5870 Smiths Avenue. 
            Please join us at a Grand Opening May 1st, 2020 at 9:00 am and enjoy a 40% discount with an enclosed coupon.
    </footer>   
  </body>
</html>