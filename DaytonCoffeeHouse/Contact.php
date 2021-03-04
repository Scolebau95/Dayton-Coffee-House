<?php
    include('functions/functions.php');
    require('opendb.php');
?>
<!DOCTYPE html>
<html lang="en"> 
  <head>
      <title> Contact Us </title>
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
        <h2>Hours of Operation</h2>
        <?php echo "Monday: 7AM - 7PM<br>"?>
        <?php echo "Tuesday: 7AM - 7PM<br>"?>
        <?php echo "Wednesday: 7AM - 7PM<br>"?>
        <?php echo "Thursday: 7AM - 7PM<br>"?>
        <?php echo "Friday: 7AM - 7PM<br>"?>
        <?php echo "Saturday: 8AM - 7PM<br>"?>
        <?php echo "Sunday: Closed<br>"?>
        <h2>Locations</h2>
        <?php
        $locations = get_location($db);  //Grabbing all locations from the locations table
         foreach ($locations as $location){  //Looping through each item
            $locationName = $location['locationID'];   //Grabbing the item name
            $locationImage = $location['image'];
            $imageFileName = "images/".$locationImage;
         }
         echo "<img src=" . $imageFileName. " height = '300' width = '575'><br>"; //Displaying the image
        ?>
        <h2>Contact Information</h2>
        <?php echo "Phone: 937-952-9454<br>"?>
        <?php echo "Email: daytoncoffeehouse@gmail.com"?>
    </main>     
    <footer> </footer>   
  </body>
</html>

