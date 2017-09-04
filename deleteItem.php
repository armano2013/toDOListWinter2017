<?php


$itemName = $_POST["itemName"];

echo $itemName;

$dsn = 'mysql:dbname=toDOList;host=127.0.0.1';
$user = 'root';
$password = 'root';

try {
    $dbh = new PDO($dsn, $user, $password);


$sql = "DELETE FROM Items WHERE itemname =  :itemname";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':itemname', $itemName, PDO::PARAM_STR);
$stmt->execute();
$dbh = null;
} catch (PDOException $e) {
    echo $e.getMessage();
}

header("Location: index.php");
?>
