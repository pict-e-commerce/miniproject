<?php
$insert = false;
if(isset($_POST['name'])){
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
    $username = $_POST['name'];
    $password = $_POST['password'];
    $sql = "INSERT INTO `ecom`.`login` (`username`, `password`) VALUES ('$username', '$password');";
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
<title> Ecom website </title>
</head>
<body>
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
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form.</p>";
        }
    ?>
        <form class="login-form" action="login.php" method="post">
          <input type="text" name="name" id="name" placeholder="username"/>
          <input type="password" name="password" id="password" placeholder="password"/>
          <button class = "btn-hov">login</button>
          <p class="message">Not registered? <a href="./signup.html">Create an account</a></p>
        </form>
      </div>
    </div>
    <script src="index.js"></script>
</body>
</body>
