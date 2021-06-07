<?php
include("functions.php");
require("header.php");
$sales_id = $_POST['details'];

$details =  getIdetails($sales_id);
foreach ($details as $details)?>
<div>
  <image src = '.png'>";
  <h3>Sales ID : <?php echo $details['sales_id'];?> </h3>
  <h4>Product Name : <?php echo $details['product_name'];?> </h4>
  <h4>Category : <?php echo $details['category'];?> </h4>
  <h4>Bid Start Time : <?php echo $details['start_time'];?> </h4>
  <h4>Bid End Time : <?php echo $details['end_time'];?> </h4>
  <h4>Initial Bid : <?php echo $details['start_bid'];?> </h4>
  <h4>Status : <?php echo $details['status'];?> </h4>
  <h4>Description : <?php echo $details['description'];?> </h4>
</div>

<div>
<?php
  if(strcmp($details['status'], "ongoing") == 0){
    echo "<h2 >Status : Ongoing</h2>";
    echo "<table><tr><th>Top Bid</th></tr>";
      if($details['current_bid_id'] == $details['seller_id'])
        echo "<td><b>Haven't Bid Yet</b></td>";
      else
        echo "<td>" . $details['current_bid_id'] . "</td><td>" . $details['current_bid'] . "</td>";
    echo "</table>";
    echo "<br><br>";
    echo "<h2>Bid Now!</font></h2>";

    echo "<form action = 'bid_update.php' method = 'post'>";
      echo "<input type = 'text' name = 'new_bid' placeholder = 'Your Bid'<br>";
        echo "<button type = 'submit' name = 'bid' value = " . $sales_id . ">BID</button>";
      echo "<input type = 'hidden' name = 'bidder_id' value = " . $_SESSION['user'] . " <br>";
    echo "</form>";

  }
  else if(strcmp($details['status'], "yet to bid") == 0)
    echo "<h2>Yet To Bid</h2>";
  else
  {
    echo "<h2>Status : Finished</h2>";
    echo "<table><tr><th>Top Bid</th></tr>";
      if($details['current_bid_id'] == $details['seller_id'])
        echo "<td><b>No Bid Happened</b></td>";
      else
        echo "<td>" . $details['current_bid_id'] . "</td><td>" . $details['current_bid'] . "</td>";
  }?>
</div>
