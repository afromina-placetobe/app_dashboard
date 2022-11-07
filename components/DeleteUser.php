<?php
include_once('../Constants/connection.php');

$id = $_GET["id"];

$DeleteQuery = "DELETE FROM users WHERE userId = '$id'";
$commitDeleteQuery = mysqli_query($conn, $DeleteQuery);
if($commitDeleteQuery){
   header("location: ../dashboard.php");
}
else {
    echo "there is error";
}

?>
