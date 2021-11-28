<?php
$insert = false;
if(isset($_POST['username'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $username = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    
    $sql = "INSERT INTO `ecom`.`signup` (`username`, `email`, `address`, `password`) VALUES ('$username ', '$email', '$address', '$password');";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title> CSS Login Screen Tutorial </title>
</head>
<body>
  <body>
    <div class= "header">
        HOD Ecommerce Website
    </div>
    <div class="signup-page">
      <div class="form">
        <div class="login">
          <div class="login-header">
            <h3>Sign Up</h3>
            <p>Please enter your credentials.</p>
          </div>
        </div>
        <form class="login-form" action="signup.php" method="post">
          <input type="text" name="username" id="username" placeholder="username"/>
          <input type="email" name="email" id="email" placeholder="email-id"/>
          <input type="text" name="address" id="address" placeholder="address" />
          <input type="password" name="password" id="password" placeholder="Password"/>
          <button class = "btn-hov">Sign up</button>
          <p class="message">Already an user? <a href="./login.html">Login</a></p>
        </form>
      </div>
    </div>
</body>
</body>
</html>