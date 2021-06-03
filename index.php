<?php

$title = "IKEA Auktion - Home";
include("functions.php");
require("header.php");


?>

<img src="pic2.png" alt="pic1" class="img-fluid max-width: 100% height: auto">

<main role="main" class="d-flex justify-content-center inner cover">
        <h1 class="mt-5 cover-heading">Sell or buy now</h1>
        <p class="lead">With IKEA Auctions you can sell and buy used IKEA products. <br> Register now and help the climate through second hand IKEA funiture - <br> list items and buy other great products.</p>
        <p class="lead">
          <a href="#" class="mt-5 btn btn-lg btn-secondary">Learn more</a>
        </p>
      </main>

      <div id = "Container">
      	<div id = "Search">
      		<form method = 'post' action  = 'search.php'>
      			<input type = 'text' name = 'product_name' placeholder = 'Product Name'>
      			<button type = 'submit' name = 'search' </button>
      		</form>
      	</div>

      	<div id = "Mainpanel">
      		<?php
            $status = setStatus();
      			$products = getProducts();
      			echo '<table><th>Product Name</th><th>Initial Bid</th><th>Status</th><th>Time left</th><th>Product Details</th>';
      					foreach ($products as $product) {
      						$sales_s_time = $product['start_time'];
      						$sales_e_time = $product['end_time'];
      						$sales_id = $product['sales_id'];
      						//echo "$bid_s_time "."$bid_e_time"."<br>";

      						$sales_s_tim = new DateTime();
      						$sales_e_time = new DateTime($sales_e_time);
      						$interval = $sales_s_tim->diff($sales_e_time);

      						echo '<tr>';
      						echo '<td>' . $product['product_name'] . '</td>';
      						echo '<td>' . $product['start_bid'] . '</td>';
      						echo '<td>' . $product['status'] . '</td>';
      						echo '<td>' . $interval->format('%D:%H:%I:%S') . '</td>';
      						echo '<td>' . '<form method = "post" action = "item_details.php"><button name = "details" type = "submit" value = ' . $product['sales_id'] . '>Details</button></form></td>';
      						echo '</tr>';
      					}
      			echo '</table>';
      		?>
      	</div>

      </div>
