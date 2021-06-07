<?php foreach ($products as $product) {
      $sales_s_time = $product['start_time'];
      $sales_e_time = $product['end_time'];
      $sales_id = $product['sales_id'];
      //echo "$bid_s_time "."$bid_e_time"."<br>";

      $sales_s_tim = new DateTime();
      $sales_e_time = new DateTime($sales_e_time);
      $interval = $sales_s_tim->diff($sales_e_time);?>

       <tr>
       <td><?php echo $product['product_name']?></td>
       <td><?php echo $product['start_bid']?></td>
       <td><?php echo $product['status']?></td>
       <td><?php echo $interval->format('%D:%H:%I:%S') ?></td>
       <td><form method = "post" action = "item_details.php"><button name = "details" type = "submit" value = " <?php echo $product['sales_id'] ?> ">Details</button></form></td>
       </tr>
    <?php } ?>
