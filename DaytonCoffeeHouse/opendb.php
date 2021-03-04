<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'daytoncoffeehouse';
    
try {
   $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
   //echo "Connected to $dbname";
} catch (PDOException $e) {
   $error_message = $e->getMessage();
   echo $error_message;
   exit();
}
