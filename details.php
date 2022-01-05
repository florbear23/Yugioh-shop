<?php
include_once("connection/session_start.php");
// var_dump($_SESSION["Access"]);


if ($_SESSION["Access"] == "user") {
    echo header("Location:index.php");
} elseif ($_SESSION["Access"] == 'admin') {
    echo "Ako po Ay " .  $_SESSION['UserLogin'] . "<br/>" . "<br/>";
} else {
    echo header("Location:index.php");
}

include_once("connection/connection.php");

$id = $_GET["ID"];




$con = connection();
$sql = "SELECT * FROM person_buyer WHERE id='$id'";
$buyer = $con->query($sql) or die($con->error);
$row = $buyer->fetch_assoc();



?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
    <link rel="stylesheet" href = "css/style.css"></link>
   
</head>
<body>
    
    <form action="delate.php" method="post">
    <a href="index.php"><-back</a>
    <a href="edit.php?ID=<?php echo $row['id']; ?>">Edit</a>   
    <button  type="submit" name="delate">Delate</button>
    <input type="hidden" name="ID" value="<?php echo $row['id']; ?>">
    </form>

    
    <br>
   <h2><?php echo $row['card_name']; ?> <?php echo $row['buyer_name']; ?></h2> 
   <P> ang kasarian ko ay: <?php echo $row['status']; ?></P>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/details.css">
    <title>details</title>
</head>

<body>
    <div class="sidenav">
        <a href="index.php">DashBoard</a>
    </div>
    <div class="main">
        <h1 style="text-align: center;">Details</h1>
        <div class="container">
            <div class="details-div">
                <label for="">Card Name</label>
                <h2><?php echo $row['card_name']; ?></h2>
            </div>
            <div class="details-div">
                <label for="">Card code</label>
                <h2><?php echo $row['card_code']; ?></h2>
            </div>
            <div class="details-div">
                <label for="">Price</label>
                <h2><?php echo $row['price']; ?></h2>
            </div>
            <div class="details-div">
                <label for="">Buyer Name</label>
                <h2><?php echo $row['buyer_name']; ?></h2>
            </div>
            <div class="details-div">
                <label for="">cellphone No.</label>
                <h2><?php echo $row['cellphone']; ?></h2>
            </div>
            <div class="details-div">
                <label for="">Date</label>
                <h2><?php echo $row['date']; ?></h2>
            </div>
            <div class="details-div">
                <label for="">Status</label>
                <h2><?php echo $row['status']; ?></h2>
            </div>
            <form class="details-div2" action="delate.php" method="post">
                <button class="edit"> <a href="edit.php?ID=<?php echo $row['id']; ?>">Edit</a></button>
                <button class="edit2" type="submit" name="delate">Delate</button>
                <input type="hidden" name="ID" value="<?php echo $row['id']; ?>">
            </form>
        </div>

    </div>
</body>

</html>