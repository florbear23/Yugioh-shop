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
$sql = "SELECT * FROM person_buyer WHERE card_name <>  buyer_name LIKE '%$search%' ORDER BY id DESC"  ;  
$buyer = $con -> query($sql) or die ($con->error);
$row = $buyer -> fetch_assoc();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css"></link>
    <title>Yugioh System Shop</title>
</head>
<body>
    <br>
    <h1>Yugioh System Shop</h1>
    <br>
    <div class="container">
        <br>
        <br>
        <div class="sidenav">
            <a href="index.php">DashBoard</a>
            <?php if (isset($_SESSION['UserLogin'])) { ?>
                <a href="logout.php"> logout</a>
            <?php } else { ?>
                <a href="login.php"> login</a>
            <?php } ?>
            <a href="add.php"> add</a>
        </div>

        <div class="main">
            <div class="search">
                <form action="result.php" method="get">
                    <input type="search" name="search" id="search">
                    <button type="submit">Search</button>
                </form>
            </div>
            <br>
            <table class="table-b">
                <thead>
                    <tr>
                        <th></th>
                        <th>Card Name</th>
                        <th>Card Code</th>
                        <th>Price</th>
                        <th>Buyer Name</th>
                        <th>Cell No.</th>
                        <th>Date</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php do { ?>
                        <tr>
                            <td><a href="details.php?ID=<?php echo $row['id']; ?>">View</a></td>
                            <td><?php echo $row['card_name']; ?></td>
                            <td><?php echo $row['card_code']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo $row['buyer_name']; ?></td>
                            <td><?php echo $row['cellphone']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                        </tr>
                    <?php } while ($row = $buyer->fetch_assoc()); ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>