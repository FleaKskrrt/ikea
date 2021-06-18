<?php
include("functions.php");
include_once("connect.php");

	date_default_timezone_set("Europe/Copenhagen");
	$product_name = $_POST['pname'];
	$seller_id = $_POST['user_id'];
	$start_bid = $_POST['start_bid'];
	$category = $_POST['category'];
	$sales_s_time = $_POST['starttime'];
	$sales_e_time = $_POST['endtime'];
	$description = $_POST['description'];

	global $conn;
	$conn = $conn;
// skulle have brugt insert last id
	$time_trackID = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM time_track")) + 1;
	echo "$time_trackID"."<br>";
	$sql = "INSERT INTO time_track VALUES ('$time_trackID', '$sales_s_time', '$sales_e_time')";
	$sql_exec = mysqli_query($conn, $sql);

	$product_id = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM product")) + 1;
	echo "$product_id"."<br>";
	$sql = "INSERT INTO product VALUES ('$product_id', '$product_name', '$category', '$description', '$seller_id', '$start_bid')";
	$sql_exec = mysqli_query($conn, $sql);

	$sales_id = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM sales")) + 1;

	$sales_s_datetime = new DateTime($sales_s_time);
  $sales_e_datetime = new DateTime($sales_e_time);
  $now_datetime = new DateTime();

	$sales_s_datetime = $sales_s_datetime->format('%H:%I:%S');
	$sales_e_datetime = $sales_e_datetime->format('%H:%I:%S');
	$now_datetime = $now_datetime->format('%H:%I:%S');


	echo "$sales_s_time"." "."$sales_e_time "."$now_datetime"."<br>";
	if($sales_s_time > $now_datetime)
	{
		$status = "yet to bid";
	}
	else if($sales_s_time <= $date && $sales_e_time >= $now_datetime)
	{
		$status = "ongoing";
	}
	else if($sales_e_time < $now_datetime)
	{
		$status = "finished";
	}
	$sql1 = "INSERT INTO sales VALUES ('$sales_id', '$status', '$start_bid', '$seller_id', '$product_id', '$seller_id', '$time_trackID')";
	$sql_exec1 = mysqli_query($conn, $sql1);
	if($sql_exec && $sql_exec1)
	{
		echo "Successfylly added";
		header("Location: auctions.php");
	}

?>
