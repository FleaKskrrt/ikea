<?php
$title = "IKEA Auktion - Tilføj Auktion";
include("functions.php");
require("header.php");
 ?>


<html>
<head>
<title>List item</title>
</head>
<body>

<form method = "post" action = "new_item_to_db.php">
	<center>

		<p>Product Name	: <input type = "text" name = "pname"  ></p>
		<p>Minimum Price		: <input type = "text" name = "start_bid" ></p>
		<p>Category		: <select name = "category">
						<option value = "Chair">Chair</option>
						<option value = "Table">Table</option>
						<option value = "Lamp">Lamp</option>
						<option value = "Carpet">Carpet</option>
						<option value = "Couch">Couch</option>
						<option value = "Bed">Bed</option>
					</select></p>
		<p>Auction Start Time 	: <input type = "datetime-local" name = "starttime"></p>
		<p>Auction End Time 	: <input type = "datetime-local" name = "endtime"></p>
		<p>Description		: <textarea rows = "4" cols = "20"  name = "description"></textarea></p>
  <input hidden type = "text" name = "user_id" value = <?php echo $_SESSION['user']; ?>>
	<input type = "submit" value = "List item">
	</center>
</form>

</body>
</html>
