<?php
include_once("connection/session_start.php");

if(isset($_SESSION['UserLogin'])) {
   echo "Welcome po ".$_SESSION['UserLogin'];
}else{
   echo "Welcome Guest";
}
// var_dump($_SESSION);
include_once("connection/connection.php");


$con = connection();
$search = $_GET['search'];
$sql = "SELECT * FROM student_list WHERE first_name LIKE '$search%' ORDER BY id DESC"  ;  
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
    <h1>student mangement</h1>
    <br>
    <br>

    <form action="result.php" method="get">
        <input type="search" name="search" id="search">
        <button type="submit" >Search</button>
    </form>


    <?php if(isset($_SESSION['UserLogin'])){?>
    <a href ="logout.php"> logout</a>


   <?php }else{ ?>
    <a href ="login.php"> login</a>
    <?php } ?>
    <a href ="add.php"> add</a>

    <table>
       <thead>
            <tr>
                <th></th>
                <th>First name</th>
                <th>Last name</th>
            </tr>
       </thead>
       <tbody>
           <?php do{?>
            <tr>
                <td><a href="details.php?ID=<?php echo $row['id'];?>">View</a></td>
                <td><?php echo $row['first_name'];?></td>
                <td><?php echo $row['last_name'];?></td>
                
            </tr>
            <?php }while($row = $students -> fetch_assoc());?>
        </tbody> 
    </table>
</body>
</html>