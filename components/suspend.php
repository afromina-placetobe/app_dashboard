<?php
include_once('../Constants/connection.php');

$eventId = $_GET["event_id"];

$ApproveEvent = "UPDATE events SET event_status = '0' WHERE event_id = '$eventId'";
$commitApproval = mysqli_query($conn, $ApproveEvent);
if($commitApproval){
    header("location: ../dashboard.php");
}
else {
    echo "there is error";
}

?>