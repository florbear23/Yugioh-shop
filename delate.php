<?php
include_once("connection/connection.php");
$con = connection();

if (isset($_POST['delate'])) {
    $id = $_POST['ID'];
    $sql = "DELETE FROM person_buyer WHERE id = '$id'";
    $con->query($sql) or die ($con->error);
    echo header("Location:index.php");
}







?>