<?php
session_start();
require_once("dbcontroller.php");


$db_handle = new DBController();
if(!empty($_GET["action"])) {
	switch($_GET["action"]) {
		case "add":
			if(!empty($_POST["quantity"])) {
				$productByCode = $db_handle->runQuery("SELECT * FROM menu WHERE code='" . $_GET["code"] . "'");
				$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
				
				if(!empty($_SESSION["cart_item"])) {
					if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
						foreach($_SESSION["cart_item"] as $k => $v) {
								if($productByCode[0]["code"] == $k) {
									if(empty($_SESSION["cart_item"][$k]["quantity"])) {
										$_SESSION["cart_item"][$k]["quantity"] = 0;
									}
									$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
								}
						}
					} else {
						$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
					}
				} else {
					$_SESSION["cart_item"] = $itemArray;
				}
			}
		break;
		case "remove":
			if(!empty($_SESSION["cart_item"])) {
				foreach($_SESSION["cart_item"] as $k => $v) {
						if($_GET["code"] == $k)
							unset($_SESSION["cart_item"][$k]);				
						if(empty($_SESSION["cart_item"]))
							unset($_SESSION["cart_item"]);
				}
			}
		break;
		case "empty":
			unset($_SESSION["cart_item"]);
		break;	
	}
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Burgerlicious</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
  	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
		      <a class="navbar-brand" href="index1.html">Burger<br><small>licous</small></a>
		      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
		        <span class="oi oi-menu"></span> Menu
		      </button>
	      <!--<div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.html" class="nav-link">Home</a></li>
	          <li class="nav-item active"><a href="menu.html" class="nav-link">Menu</a></li>
	          <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
	          <li class="nav-item"><a href="ordercart.php" class="nav-link">Cart</a></li>
	          <li class="nav-item"><a href="logout.php" class="nav-link">Log Out</a></li>
	        </ul>
	      </div>
		  </div>
	  </nav>-->

	  <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav mr-auto">
	          <li class="nav-item text-center"><a href="index1.html" class="nav-link">Home</a></li>
	          <li class="nav-item active text-center"><a href="menucart.php" class="nav-link">Menu</a></li>
	          <li class="nav-item text-center"><a href="about1.html" class="nav-link">About</a></li>
	          <li class="nav-item text-center"><a href="contact1.html" class="nav-link">Contact</a></li>
          </ul>
          <br>
          <nav class="nav-item text-center">
							<button type="button" class="nav-link px-4 py-3 d-inline btn" onclick="window.location.href='logout.php'">Log Out</button>
							<a class="pl-2" href="ordercart.php"><img src="images/shopping-cart.png" alt=""></a>
							<!--<a href="logout.php" type="button" class="nav-link px-4 py-3 d-inline btn">Logout</a>-->
						</nav>
					</div>
				</div>
			</nav>
    <!-- END nav -->

    <section class="home-slider owl-carousel img" style="background-image: url(images/bg_1.jpg);">

      <div class="slider-item" style="background-image: url(images/bg_3.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Our Menu</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Menu</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>
	
    <section class="ftco-menu">
    	<div class="container-fluid">
    		<div class="row d-md-flex">
	    		<div class="col-lg-12 ftco-animate p-md-5">
						<div class="row justify-content-center mb-5 pb-3 mt-5 pt-5">
							<div class="col-md-7 heading-section text-center ftco-animate">
								<h2 class="mb-4">Menu</h2>
								<p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
							</div>
						</div>
		    	<div class="row">
		          <div class="nav-link-wrap mb-5 mx-auto">
		            <div class="nav ftco-animate nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
		              <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Burgers</a>

		              <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Pizza</a>

		              <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Mexican</a>

						<a class="nav-link" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab" aria-controls="v-pills-4" aria-selected="false">Sides</a>
						
						<a class="nav-link" id="v-pills-5-tab" data-toggle="pill" href="#v-pills-5" role="tab" aria-controls="v-pills-5" aria-selected="false">Drinks</a>
		            </div>
		          </div>

		        <div class="col-md-12 d-flex align-items-center">
		            <div class="tab-content ftco-animate" id="v-pills-tabContent">

						<!--burgers-->
				  		<div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
				  			<div class="row">
								<?php
								$product_array = $db_handle->runQuery("SELECT * FROM menu WHERE code LIKE 'B%'");
								if (!empty($product_array)) { 
								    foreach($product_array as $key=>$value){
								?>    
				                    <div class="col-md-4 text-center">
				                    	<form method="post" action="menucart.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
				                            <div class="menu-wrap">   
				                                <a href="#" class="menu-img img mb-4" style="background-image: url(<?php echo $product_array[$key]["image"]; ?>);"></a>
				                                <h3 class="product-title"><?php echo $product_array[$key]["name"]; ?></h3>
				                                <p><?php echo $product_array[$key]["description"]; ?></p>
				                                <p class="price"><span><?php echo "$".$product_array[$key]["price"]; ?></span></p>
				                                <p class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btn btn-white btn-outline-white" /></p>
				                            </div>
				                        </form>    
				                    </div>
								<?php
									}
								}
								?>
							</div>
						</div>
						<!--pizzas-->
			            <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
			                <div class="row">
									<?php
									$product_array = $db_handle->runQuery("SELECT * FROM menu WHERE code LIKE 'P%'");
									if (!empty($product_array)) { 
									    foreach($product_array as $key=>$value){
									?>    
					                    <div class="col-md-4 text-center">
					                    	<form method="post" action="menucart.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
					                            <div class="menu-wrap">   
					                                <a href="#" class="menu-img img mb-4" style="background-image: url(<?php echo $product_array[$key]["image"]; ?>);"></a>
					                                <h3 class="product-title"><?php echo $product_array[$key]["name"]; ?></h3>
					                                <p><?php echo $product_array[$key]["description"]; ?></p>
					                                <p class="price"><span><?php echo "$".$product_array[$key]["price"]; ?></span></p>
					                                <p class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btn btn-white btn-outline-white" /></p>
					                            </div>
					                        </form>    
					                    </div>
									<?php
										}
									}
									?>
								</div>
							</div>
					<!--mexican-->
		            <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
		                <div class="row">
							<?php
							$product_array = $db_handle->runQuery("SELECT * FROM menu WHERE code LIKE 'M%'");
							if (!empty($product_array)) { 
							    foreach($product_array as $key=>$value){
							?>    
			                    <div class="col-md-4 text-center">
			                    	<form method="post" action="menucart.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			                            <div class="menu-wrap">   
			                                <a href="#" class="menu-img img mb-4" style="background-image: url(<?php echo $product_array[$key]["image"]; ?>);"></a>
			                                <h3 class="product-title"><?php echo $product_array[$key]["name"]; ?></h3>
			                                <p><?php echo $product_array[$key]["description"]; ?></p>
			                                <p class="price"><span><?php echo "$".$product_array[$key]["price"]; ?></span></p>
			                                <p class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btn btn-white btn-outline-white" /></p>
			                            </div>
			                        </form>    
			                    </div>
							<?php
								}
							}
							?>
						</div>
					</div>
					<!--sides-->
		            <div class="tab-pane fade" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab">
		                <div class="row">
							<?php
							$product_array = $db_handle->runQuery("SELECT * FROM menu WHERE code LIKE 'S%'");
							if (!empty($product_array)) { 
							    foreach($product_array as $key=>$value){
							?>    
			                    <div class="col-md-4 text-center">
			                    	<form method="post" action="menucart.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			                            <div class="menu-wrap">   
			                                <a href="#" class="menu-img img mb-4" style="background-image: url(<?php echo $product_array[$key]["image"]; ?>);"></a>
			                                <h3 class="product-title"><?php echo $product_array[$key]["name"]; ?></h3>
			                                <p class="price"><span><?php echo "$".$product_array[$key]["price"]; ?></span></p>
			                                <p class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btn btn-white btn-outline-white" /></p>
			                            </div>
			                        </form>    
			                    </div>
							<?php
								}
							}
							?>
						</div>
					</div>
					<!--drinks-->
					<div class="tab-pane fade" id="v-pills-5" role="tabpanel" aria-labelledby="v-pills-5-tab">
		                <div class="row">
							<?php
							$product_array = $db_handle->runQuery("SELECT * FROM  menu WHERE code LIKE 'D%'");
							if (!empty($product_array)) { 
							    foreach($product_array as $key=>$value){
							?>    
			                    <div class="col-md-4 text-center">
			                    	<form method="post" action="menucart.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			                            <div class="menu-wrap">   
			                                <a href="#" class="menu-img img mb-4" style="background-image: url(<?php echo $product_array[$key]["image"]; ?>);"></a>
			                                <h3 class="product-title"><?php echo $product_array[$key]["name"]; ?></h3>
			                                <p class="price"><span><?php echo "$".$product_array[$key]["price"]; ?></span></p>
			                                <p class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btn btn-white btn-outline-white" /></p>
			                            </div>
			                        </form>    
			                    </div>
							<?php
								}
							}
							?>
						</div>
					</div>
		            </div>
		              </div>
		            </div>
		          </div>
		        </div>

		      </div>
		    </div>
    	</div>
    </section>
    <footer class="ftco-footer ftco-section img">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-5 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">About Us</h2>
              <p>At Burgerlicious, we always prepare the best burger to customers.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="https://mobile.twitter.com/BurgerLiciousss"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="https://www.instagram.com/burger.liciouss/"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-5 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">5, Jalan Universiti, Bandar Sunway, 47500 Petaling Jaya, Selangor</span></li>
	                <li><a href="tel:+60374918622"><span class="icon icon-phone"></span><span class="text">+6 (03) 7491 8622</span></a></li>
	                <li><a href="mailto:info@burgerlicious.com"><span class="icon icon-envelope"></span><span class="text">info@burgerlicious.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p>
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved 
  </p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>