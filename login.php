<?php
$title = "IKEA Auktion - Login";
include('functions.php');
define('DBHOST', 'localhost');
define('DBPASS', 'root');
define('DBUSER', 'root');
define('DBNAME', 'ikeadb');

connect();
session_start();

$loginstatus;

if(isset($_POST['login'])){
  if(count(getUsers($_POST['email']))>0){
    if($_POST['password'] == getUsers($_POST['email'])[0]['password']) {
        $_SESSION['user'] = $_POST['email'];
        header("Location: index.php");
        exit();
    } else {
      $loginstatus = "Password is invalid";
    }
  } else {
    $loginstatus = "Email does not exist";
  }
} else {
  $loginstatus = "You are not logged in";
}
?>

<body>
    <form action="login.php" method="post">
        <div class="login-box">
            <h1>Login</h1>

            <div class="textbox">
                <input type="text" placeholder="E-mail"
                         name="email" value="">
            </div>

            <div class="textbox">
                <input type="password" placeholder="Password"
                         name="password" value="">
            </div>
            <p><?php echo $loginstatus ?></p>
            <input class="button" type="submit"
                     name="login" value="Sign In">
        </div>
    </form>
</body>

</html>
