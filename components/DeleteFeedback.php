<?php
include_once('../Constants/connection.php');

$id = $_GET["id"];

$DeleteQuery = "DELETE FROM feedback WHERE id = '$id'";
$commitDeleteQuery = mysqli_query($conn, $DeleteQuery);
if($commitDeleteQuery){
    echo "done";
}
else {
    echo "there is error";
}

?>
