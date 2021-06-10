<?php
include("functions.php");
require("header.php");
$status = setStatus();
$sales_id = $_POST['details'];

$details =  getIdetails($sales_id);
foreach ($details as $detail)
$sales_e_time = $detail['end_time'];
$nowTime= new DateTime();
$sales_e_time = new DateTime($sales_e_time);
if($nowTime < $sales_e_time) {
  $timeLeft = $interval = $nowTime->diff($sales_e_time);
  $timeLeft = $interval->format('Auction ends in: %D days, %H hours and %I minutes');
 } else {
   $timeLeft =  "Auction: done";
}

?>



<div>
  <image src = '.png'>
  <h3>Sales ID : <?php echo $detail['sales_id'];?> </h3>
  <h4>Product Name : <?php echo $detail['product_name'];?> </h4>
  <h4>Category : <?php echo $detail['category'];?> </h4>
  <h4><?php echo $timeLeft ?> </h4>
  <h4>Initial Bid : <?php echo $detail['start_bid'];?> </h4>
  <h4>Status : <?php echo $detail['status'];?> </h4>
  <h4>Description : <?php echo $detail['description'];?> </h4>
</div>

<div>
<?php
  if(strcmp($detail['status'], "ongoing") == 0){
    echo "<h2 >Status : Ongoing</h2>";
    echo "<table class='table'><tr><th>Top Bidder</th><th>Top Bid</th></tr>";
      if($detail['current_bid_id'] == $detail['seller_id'])
        echo "<td><b>Haven't Bid Yet</b></td>";
      else
        echo "<td>" . $detail['first_name'] . " " . $detail['last_name'] . "</td><td>" . $detail['current_bid'] . "</td>";
    echo "</table>";
    echo "<br><br>";
    echo "<h2>Bid Now!</h2>";

    echo "<form action = 'bid_update.php' class='form-inline' method = 'post'>";
      echo "<input type = 'number' class='form-control' name = 'new_bid' placeholder = 'Your Bid'<br>";
        echo "<button type = 'button' class='btn btn-warning' name = 'bid' value = " . $sales_id . ">BID</button>";
      echo "<input type = 'hidden' name = 'bidder_id' value = " . $_SESSION['user'] . " <br>";
    echo "</form>";

  }
  else if(strcmp($detail['status'], "yet to bid") == 0)
    echo "<h2>Yet To Bid</h2>";
  else
  {
    echo "<h2>Status : Finished</h2>";
    echo "<table class='table'><tr><th>Top Bidder</th><th>Winner Bid</th></tr>";
      if($detail['current_bid_id'] == $detail['seller_id'])
        echo "<td><b>No Bids Happened</b></td><td><b>No winner</b></td>";
      else
        echo "<td>" . $detail['first_name'] . " " . $detail['last_name'] . "</td><td>" . $detail['current_bid'] . "</td>";
  }?>
</div>
