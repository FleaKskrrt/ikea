<?php
$title = "IKEA Auktion - Profile";
include("functions.php");
include("header.php");
$user =  $_SESSION['user'];
$userAuctions = getUserAuctions($user);
$userBidAuctions = getUserBidAuctions($user);

?>

<div class="container">
  <h2>Your auctions</h2>
  <table class="table table-striped table-sm"><th>Product Name</th><th>Current Bid</th><th>Status</th><th>Time left</th><th>Product Details</th>
    <?php if (empty($userAuctions)) { ?>
      <tr><td>You haven't listed any auctions.</td><td></td><td></td><td></td><td></td></tr>
    <?php
    }
    else {
          foreach ($userAuctions as $userAuction) {
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
           <td class="align-middle"><?php echo $userAuction['product_name']?></td>
           <td class="align-middle"><?php echo $userAuction['current_bid']?></td>
           <td class="align-middle"><?php echo $userAuction['status']?></td>
           <td class="align-middle"><?php echo $timeLeft ?></td>
           <td><form method = "post" action = "item_details.php"><button name = "details" class="btn btn-warning mx-auto" type = "submit" value = " <?php echo $userAuction['sales_id'] ?> ">Details</button></form></td>
           </tr>
        <?php } ?>
    <?php } ?>
        </table>
</div>

<div class="container">
  <h2>Auctions you're leading</h2>
  <table class="table table-striped table-sm"><th>Product Name</th><th>Current Bid</th><th>Status</th><th>Time left</th><th>Product Details</th>
    <?php if (empty($userBidAuctions)) { ?>
      <tr><td>You arent leading any auctions.</td><td></td><td></td><td></td><td></td></tr>
    <?php
    }
    else {
          foreach ($userBidAuctions as $userBidAuction) {
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
           <td class="align-middle"><?php echo $userBidAuction['product_name']?></td>
           <td class="align-middle"><?php echo $userBidAuction['current_bid']?></td>
           <td class="align-middle"><?php echo $userBidAuction['status']?></td>
           <td class="align-middle"><?php echo $timeLeft ?></td>
           <td class="align-middle"><form method = "post" action = "item_details.php"><button name = "details" class="btn btn-warning mx-auto" type = "submit" value = " <?php echo $userBidAuction['sales_id'] ?> ">Details</button></form></td>
           </tr>
        <?php } ?>
    <?php } ?>
        </table>
</div>
