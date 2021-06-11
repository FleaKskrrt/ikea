<?php

$title = "IKEA Auktion - Auctions";
include("functions.php");
require("header.php");
$status = setStatus();
$category = "";
$sorting = "";

if (isset($_GET["category"])) {
  $category = $_GET["category"];
}

if (isset($_GET["sorting"])) {
  $sorting = $_GET["sorting"];
}

$products = getProducts($category, $sorting);

$categoryString = "";

if ($category != "") {
  $categoryString = "category=$category&";
}

?>

<body>
    <div class="container-fluid mt-4">
        <div class="row g-0">
      	 <div class="col-6 col-md-2">
           <div class="input-group">
           	<div class="form-inline">
           		<form method = 'GET' action  = 'search.php'>
           			<input class="form-control mr-sm-2" type = 'text' name = 'product_name' placeholder = 'Product Name'>
           			<button class="btn btn-outline-warning my-2 my-sm-0" type = 'submit' name = 'search'>Search</button>
           		</form>
           	</div>
           </div>
         <li>
           <a href=/ikea/auctions.php>All Auctions</a>
         </li>
         <ul>
           <?php
           $categories = getAllCategories();
           foreach ($categories as $category) {
             echo "<li>";
             echo "<a href='?category={$category['category']}'>{$category['category']} ({$category['count']})</a>";
             echo "</li>";
           }
           ?>
         </ul>

         <ul>
         <p class="pt-4">Sorting:</p>
           <li>
             <?php  echo "<a href='?{$categoryString}sorting=ASC'>Price ascending</a>"; ?>
           </li>
           <li>
             <?php
             echo "<a href='?{$categoryString}sorting=DESC'>Price descending</a>";
             ?>
           </li>
         </ul>
    	     </div>



      <div class="col-sm-6 col-md-10">
        <table class="table table-striped"><th>Product Name</th><th>Current Bid</th><th>Status</th><th>Time left</th><th>Product Details</th>
        <?php include("components/auctionproducts.php") ?>
              </table>
      </div>
    </div>
  </div>
</body>
