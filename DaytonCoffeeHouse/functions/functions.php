<?php

function adminitem_info($db)
{
  $query = 'SELECT onlineItem, image, price, description FROM Administrative;';
  $statement = $db->prepare($query);
  $statement->execute();
  $itemInfo = $statement->fetchAll(PDO::FETCH_ASSOC);
  $statement->closeCursor();
  return $itemInfo;
}

function onlineitem_info($db)
{
  $query = 'SELECT onlineItem, image, price, description FROM OnlineItems;';
  $statement = $db->prepare($query);
  $statement->execute();
  $itemInfo = $statement->fetchAll(PDO::FETCH_ASSOC);
  $statement->closeCursor();
  return $itemInfo;
}

function insert_into_cart($db, $username, $itemName, $quantity)
  {
    $query = "INSERT INTO Cart (userName, onlineItem, quantity)"
            . "VALUES (:user, :item, :quant)";
    $statement = $db->prepare($query);
    $statement->bindValue(':user', $username);
    $statement->bindValue(':item', $itemName);
    $statement->bindValue(':quant', $quantity);
    $statement->execute();
    $statement->closeCursor();
  }

function clear_cart_user($db, $username)
{
   $query = "DELETE FROM Cart WHERE userName = :user";
   $statement = $db->prepare($query);
   $statement->bindValue(':user', $username);
   $statement->execute();
   $statement->closeCursor();
}

function get_cart($db, $username)
{
   $query = "SELECT Cart.onlineItem, Cart.quantity, OnlineItems.price FROM Cart INNER JOIN OnlineItems ON Cart.onlineItem = OnlineItems.onlineItem WHERE userName = :user";
   $statement = $db->prepare($query);
   $statement->bindValue(':user', $username);
   $statement->execute();
   $itemInfo = $statement->fetchAll(PDO::FETCH_ASSOC);
   $statement->closeCursor();
   return $itemInfo;
}

function search_for_item($db, $itemname){
   $query = "SELECT onlineItem FROM Cart WHERE onlineItem = :item";
   $statement = $db->prepare($query);
   $statement->bindValue(':item', $itemname);
   $statement->execute();
   $result = $statement->fetch();
   $statement->closeCursor();
   return $result;
}

function update_cart_quantity($db, $itemname, $quantity)
{
    $query = "UPDATE Cart SET quantity = :quantity WHERE onlineItem = :item";
    $statement = $db->prepare($query);
    $statement->bindValue(':item', $itemname);
    $statement->bindValue(':quantity', $quantity);
    $statement->execute();
    $statement->closeCursor();
}

function get_shipping_address_information($db, $username)
{
   
   $query = "SELECT shippingAddress, city, location, zipcode FROM Customer WHERE userName = :user";
   $statement = $db->prepare($query);
   $statement->bindValue(':user', $username);
   $statement->execute();
   $info = $statement->fetchAll(PDO::FETCH_ASSOC);
   $statement->closeCursor();
   return $info;
}

function insert_into_orders($db, $username, $itemName, $quantity, $orderDate)
  {
    $query = "INSERT INTO Orders (userName, onlineItem, quantity, orderDate)"
            . "VALUES (:user, :item, :quant, :date)";
    $statement = $db->prepare($query);
    $statement->bindValue(':user', $username);
    $statement->bindValue(':item', $itemName);
    $statement->bindValue(':quant', $quantity);
    $statement->bindValue(':date', $orderDate);
    $statement->execute();
    $statement->closeCursor();
  }

function add_to_online_items($db, $itemName, $image, $price, $description, $quantity)
  {
    $query = "INSERT INTO OnlineItems (onlineItem, image, price, description, quantity)"
            . "VALUES (:item, :img, :cost, :desc, :quant)";
    $statement = $db->prepare($query);
    $statement->bindValue(':item', $itemName);
    $statement->bindValue(':img', $image);
    $statement->bindValue(':cost', $price);
    $statement->bindValue(':desc', $description);
    $statement->bindValue(':quant', $quantity);
    $statement->execute();
    $statement->closeCursor();
  }

function remove_from_online_items($db, $itemName)
{
   $query = "DELETE FROM OnlineItems WHERE onlineItem = :item";
   $statement = $db->prepare($query);
   $statement->bindValue(':item', $itemName);
   $statement->execute();
   $statement->closeCursor();
}

function get_location($db)
{
  $query = 'SELECT locationID, image FROM Locations;';
  $statement = $db->prepare($query);
  $statement->execute();
  $locations = $statement->fetchAll(PDO::FETCH_ASSOC);
  $statement->closeCursor();
  return $locations;
}

function houseitem_info($db)
{
  $query = 'SELECT houseItem, price, description FROM HouseMenu;';
  $statement = $db->prepare($query);
  $statement->execute();
  $itemInfo = $statement->fetchAll(PDO::FETCH_ASSOC);
  $statement->closeCursor();
  return $itemInfo;
}

function add_to_inventory($db, $itemName, $image, $price, $description, $quantity)
{
    $query = "INSERT INTO Administrative (onlineItem, image, price, description, quantity)"
            . "VALUES (:item, :img, :cost, :desc, :quant)";
    $statement = $db->prepare($query);
    $statement->bindValue(':item', $itemName);
    $statement->bindValue(':img', $image);
    $statement->bindValue(':cost', $price);
    $statement->bindValue(':desc', $description);
    $statement->bindValue(':quant', $quantity);
    $statement->execute();
    $statement->closeCursor();
    
}

function update_customer($db, $username, $firstName, $lastname, $email, $address, $city, $state, $zip, $phone)
{
    $query = "UPDATE Customer SET firstName = :first, lastName = :last, email = :email, shippingAddress = :ship, city = :city, location = :state, zipcode = :zip, phone = :phone WHERE userName = :user";
    $statement = $db->prepare($query);
    $statement->bindValue(':user', $username);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':zip', $zip);
    $statement->bindValue(':state', $state);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':ship', $address);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':last', $lastname);
    $statement->bindValue(':first', $firstName);
    $statement->execute();
    $statement->closeCursor();
}

function get_customer_info($db, $username)
{
   
   $query = "SELECT firstName, lastName, email, shippingAddress, city, location, zipcode, phone FROM Customer WHERE userName = :user";
   $statement = $db->prepare($query);
   $statement->bindValue(':user', $username);
   $statement->execute();
   $info = $statement->fetchAll(PDO::FETCH_ASSOC);
   $statement->closeCursor();
   return $info;
}
?>
