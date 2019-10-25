<?php
session_start();
require_once "config.php";



$memberID =  $_SESSION["id"];

isset($_SESSION["cart_item"]);

foreach ($_SESSION["cart_item"] as $item){
	$code = $item["code"];
	$quantity = $item["quantity"];
	$price = $item["price"];


	if(mysqli_query($link, "DESCRIBE orders")){
		$sql = "INSERT INTO orders (memberID, code, quantity, price) VALUES ($memberID, '$code', $quantity, $price);";
		mysqli_query($link, $sql);
		echo "Orders sent";
	}
}

mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  	<meta http-equiv="refresh" content="3;url=menucart.php?action=empty" />
  </head>
  <body>

  </body>
</html>