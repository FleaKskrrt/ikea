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
          $sales_e_time = $userAuction['end_time'];
          $sales_id = $userAuction['sales_id'];


          $nowTime = new DateTime();
          $sales_e_time = new DateTime($sales_e_time);
          if($nowTime < $sales_e_time) {
            $timeLeft = $interval = $nowTime->diff($sales_e_time);
            $timeLeft = $interval->format('%D days, %H hours and %I minutes');
           } else {
             $timeLeft =  "done";
          }  ?>

           <tr>
           <td><?php echo $userAuction['product_name']?></td>
           <td><?php echo $userAuction['current_bid']?></td>
           <td><?php echo $userAuction['status']?></td>
           <td><?php echo $timeLeft ?></td>
           <td><form method = "post" action = "item_details.php"><button name = "details" type = "submit" value = " <?php echo $userAuction['sales_id'] ?> ">Details</button></form></td>
           </tr>
        <?php } ?>

        </table>
</div>

<div class="container">
  <table class="table"><th>Product Name</th><th>Initial Bid</th><th>Status</th><th>Time left</th><th>Product Details</th>
    <?php foreach ($userBidAuctions as $userBidAuction) {
          $sales_e_time = $userBidAuction['end_time'];
          $sales_id = $userBidAuction['sales_id'];


          $nowTime= new DateTime();
          $sales_e_time = new DateTime($sales_e_time);
          if($nowTime < $sales_e_time) {
            $timeLeft = $interval = $nowTime->diff($sales_e_time);
            $timeLeft = $interval->format('%D days, %H hours and %I minutes');
           } else {
             $timeLeft =  "done";
          }  ?>

           <tr>
           <td><?php echo $userBidAuction['product_name']?></td>
           <td><?php echo $userBidAuction['current_bid']?></td>
           <td><?php echo $userBidAuction['status']?></td>
           <td><?php echo $timeLeft ?></td>
           <td><form method = "post" action = "item_details.php"><button name = "details" type = "submit" value = " <?php echo $userBidAuction['sales_id'] ?> ">Details</button></form></td>
           </tr>
        <?php } ?>

        </table>
</div>
