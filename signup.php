<?php

$title = "IKEA Auktion - Sign up";
include("functions.php");
include_once("bootstrap.html");
include_once("connect.php");
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title;?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
	<div class="container-fluid">
      <h1 class="text-center my-3">Sign Up</h1>
				<hr class="mb-4">
					<div class="row justify-content-center">
		  			<form class="container col-md-4" name="registerForm" action="signup.php" method="post">
							<div class="form-group">
								<p>First name:<input class="form-control" type="text" name="first_name" placeholder="Ikea"></p>
								<p>Last name:<input class="form-control" type="text" name="last_name" placeholder="Ikeasen"></p>
								<p>Email:<input class="form-control" type="text" name="email" placeholder="Ikea@ikea.dk"></p>
								<p>Password: <input class="form-control" type="password" name="password" placeholder="password"></p>
								<p>Phone nr. +45: <input class="form-control" type="text" name="phone_nr" placeholder="70150909"></p>
								<p>Postal code: <input class="form-control" type="text" name="postal_code" placeholder="5000"></p>
								<p>Street name: <input class="form-control" type="text" name="street_name" placeholder="ikeavej"></p>
								<p>House nr.: <input class="form-control" type="text" name="house_nr" placeholder="1"></p>
								<button class="btn btn-warning" type="submit">Register User</button>
							</div>
								<p>Har du allerede en bruger?</p>
								<strong><a class="text-warning" href="login.php"><p>Log In.</p></a></strong>
						</form>
					</div>
	</div>
</body>
</html>
