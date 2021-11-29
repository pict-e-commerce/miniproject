<?php
    session_start();
    $message="";
    if(count($_POST)>0) {
        $server = "localhost";
    $username = "root";
    $password = "";
    // Create a database connection
        $con = mysqli_connect($server, $username, $password) or die('Unable To connect');
        $result = mysqli_query($con,"SELECT * FROM `ecom`.`login` WHERE username = '" . $_POST["username"] . "' and password = '". $_POST["password"]."'");
        $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
        $_SESSION["id"] = $row['id'];
        $_SESSION["username"] = $row['username'];
        } else {
         $message = "Invalid Username or Password!";
        }
    }
    if(isset($_SESSION["username"])) {
    header("Location:index.php");
    }
?>
<html>
<head>
<title>User Login</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class= "header">
    HOD Ecommerce Website
    </div>
    <div class="login-page">
      <div class="form">
        <div class="login">
          <div class="login-header">
            <h3>LOGIN</h3>
            <p>Please enter your credentials to login.</p>
          </div>
        </div>
    <div class="message"><?php if($message!="") { echo $message; } ?></div>
    <form name="frmUser" class="login-form" action="login.php" method="post">
     <input type="text" name="username" id="username" placeholder="username"/>
     <input type="password" name="password" id="password" placeholder="password"/>
    <input type="submit" name="submit" value="Submit" class = "btn-hov">
    <input type="reset">
          <p class="message">Not registered? <a href="./signup.php">Create an account</a></p>
        </form>
      </div>
    </div>
</body>
</html>