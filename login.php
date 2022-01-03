<?php
 include_once("connection/session_start.php");
 
include_once("connection/connection.php");


$con = connection();

if(isset($_POST['login'])){
   $username = $_POST['username'];
   $password = $_POST['password'];

   $sql = "SELECT * FROM shop_admin WHERE username = '$username' AND password = '$password'";

  $user = $con->query($sql) or die ($con->error);
  $row = $user->fetch_assoc();
  $total = $user->num_rows;

  if ($total > 0) {
      $_SESSION['UserLogin'] = $row['username']; 
      $_SESSION['Access'] = $row['access'];

     echo header("Location: index.php");
  }else{
      echo "no username found";
  }
}
 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student manegement system</title>
    <link rel="stylesheet" href = "css/style.css"></link>
   
</head>
<body>
   <h1>Login Form</h1>
   <br>
   <form action="" method="post">
   <label >User Name</label>
   <input type="text" name="username" id="username">
   <label >password</label>
   <input type="password" name="password" id="password">
   <button type="submit" name="login">Log-in</button>
   </form>
</body>
</html>