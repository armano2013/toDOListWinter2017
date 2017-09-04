<?php

$itemName = $_POST["name"];
$description = $_POST["description"];
$date = $_POST["date"];


$dsn = 'mysql:dbname=toDOList;host=127.0.0.1';
$user = 'root';
$password = 'root';

try {
  // $sql = "INSERT INTO Items (itemname, description, date) VALUES ($itemName, $description)";
  // $sth = $dbh->query($sql);

$dbh = new PDO($dsn, $user, $password);

$sql = $dbh->prepare("INSERT INTO Items (itemname, description, date) VALUES (? ,?, ?)");
$sql->bindParam(1, $itemName);
$sql->bindParam(2, $description);
$sql->bindParam(3, $date);

$sql->execute();
$dbh = null;
} catch(PDOException $pe){
  echo $pe.getMessage();
}
header("Location: index.php");

?>
