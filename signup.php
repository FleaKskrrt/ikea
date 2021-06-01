<?php

$title = "IKEA Auktion - Sign up";
require("header.php");

global $conn;

if(
	  !empty($_POST['first_name']) &&
	  !empty($_POST['last_name']) &&
	  !empty($_POST['email']) &&
	  !empty($_POST['password']) &&
	  !empty($_POST['phone_nr']) &&
	  !empty($_POST['postal_code']) &&
	  !empty($_POST['street_name']) &&
		!empty($_POST['house_nr'])
	) {
	  if(count(getUsers($_POST['email'])) == 0){
			$sql = 'INSERT INTO users (first_name, last_name, email, password, phone_nr, postal_code, street_name, house_nr)
	    VALUES (
	      "' . $_POST['first_name'] . '",
	      "' . $_POST['last_name'] . '",
	      "' . $_POST['email'] . '",
	      "' . $_POST['password'] . '",
	      "' . $_POST['phone_nr'] . '",
	      "' . $_POST['postal_code'] . '",
	      "' . $_POST['street_name'] . '",
				"' . $_POST['house_nr'] . '"
			)';

	    mysqli_query($conn, $sql);
	    if(count(getUsers($_POST['email'])) > 0){
	      echo "Bruger oprettet";
	    }
	  } else {
	    echo "Bruger eksisterer allerede";
	  }
	}

?>
<body>

	<div id="user-registration">
		<a href="login.php"><p>Har du allerede en bruger?</p></a>
		  <form name="registerForm" action="signup.php" method="post">
						<p>First name:<input type="text" name="first_name" placeholder="Ikea"> </p>
						<p>Last name:<input type="text" name="last_name" placeholder="Ikeasen"> </p>
						<p>Email:<input type="text" name="email" placeholder="Ikea@ikea.dk"> </p>
						<p>Password: <input type="password" name="password" placeholder="password"></p>
						<p>Phone nr. +45: <input type="text" name="phone_nr" placeholder="70150909"></p>
						<p>Postal code: <input type="text" name="postal_code" placeholder="5000"></p>
						<p>Street name: <input type="text" name="street_name" placeholder="ikeavej"> </p>
						<p>House nr.: <input type="text" name="house_nr" placeholder="1"></p>

				<button type="submit">Registrer bruger</button>
		</form>
	</div>



</body>
</html>
