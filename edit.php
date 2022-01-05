<?php

include_once("connection/session_start.php");

include_once("connection/connection.php");
$con = connection();

$id = $_GET['ID'];




$con = connection();
$sql = "SELECT * FROM person_buyer WHERE id ='$id'";
$buyer = $con->query($sql) or die($con->error);
$row = $buyer->fetch_assoc();



if (isset($_POST['submit'])) {

    $cardname = $_POST['card_name'];
    $cardcode = $_POST['card_code'];
    $price = $_POST['price'];
    $buyername = $_POST['buyer_name'];

    $cell = $_POST['cellphone'];
    $date = $_POST['date'];
    $status = $_POST['status'];


    $sql = "UPDATE  person_buyer SET card_name = '$cardname', card_code = '$cardcode', price = '$price', buyer_name = '$buyername', cellphone = '$cell', date = '$date',  status = '$status' WHERE id = '$id'";

    $con->query($sql) or die($con->error);

    echo header("Location:details.php?ID= " . $id);
}


?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student manegement system</title>
    <link rel="stylesheet" href = "css/view.css"></link>
    <link rel="stylesheet" href="css/edit.css">
   
</head>
<body>



<form action="" method="post">
        <label>Card Name </label>
        <input type="text" name="card_name" id="fistname" value="<?php echo $row['card_name']; ?>"></input>

        <label>Card Code </label>
        <input type="text" name="card_code" id="lastname" value="<?php echo $row['card_code']; ?>"></input>

        <label>price </label>
        <input type="text" name="price" id="fistname" value="<?php echo $row['price']; ?>"></input>

        <label>Buyer Name </label>
        <input type="text" name="buyer_name" id="lastname" value="<?php echo $row['buyer_name']; ?>"></input>
        <label>Cell No.</label>
        <input type="text" name="cellphone" id="fistname" value="<?php echo $row['cellphone']; ?>"></input>

        <label>Date </label>
        <input type="date" name="date" id="lastname" value="<?php echo $row['date']; ?>"></input>

        <label>status </label>
        <select name="status" id="gender">

            <option value="Not Paid" <?php echo ($row['status'] == "Not Paid") ? 'selected' : ''; ?>>Not Paid</option>
            <option value="Paid" <?php echo ($row['status'] == "Paid") ? 'selected' : ''; ?>>Paid</option>

        </select>

        <input type="submit" name="submit" value="UPDATE" ></input>

    </form>
    
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/edit.css">
    <link rel="stylesheet" href="./css/details.css">
    <link rel="stylesheet" href="./css/add.css">
    <title>edit</title>
</head>

<body>
    <div class="sidenav">
        <a href="index.php">DashBoard</a>
    </div>
    <div class="main">
        <h1 style="text-align: center;">Edit</h1>

        <form action="" method="post" class="add-form">
            <div class="form-div">
                <label>Card Name </label>
                <input type="text" name="card_name" id="fistname" value="<?php echo $row['card_name']; ?>"></input>
            </div>
            <div class="form-div">
                <label>Card Code </label>
                <input type="text" name="card_code" id="lastname" value="<?php echo $row['card_code']; ?>"></input>
            </div>
            <div class="form-div">
                <label>price </label>
                <input type="text" name="price" id="fistname" value="<?php echo $row['price']; ?>"></input>
            </div>
            <div class="form-div">
                <label>Buyer Name </label>
                <input type="text" name="buyer_name" id="lastname" value="<?php echo $row['buyer_name']; ?>"></input>
                
            </div>
            <div class="form-div">
                <label>Cell No.</label>
                <input type="text" name="cellphone" id="fistname" value="<?php echo $row['cellphone']; ?>"></input>
            </div>
            <div class="form-div">
                <label>Date </label>
                <input type="date" name="date" id="lastname" value="<?php echo $row['date']; ?>"></input>
            </div>

            <div class="form-div">
                <label>status </label>
                <select name="status" id="gender">

                    <option value="Not Paid" <?php echo ($row['status'] == "Not Paid") ? 'selected' : ''; ?>>Not Paid</option>
                    <option value="Paid" <?php echo ($row['status'] == "Paid") ? 'selected' : ''; ?>>Paid</option>

                </select>
            </div>
            <div class="form-div2">
                <input type="submit" name="submit" value="UPDATE"></input>
            </div>
        </form>
    </div>


</body>

</html>