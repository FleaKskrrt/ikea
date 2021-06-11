<?php foreach ($products as $product) {
      $sales_e_time = $product['end_time'];
      $sales_id = $product['sales_id'];


      $nowTime= new DateTime();
      $sales_e_time = new DateTime($sales_e_time);
      $interval = $nowTime->diff($sales_e_time);?>

       <tr>
       <td class="align-middle"><?php echo $product['product_name']?></td>
       <td class="align-middle"><?php echo $product['current_bid']?></td>
       <td class="align-middle"><?php echo $product['status']?></td>
       <td class="align-middle"><?php echo $interval->format('%D days, %H hours and %I minutes') ?></td>
       <td class="align-middle"><form method = "post" action = "item_details.php"><button name = "details" class="btn btn-warning mx-auto" type = "submit" value = " <?php echo $product['sales_id'] ?> ">Details</button></form></td>
       </tr>
    <?php } ?>
