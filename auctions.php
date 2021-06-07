<?php

$title = "IKEA Auktion - Auctions";
include("functions.php");
include_once("bootstrap.html");
require("header.php");
$status = setStatus();
$products = getProducts();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title;?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>

      <div class="input-group">
      	<div class="form-inline">
      		<form method = 'GET' action  = 'search.php'>
      			<input class="form-control mr-sm-2" type = 'text' name = 'product_name' placeholder = 'Product Name'>
      			<button class="btn btn-outline-warning my-2 my-sm-0" type = 'submit' name = 'search'>Search</button>
      		</form>
      	</div>

      	<div class="container">
          <table class="table"><th>Product Name</th><th>Initial Bid</th><th>Status</th><th>Time left</th><th>Product Details</th>
      		<?php include("components/auctionproducts.php") ?>
      			    </table>
      	</div>

      </div>
</body>
