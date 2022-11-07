<?php
include_once('../Constants/connection.php');

$eventId = $_GET["event_id"];

$declineEvent = "UPDATE events SET event_status = '2' WHERE event_id = '$eventId'";
$commitDecline = mysqli_query($conn, $declineEvent);
if($commitDecline){
    header("location: ../dashboard.php");
}
else {
    echo "there is error";
}

?>