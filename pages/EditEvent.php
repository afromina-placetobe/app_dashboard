<!doctype html>
<html lang="en">

<head>
    <title></title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/app/assets/css/app.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="./js/main.js" rel="javascript"></script>
    <link style type="text/css" href="../CSS/index.css" rel="styleSheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>

    <div class="container shadow-lg rounded pv-2 pt-0 mt-3 mb-3">

        <div class="row  bg-warning rounded-top pt-3 pb-3">
            <p class="fw-bold fs-5 "> Event Details</p>
        </div>

        <?php 
     include_once('../Constants/connection.php');

     $location = "http://localhost/p2b-app/assets/";
    $EventId= $_GET['event_id'];

    $QuerySelector = "SELECT * FROM events WHERE event_id = '$EventId' LIMIT 1";
    $commitQuery = mysqli_query($conn, $QuerySelector);
    $row = mysqli_num_rows($commitQuery);
    if($row > 0){
      While($fetchInfo = mysqli_fetch_assoc($commitQuery) ){
      
    ?>


        <div class="row m-4 ">
            <div class="col-sm-1"></div>
            <div class="col-sm-5">

                <form class="form-outline">
                    <div class="row m-2"></div>
                    <div class=" text-center p-5 pt-1 pb-1 featuredImage">

                        <img src="<?php echo $location.$fetchInfo["event_image"]; ?>" class="rounded mx-auto "
                            width="100%" height="100%" alt="Feature image" />
                    </div>
                    <br />
                    <div class="row">
                        <div class="input-group ">
                            <input type="file" class="form-control" id="inputGroupFile02">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>

                        <p class="mt-2 col "><span class="text-Inverse fw-bold">Event Name</span>
                            <input type="text" class="form-control" placeholder="Event Name"
                                value="<?php echo $fetchInfo["event_name"] ?>" />
                        </p>

                    </div>

                    <div class="row">
                        <p><span class="text-Inverse fw-bold">Event Description </span>
                            <textarea class="form-control"
                                rows="4"><?php echo $fetchInfo["event_description"] ?></textarea>
                        </p>
                    </div>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-4">
                <div class="row ">
                    <p><span class="text-Inverse fw-bold col">Event Status </span>

                        <?php if($fetchInfo["event_status"] == 1){
                              echo "<span class='text-success p-1 rounded ' > Published  </span>";
                        }
                        else if($fetchInfo["event_status"] == 2){
                          echo "<span class='bg-decline p-2' > Decline  </span>";
                        }
                        else {
                          echo "<span class='text-secondary p-2' > Pending  </span>";
                        } ?>

                    </p>
                </div>
                <div class="row">
                    <p class="col"><span class="text-inverse fw-bold">Added Date</span>
                        <input type="date" class="form-control" value="<?php echo $fetchInfo["addedDate"] ?>"></input>
                    </p>
                </div>

                <div class="row">
                    <p class="col"><span class="text-inverse fw-bold">Start Date</span>
                        <input type="date" class="form-control" value="<?php echo $fetchInfo["start_date"] ?>"></input>
                    </p>
                    <p class="col"><span class="text-inverse fw-bold">End Date </span>
                        <input type="date" class="form-control" value="<?php echo $fetchInfo["end_date"] ?>"></input>
                    </p>
                </div>

                <div class="row">

                    <p class="col"><span class="text-inverse fw-bold">Start Time </span>
                        <input type="text" class="form-control" value="<?php echo $fetchInfo["start_time"] ?>">
                    </p>
                    <p class="col"><span class="text-Inverse fw-bold">End Time </span>
                        <input type="text" class="form-control" value="<?php echo $fetchInfo["end_time"] ?>">
                    </p>
                </div>

                <div class="row">
                    <p><span class="text-Inverse fw-bold">Category</span><span><select
                                class="m1-4 col-sm-12 form-control">

                                <option selected><?php echo $fetchInfo["category"] ?> </option>
                                <option>Community</option>
                                <option>Cinema & Theatre</option>
                                <option>Nightlife</option>
                                <option>Entertainment</option>
                                <option>Travelling</option>
                                <option>Trade Fairs & Expo</option>
                                <option>Professional</option>
                                <option>Shopping</option>
                                <option>Sport</option>
                                <option>Others</option>

                            </select></span></p>
                </div>

                <div class="row">
                    <p class="col"><span class="text-inverse fw-bold">Event Organizer </span>
                        <input type="text" class="form-control" placeholder="Enter Event Organizer"
                            value="<?php echo $fetchInfo["event_organizer"] ?>" />
                    </p>
                </div>
                <div class="row">
                    <p class="col"><span class="text-inverse fw-bold">Event Address </span>
                        <input type="text" class="form-control " placeholder="Enter Event Address"
                            value="<?php echo $fetchInfo["event_address"] ?>" />
                    </p>
                </div>
                <div class="row">
                    <p class="col"><span class="text-Inverse fw-bold">Event Entrance Fee </span>
                        <input type="number" class="form-control " placeholder="Enter Event Entrance fee"
                            value="<?php echo $fetchInfo["event_entrance_fee"] ?>" />
                    </p>

                </div>

                <div class="row">
                    <p class="col">
                        <span class="text-Inverse fw-bold">Latitude: </span>
                        <input type="number" class="form-control" placeholder="Map latitude"
                            value="<?php echo $fetchInfo["address_latitude"] ?>" />
                    </p>
                    <p class="col"><span class="text-Inverse fw-bold">Longitude: </span>
                        <input type="number" class="form-control " placeholder="Map longitude"
                            value="<?php echo $fetchInfo["address_latitude"] ?>" />
                    </p>
                </div>
                </form>

                <div class="row">
                    <p class="col"><span class="text-inverse fw-bold">Phone Number </span>
                        <input type="text" class="form-control " placeholder="User phone"
                            value="<?php echo $fetchInfo["contact_phone"] ?>" />
                    </p>
                </div>
                <div class="row">
                    <p class="col"><span class="text-inverse fw-bold">Links </span>
                        <input type="text" class="form-control " placeholder="Redirection Link"
                            value="<?php echo $fetchInfo["redirectUrl"] ?>" />
                    </p>
                </div>
                <div class="modal-footer ">

                    <?php
                     echo "<div class=' col-sm-10 m-1  d-flex justify-content-evenly '>";
                     if($fetchInfo["event_status"] == 1){
                     
                              echo "<a class='dropdown-item text-success' href='../components/suspend.php?event_id=" .$fetchInfo["event_id"]."' ><i class='bi bi-exclamation'></i> Suspend</a>";
                              echo "<a class='btn btn-outline-danger btn-sm' href='../components/Approve.php?event_id=".$fetchInfo['event_id']."'> <i class='bi bi-exclamation-triangle'></i> Decline</a>";
                              echo "<a class='dropdown-item text-secondary' href='../dashboard.php'>Back</a>";
                             
                        }
                        else if($fetchInfo["event_status"] == 2){
                          echo "<span class='bg-decline p-2' > Decline  </span>";
                        }
                        else {
                        echo "<a class='btn btn-outline-success btn-sm' href='../components/Approve.php?event_id=".$fetchInfo['event_id']."'>Approve</a>";
                         
                          echo "<a class='dropdown-item text-danger' href='../components/DeclineEvents.php?event_id=" .$fetchInfo['event_id']."'>Decline</a>";
                          echo "<a class='dropdown-item text-secondary' href='../dashboard.php'>Back</a>";
                        }
                        echo "</div>"; ?>


                </div>
            </div>
            <div class="row m-2   p-1">

            </div>
            <?php
     
    }
  }
  else {
    echo "Event not Found";
  }

?>
        </div>
</body>

</html>