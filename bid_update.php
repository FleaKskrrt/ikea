<?php
include("functions.php");
include_once("connect.php");

$bidder_id = $_POST['bidder_id'];
$sales_id = $_POST['bid'];
$new_bid = $_POST['new_bid'];


$_GET['bid_ok'] = 1;




$sql = "SELECT current_bid FROM sales WHERE sales_id = '$sales_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$prev_top_bid = $row['current_bid'];
if($new_bid <= $prev_top_bid)
{
  echo "<h2>You Bid Must Heigher Than Previous One!</h2>";
  echo "<form method = 'post' action = 'item_details.php'><button name = 'details' type = 'submit' value = " . $sales_id . ">Item Details</button></form>";
}
else
{
  $sql = "UPDATE sales SET current_bid = '$new_bid', current_bid_id = '$bidder_id' WHERE sales_id = '$sales_id'";
  mysqli_query($conn, $sql);
  $_POST['details'] = $sales_id;
}
header("Location: auctions.php");
exit();
 ?>
