<?php
$title = "IKEA Auction - Add Auction";
include("functions.php");

require("header.php");
 ?>



<body>
  <div class="container-fluid">
        <h1 class="text-center my-3">New Auction</h1>
  			<hr class="mb-4">
  			<div class="row justify-content-center">
<form class="container col-md-3" method = "post" action = "new_item_to_db.php">

    <div class="form-group">

		<p>Product Name	: <input class="form-control" type = "text" name = "pname"  ></p>
		<p>Minimum Price		: <input class="form-control" type = "text" name = "start_bid" ></p>
		<p>Category		: <select class="form-control" name = "category">
						<option value = "Chair">Chair</option>
						<option value = "Table">Table</option>
						<option value = "Lamp">Lamp</option>
						<option value = "Carpet">Carpet</option>
						<option value = "Couch">Couch</option>
						<option value = "Bed">Bed</option>
					</select></p>
		<p>Auction Start Time 	: <input class="form-control" type = "datetime-local" name = "starttime"></p>
		<p>Auction End Time 	: <input class="form-control" type = "datetime-local" name = "endtime"></p>
		<p>Description		: <textarea class="form-control" rows = "4" cols = "20"  name = "description"></textarea></p>
  <input hidden type = "text" name = "user_id" value = <?php echo $_SESSION['user']; ?>>
	<input type = "submit" value = "List item">
  </div>

</form>

</body>
</html>
