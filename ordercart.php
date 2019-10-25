<?php
session_start();
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
		<div id="shopping-cart">
		<div class="txt-heading">Shopping Cart</div>
		<div>
			<a id="btnEmpty" href="menucart.php?action=empty">Empty Cart</a>
		</div>
		<?php
		if(isset($_SESSION["cart_item"])){
			$total_quantity = 0;
			$total_price = 0;
		?>
		<div>
			<table class="tbl-cart" cellpadding="10" cellspacing="1">
			<tbody>
			<tr>
			<th style="text-align:left;">Name</th>
			<th style="text-align:left;">Code</th>
			<th style="text-align:right;" width="5%">Quantity</th>
			<th style="text-align:right;" width="10%">Unit Price</th>
			<th style="text-align:right;" width="10%">Price</th>
			<th style="text-align:center;" width="5%">Remove</th>
			</tr>	
			<?php		
				foreach ($_SESSION["cart_item"] as $item){
					$item_price = $item["quantity"]*$item["price"];
					?>
							<tr>
							<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
							<td><?php echo $item["code"]; ?></td>
							<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
							<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
							<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
							<td style="text-align:center;"><a href="menucart.php?action=remove&code=<?php echo $item["code"]; ?>" class="fa fa-trash"></a></td>
							</tr>
							<?php
							$total_quantity += $item["quantity"];
							$total_price += ($item["price"]*$item["quantity"]);
					}
					?>

			<tr>
			<td colspan="2" align="right">Total:</td>
			<td align="right"><?php echo $total_quantity; ?></td>
			<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
			<td></td></tbody>
		</div>
		<?php
		} else {
		?>
		<div class="no-records">Your Cart is Empty</div>
		<?php 
		}
		?>
		</div>	
		<div>	
			<button class="bottom-right" onclick="window.location.href='checkout.php'">Check Out</button>
		</div>
		<div>
			<button class="bottom-left" onclick="window.location.href='menucart.php'">Add Items</button>
		</div>
  </body>
</html>