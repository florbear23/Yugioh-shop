<?php
 
 

include_once("connection/connection.php");
$con = connection();



if (isset($_POST['submit'])) {

   $cardname = $_POST['card_name'];
   $cardcode = $_POST['card_code'];
   $buyername = $_POST['price'];
   $price = $_POST['buyer_name'];
   $cell = $_POST['cellphone'];
   $date = $_POST['date'];
   $status = $_POST['status'];
   
    

   $sql = "INSERT INTO `person_buyer`(`card_name`,`card_code`,`price`,`buyer_name`,`cellphone`,`date`,`status`)
   VALUES ('$cardname','$cardcode','$buyername','$price','$cell',' $date','$status')";

   $con->query($sql) or die ($con->error);

   echo header("Location:index.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>yugioh system</title>
    <link rel="stylesheet" href = "css/style.css"></link>
   
</head>
<body>
    <form action="" method="post">
        <label>Card Name </label>
        <input type="text" name="card_name" id="fistname"></input>

        <label>Card Code </label>
        <input type="text" name="card_code" id="lastname"></input>

        <label>price </label>
        <input type="text" name="price" id="fistname"></input>

        <label>Buyer Name </label>
        <input type="text" name="buyer_name" id="lastname"></input>
        <label>Cell No.</label>
        <input type="text" name="cellphone" id="fistname"></input>

        <label>Date </label>
        <input type="date" name="date" id="lastname"></input>

        <label>status </label>
        <select name="status" id="gender">

            <option value="Not Paid">Not Paid</option>
            <option value="Paid">Paid</option>

        </select>

        <input type="submit" name="submit" value="Submit Form" ></input>

    </form>
</body>
</html>