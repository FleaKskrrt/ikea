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

      <div class="input-group">
      	<div class="form-inline">
      		<form method = 'GET' action  = 'search.php'>
      			<input class="form-control mr-sm-2" type = 'text' name = 'product_name' placeholder = 'Product Name'>
      			<button class="btn btn-outline-warning my-2 my-sm-0" type = 'submit' name = 'search'>Search</button>
      		</form>
      	</div>

      	<div class="container">
          <table class="table"><th>Product Name</th><th>Initial Bid</th><th>Status</th><th>Time left</th><th>Product Details</th>
      		<?php include("components/auctionproducts.php") ?>
      			    </table>
      	</div>

      </div>

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
        <li>
          <?php
          echo "<a href='?{$categoryString}sorting=ASC'>Billigste først</a>";
          ?>
        </li>
        <li>
          <?php
          echo "<a href='?{$categoryString}sorting=DESC'>Dyreste først</a>";
          ?>
        </li>
      </ul>
</body>
