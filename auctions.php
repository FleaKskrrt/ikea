<?php

$title = "IKEA Auktion - Auctions";
include("functions.php");
require("header.php");
$status = setStatus();
$products = getProducts();

?>

      <div id = "Container">
      	<div id = "Search">
      		<form method = 'GET' action  = 'search.php'>
      			<input type = 'text' name = 'product_name' placeholder = 'Product Name'>
      			<button type = 'submit' name = 'search' </button>
      		</form>
      	</div>

      	<div id = "Mainpanel">
          <table><th>Product Name</th><th>Initial Bid</th><th>Status</th><th>Time left</th><th>Product Details</th>
      		<?php include("components/auctionproducts.php") ?>
      			    </table>
      	</div>

      </div>
