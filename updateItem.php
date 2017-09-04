<?php

$itemName = $_POST["name"];
$description = $_POST["description"];
$date = $_POST["date"];
$id = $_POST["id"];


$dsn = 'mysql:dbname=toDOList;host=127.0.0.1';
$user = 'root';
$password = 'root';

try {
  // $sql = "INSERT INTO Items (itemname, description, date) VALUES ($itemName, $description)";
  // $sth = $dbh->query($sql);

$dbh = new PDO($dsn, $user, $password);
// UPDATE `Items` SET `items_id`=[value-1],`itemname`=[value-2],`description`=[value-3],`date`=[value-4] WHERE 1
$sql = "UPDATE INTO Items (itemname, description, date) VALUES (? ,?) WHERE item_id =  :id"";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(1, $itemName, PDO::PARAM_STR);
$stmt->bindParam(2, $description, PDO::PARAM_STR);

$sql->execute();
$stmt = null;
} catch(PDOException $pe){
  echo $pe.getMessage();
}
header("Location: index.php");

?>
