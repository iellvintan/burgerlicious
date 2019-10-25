<?php
session_start();
require_once("config.php");

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Burgerlicious</title>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/cart.css">

	</head>
	<body>
        <button class="top-right" type="button" class="nav-link px-4 py-3 d-inline btn" onclick="window.location.href='logout.php'">Log Out</button>
		<div id="shopping-cart">
        <div class="txt-heading">Admin Page</div>

		<?php

		$result = mysqli_query($link, "SELECT * FROM orders");
		$orders = array(); // create a variable to hold the information
		while (($row = mysqli_fetch_array($result, MYSQLI_NUM))){
		  array_push($orders, $row); // add the row in to the results (data) array
		}
		
		foreach($orders as $order):
		?>
			<p>
				Order ID: <?= $order[0] ?><span style='color:red;margin-right:10em; display:inline-block;'>&nbsp;</span>
				Member ID: <?= $order[1] ?><span style='color:red;margin-right:10em; display:inline-block;'>&nbsp;</span>
				Item Code: <?= $order[2] ?><span style='color:red;margin-right:10em; display:inline-block;'>&nbsp;</span>
				Quantity: <?= $order[3] ?><span style='color:red;margin-right:10em; display:inline-block;'>&nbsp;</span>
				Price: <?= $order[4] ?><span style='color:red;margin-right:10em; display:inline-block;'>&nbsp;</span>
				Ordered at: <?= $order[5] ?><span style='color:red;margin-right:10em; display:inline-block;'>&nbsp;</span>			
			</p>
			
		<?php endforeach; ?>
		

</div>	
</body>
</html>