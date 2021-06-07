<?php

$title = "IKEA Auktion - Auctions";
include("functions.php");
require("header.php");
$status = setStatus();
$products = getProducts();

?>

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
