<?php
include("functions.php");
include("header.php");
$user =  $_SESSION['user'];
$userAuctions = getUserAuctions($user);
foreach ($userAuctions as $userAuctions);
echo $userAuctions['product_name'];

 ?>
