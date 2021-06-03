<?php

date_default_timezone_set("Europe/Copenhagen");


function connect() { //connect to DB
    global $conn; //set var to global
    $conn = mysqli_connect(DBHOST, DBUSER, DBPASS); //mysqli_connect(host,user,pw)

    if(!$conn) { //if not connected then kill (test if error)
        die(mysqli_error($conn));   //kill
    }
    mysqli_select_db($conn, DBNAME); //select DB that's to be used
}


function getUsers($email) {
    global $conn;
    $sql = 'SELECT * FROM users where email = "'. $email .'"';
    $result = mysqli_query($conn, $sql);
    $user = [];
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)) {
            $user[] = $row;
        }
    }
    return $user;
}


function setStatus(){
global $conn;
$sql = "SELECT * FROM sales, time_track  WHERE time_track.track_id = sales.time_track_id";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
    $sales_s_time = $row['start_time'];
    $sales_e_time = $row['end_time'];
    $sales_id = $row['sales_id'];

    $sales_s_datetime = new DateTime($sales_s_time);
    $sales_e_datetime = new DateTime($sales_e_time);
    $now_datetime = new DateTime();

    if($sales_s_datetime <= $now_datetime && $now_datetime <= $sales_e_datetime)
    {
        $sql = "UPDATE sales SET status = 'ongoing' WHERE sales_id = '$sales_id'";
        mysqli_query($conn, $sql);
    }
    else if($now_datetime < $sales_s_datetime)
    {
        $sql = "UPDATE sales SET status = 'yet to bid' WHERE sales_id = '$sales_id'";
        mysqli_query($conn, $sql);
    }
    else
    {
        $sql = "UPDATE sales SET status = 'finished' WHERE sales_id = '$sales_id'";
        mysqli_query($conn, $sql);
    }
}
}

function getProducts() {
global $conn;
$sql = "SELECT product.product_name, product.start_bid, sales.status, time_track.start_time, time_track.end_time, sales.sales_id
			  FROM product, sales, time_track
				WHERE product.product_id = sales.sales_id
        AND time_track.track_id = product.bid_track_id AND sales.status IN ('ongoing', 'yet to bid')";

    $result = mysqli_query($conn, $sql);
		$products =	[];

    if(mysqli_num_rows($result)>0){
      while($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
      }
	  }

    return $products;
}
