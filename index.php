<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<style type="text/css">
	#container {
	    width:100%;
	    text-align:left;
	}

	#left {
	    float:left;
	}

	#center {
	    display: inline-block;
			float:inherit;
			margin-left: 50px;
	}

	#right {
		display: inline-block;
	    float:right;
	}
	</style>

	<body>
		<h1>Daily Journal to Keep You on Track</h1>
		<div id="container">
			<div id="left">
				<h3>Inseration Data to DB</h3>
				<form action="createItem.php" method="post">
					Name: <input type="text" name="name"><br>
					Description: <input type="text" name="description"><br>
					Date: <input type="date" name="date"><br>
					<button>Submit</button>
				</form>
			</div>
			<div id="right">
				<h3>UPDATE Data to DB</h3>
				<form action="updateItem.php" method="post" >
					Which ID(1-...): <input type="text" name="id"><br>
					Name: <input type="text" name="name"><br>
					Description: <input type="text" name="description"><br>
					Date: <input type="date" name="date"><br>
					<button>Submit</button>
				</form>
			</div>
			<div id="center">
				<h3>Deletion Data from DB</h3>
				<form action = "deleteItem.php" method="post" >
					Item Name: <input type="text" name="itemName"><br>
					<button>Delete</button>
				</form>
			</div>
		</div>



<br>
<br>
<br>
<br>
<br>
<br>
<br>


	<h2>View Data on the DB</h2>
<?php

$dsn = 'mysql:dbname=toDOList;host=127.0.0.1';
$user = 'root';
$password = 'root';

try{
	$dbh = new PDO($dsn, $user, $password);
	$stmt = $dbh->query('SELECT * FROM Items');
		while ($row = $stmt->fetch())
		{
			// echo $row["itemname"];
			echo "<div>";

			 echo $row['itemname'];
			 echo "=------";
			 echo $row["description"];
			 echo "=------";
			 echo $row["date"];
			echo "</div>";

		}
		$dbh = null;

} catch(PDOException $e){
	echo $e.getMessage();
}

// $dbh.unset();

// try{
//
//
// 	$stmt = $dbh->query('SELECT itemname,  description FROM Items');
// 	while ($row = $stmt->fetch())
// 	{
// 		var_dump($row);
// 		// <div> $row["itemname"]</div>
// 			// <input type="checkbox"> echo "itemName: ", $row['itemname'] . "\n";
// 			// <input type="checkbox"> echo "description: ", $row['description'] . "\n";
// 	}
// }

?>
	</body>
</html>
