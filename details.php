<?php
include_once("connection/session_start.php");
// var_dump($_SESSION["Access"]);


if ($_SESSION["Access"] == "user") {
    echo header("Location:index.php");
}elseif($_SESSION["Access"] == 'admin'){
   echo "Ako po Ay ".  $_SESSION['UserLogin']."<br/>"."<br/>";
}else{
    echo header("Location:index.php");
}

include_once("connection/connection.php");

$id = $_GET["ID"];




$con = connection();
$sql = "SELECT * FROM person_buyer WHERE id='$id'"  ;  
$students = $con -> query($sql) or die ($con->error);
$row = $students -> fetch_assoc();



   
 


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
    
    <form action="delate.php" method="post">
    <a href="index.php"><-back</a>
    <a href="edit.php?ID=<?php echo $row['id'];?>">Edit</a>   
    <button  type="submit" name="delate">Delate</button>
    <input type="hidden" name="ID" value="<?php echo $row['id'];?>">
    </form>

    
    <br>
   <h2><?php echo $row['card_name'];?> <?php echo $row['buyer_name'];?></h2> 
   <P> bayad Naba ito: <?php echo $row['status'];?></P>
</body>
</html>