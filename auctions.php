<?php

$title = "IKEA Auktion - Auctions";
include("functions.php");
require("header.php");


?>

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
