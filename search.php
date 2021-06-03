<?php
 include("functions.php");
 include("header.php");

	$sql = $_GET['product_name'];

	$min_length = 3;

	if(strlen($sql) >= $min_length){

		$sql = mysqli_real_escape_string($conn , $sql);

		$raw_results = mysqli_query($conn , "SELECT product.product_name, product.description, product.product_id, sales.sales_id FROM product , sales
			WHERE (`product_name` LIKE '%".$sql."%' AND product.product_id = sales.sales_id) OR (`description` LIKE '%".$sql."%' AND product.product_id = sales.sales_id)");


		if(mysqli_num_rows($raw_results) > 0){

			while($results = mysqli_fetch_array($raw_results)){

				echo "<p><h3>".$results['product_name']."</h3>".$results['description'] . '<form method = "post" action = "item_details.php"><button name = "details" type = "submit" value = ' . $results['sales_id'] . '>Details</button></form></p>';
			}

		}
		else{
			echo "No results";
		}

	}
	else{
		echo "Minimum length is ".$min_length;
	}
?>
