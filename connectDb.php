<?php

$dsn = 'mysql:dbname=toDOList;host=127.0.0.1';
$user = 'root';
$password = 'root';

try {
    $dbh = new PDO($dsn, $user, $password);
    $stmt = $dbh->query('SELECT itemname,  description FROM Items');
    while ($row = $stmt->fetch())
    {
        echo "itemName: ", $row['itemname'] . "\n";
        echo "description: ", $row['description'] . "\n";
    }
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>
