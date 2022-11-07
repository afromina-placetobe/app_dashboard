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
    <link style type="text/css" href="./CSS/index.css" rel="styleSheet" />
</head>

<body>
    <div class="col-sm-4  p-2 ">
        <?php
                 include('./Constants/connection.php');
              
                 $status = 0;
                 $pendingQueries = "SELECT COUNT(*) FROM events WHERE event_status = '$status'";
                 $commitPendingQueries = mysqli_query($conn, $pendingQueries);
                 $pendingEvents = mysqli_fetch_assoc($commitPendingQueries);
                 $pendingCounts = implode( "",$pendingEvents);
                 ?>
        <p class="fw-bold align-middle bg-warning p-2 rounded" id="pending">Pending Events <span class="badge bg-danger">
                <?php echo $pendingCounts ?></span> </p>
        <div id="pending">
            <table class="table   table-striped">
                <thead class="bg-light">
                    <tr>
                        <th class="text-black">Event Name</th>
                      
                        <th class="text-black">Added Date</th>

                        <th class="text-black">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
include('./Constants/connection.php');

$status = 0;
$sqlQueries = "SELECT * FROM events WHERE event_status = '$status' ORDER BY addedDate ASC ";
$commitsqlQueries = mysqli_query($conn, $sqlQueries);

$row = mysqli_num_rows($commitsqlQueries);
if($row > 0){

  while($featchEvents = mysqli_fetch_assoc($commitsqlQueries)){

?>
                    <tr id="item_row">
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-3">
                                    <p class="mb-1"><?php echo $featchEvents["event_name"]; ?></p>
                                </div>
                            </div>
                        </td>
                     
                        <td>
                            <p class="fw-normal mb-1"><?php echo $featchEvents["addedDate"]; ?></p>
                        </td>

                        <td>
                            <li class="nav-item dropdown  rounded border-0 btn-success text-center fw-normal ">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    View
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item text-success"
                                            href="./pages/EditEvent.php?event_id=<?php echo $featchEvents["event_id"] ?>">View</a>
                                    </li>
                                    <li><a class="dropdown-item text-primary"
                                            href="./components/Approve.php?event_id=<?php echo $featchEvents["event_id"] ?>">Approve</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-danger"
                                            href="./components/DeclineEvents.php?event_id=<?php echo $featchEvents["event_id"] ?>">Decline</a>
                                    </li>
                                </ul>
                            </li>
                        </td>
                        <td>

                        </td>
                    </tr>

                    <?php
     }
    }
    else {
      echo "no events";
    }
    ?>

                </tbody>
            </table>
        </div>
    </div>


</body>

</html>