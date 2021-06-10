<?php
include("functions.php");
include("header.php");
$user =  $_SESSION['user'];
$userAuctions = getUserAuctions($user);
$userBidAuctions = getUserBidAuctions($user);



?>

<div class="container">
  <table class="table"><th>Product Name</th><th>Initial Bid</th><th>Status</th><th>Time left</th><th>Product Details</th>
    <?php foreach ($userAuctions as $userAuction) {
          $sales_s_time = $userAuction['start_time'];
          $sales_e_time = $userAuction['end_time'];
          $sales_id = $userAuction['sales_id'];


          $sales_s_tim = new DateTime();
          $sales_e_time = new DateTime($sales_e_time);
          $interval = $sales_s_tim->diff($sales_e_time);?>

           <tr>
           <td><?php echo $userAuction['product_name']?></td>
           <td><?php echo $userAuction['current_bid']?></td>
           <td><?php echo $userAuction['status']?></td>
           <td><?php echo $interval->format('%D:%H:%I:%S') ?></td>
           <td><form method = "post" action = "item_details.php"><button name = "details" type = "submit" value = " <?php echo $userAuction['sales_id'] ?> ">Details</button></form></td>
           </tr>
        <?php } ?>

        </table>
</div>

<div class="container">
  <table class="table"><th>Product Name</th><th>Initial Bid</th><th>Status</th><th>Time left</th><th>Product Details</th>
    <?php foreach ($userBidAuctions as $userBidAuction) {
          $sales_s_time = $userBidAuction['start_time'];
          $sales_e_time = $userBidAuction['end_time'];
          $sales_id = $userBidAuction['sales_id'];


          $sales_s_tim = new DateTime();
          $sales_e_time = new DateTime($sales_e_time);
          $interval = $sales_s_tim->diff($sales_e_time);?>

           <tr>
           <td><?php echo $userBidAuction['product_name']?></td>
           <td><?php echo $userBidAuction['current_bid']?></td>
           <td><?php echo $userBidAuction['status']?></td>
           <td><?php echo $interval->format('%D:%H:%I:%S') ?></td>
           <td><form method = "post" action = "item_details.php"><button name = "details" type = "submit" value = " <?php echo $userBidAuction['sales_id'] ?> ">Details</button></form></td>
           </tr>
        <?php } ?>

        </table>
</div>
