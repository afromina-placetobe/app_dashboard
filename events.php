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



    <div class="col-sm-8 p-2">
        <div class=" tab-pane tab-content" role="tabpanel" id="event">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <?php
                 include('./Constants/connection.php');
                 $today = date("Y-m-d");
                 $status = 1;
                 $happenignCountQueries = "SELECT COUNT(*) FROM events WHERE start_date <= '$today' and  end_date >= '$today'  and event_status = '$status'";
                 $commithappeningCount = mysqli_query($conn, $happenignCountQueries);
                 $happenings = mysqli_fetch_assoc($commithappeningCount);
                 $happeningCounts = implode( "",$happenings);
                 ?>

                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                        type="button" role="tab" aria-controls="home" aria-selected="true">Happening <span
                            class="badge bg-danger">
                            <?php echo $happeningCounts ?></span></button>
                </li>

                <li class="nav-item" role="presentation">
                    <?php
                 include('./Constants/connection.php');
                 $s=strtotime("tomorrow");
                 $today = date("Y-m-d", $s);
                 $e=strtotime("next sunday");
                 $lastDate = date("Y-m-d", $e);
                 $status = 1;
                 $thisWeekQueries = "SELECT COUNT(*) FROM events WHERE start_date >= '$today' and  end_date <= '$lastDate'  and event_status = '$status'";
                 $committhisweekQueries = mysqli_query($conn, $thisWeekQueries);
                 $thisweek = mysqli_fetch_assoc($committhisweekQueries);
                 $thisweek = implode( "",$thisweek);
                 ?>
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                        type="button" role="tab" aria-controls="contact" aria-selected="false">This week Events <span
                            class="badge bg-danger"> <?php echo $thisweek ?></span></button>
                </li>

                <li class="nav-item" role="presentation">
                    <?php
                 include('./Constants/connection.php');
                 $e=strtotime("next sunday");
                 $Sunday = date("Y-m-d", $e);
                 $status = 1;
                 $upcomingEventsQuery = "SELECT COUNT(*) FROM events WHERE start_date <= '$Sunday' and end_date >= '$Sunday' and event_status = '$status'";
                 $commitupcomingEventsQuery = mysqli_query($conn, $upcomingEventsQuery);
                 $upcoming = mysqli_fetch_assoc($commitupcomingEventsQuery);
                 $upcomingCounts = implode( "",$upcoming);
                 ?>
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                        type="button" role="tab" aria-controls="profile" aria-selected="false">Upcoming <span
                            class="badge bg-danger">
                            <?php echo $upcomingCounts ?></span></button>
                </li>

            </ul>

            <div class="tab-content" id="myTabContent">
                <!--happening Events Tab-->

                <div class="tab-pane fade show active pb-3" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <table class="table align-middle mb-3  bg-white table-striped">
                        <thead class="bg-light">
                            <tr>
                                <th class="text-black">Event Name</th>
                                <th class="text-black">Organizer</th>
                                <th class="text-black">Start Date</th>
                                <th class="text-black">End Date</th>

                                <th class="text-black">Action</th>
                            </tr>
                        </thead>
                        <tbody >
                            <?php
                                include('./Constants/connection.php');
                                if(isset($_GET['page'])){
                                    $page=$_GET['page'];
                                }
                                else{
                                    $page =1;
                                }
                                
                                $num_per_page = 10;
                                $start_from =(($page)-1)*10;

                                $today = date("Y-m-d");
                                $status = 1;
                                $sqlQueries = "SELECT * FROM events WHERE start_date <= '$today' and  end_date >= '$today'  and event_status = '$status'  ORDER BY addedDate ASC limit  $start_from, $num_per_page ";
                                $commitsqlQueries = mysqli_query($conn, $sqlQueries);
                                
                                $row = mysqli_num_rows($commitsqlQueries);
                                if($row > 0){
                                
                                  while($featchEvents = mysqli_fetch_assoc($commitsqlQueries)){
                            
                                ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="ms-3">
                                            <p class="mb-1"><?php echo $featchEvents["event_name"] ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1"><?php echo $featchEvents["event_organizer"] ?></p>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1"><?php echo $featchEvents["start_date"] ?></p>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1"><?php echo $featchEvents["end_date"] ?></p>
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
                                            <li><a class="dropdown-item text-secondary"
                                                    href="./components/suspend.php?event_id=<?php echo $featchEvents["event_id"]; ?>">Suspend</a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item text-danger"
                                                    href="./components/DeclineEvents.php?event_id=<?php echo $featchEvents["event_id"]; ?>">Decline</a>
                                            </li>
                                        </ul>
                                    </li>
                                </td>
                            </tr>

                            <?php
                               }
                              }
                              else {
                                echo "<p class='text-center'>There is No Event is Happening!</p>";
                              }
                              ?>

                        </tbody>
                        </table>
                        </div>
                        <?php
                        $pr_query = "SELECT * FROM events  WHERE start_date <= '$today' and  end_date >= '$today'  and event_status = '$status' ";
                           $pr_result = mysqli_query($conn,$pr_query);
                           $total_record =mysqli_num_rows($pr_result);
                           $total_page = ceil($total_record/$num_per_page);
                              ?>
                        <div class="justify-content-center  ">
                            <ul class="pagination justify-content-left ">
                                <?php
                                 if($page>1)
                                 {
                                     echo "<li><a class='active'  id='previous' href='dashboard.php?page=".($page-1)."'> Previous</a></li>";
                                 }
                                 for($i=1; $i<$total_page; $i++){
                                  echo "<li><a  href='dashboard.php?page=".$i."'>$i</a></li>";
                                 }
                                 if($i>$page)
                                 {
                                     echo "<li><a id='next'  href='dashboard.php?page=".($page+1)."'> Next</a></li>";
                                 }
                                     ?>
                      </ul>
                   
                </div>




                <!--? this week event-->
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th class="text-black">Event Name</th>
                                <th class="text-black">Organizer</th>
                                <th class="text-black">Start Date</th>
                                <th class="text-black">End Date</th>
                                <th class="text-black">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        include('./Constants/connection.php');

                        if(isset($_GET['page'])){
                            $page=$_GET['page'];
                        }
                        else{
                            $page =1;
                        }
                        
                        $num_per_page = 10;
                        $start_from =(($page)-1)*10;

                        $s=strtotime("tomorrow");
                        $today = date("Y-m-d", $s);
                        $e=strtotime("next sunday");
                        $lastDate = date("Y-m-d", $e);
                        $status = 1;
                        $sqlQueries = "SELECT * FROM events WHERE start_date >= '$today' and  end_date <= '$lastDate'  and event_status = '$status' ORDER BY start_date DESC";
                        $commitsqlQueries = mysqli_query($conn, $sqlQueries);

                        $row = mysqli_num_rows($commitsqlQueries);
                        if($row > 0){
                          while($featchEvents = mysqli_fetch_assoc($commitsqlQueries)){
                           ?>

                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="ms-3">
                                            <p class="mb-1"><?php echo $featchEvents["event_name"] ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1"><?php echo $featchEvents["event_organizer"] ?></p>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1"><?php echo $featchEvents["start_date"] ?></p>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1"><?php echo $featchEvents["end_date"] ?></p>
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
                                            <li><a class="dropdown-item text-secondary"
                                                    href="./components/suspend.php?event_id=<?php echo $featchEvents["event_id"]; ?>">Suspend</a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item text-danger"
                                                    href="./components/DeclineEvents.php?event_id=<?php echo $featchEvents["event_id"]; ?>">Decline</a>
                                            </li>
                                        </ul>
                                    </li>
                                </td>
                            </tr>
                            <?php
                                     }
                                    }
                                    else {
                                      echo "<p class='text-center'>No Event This Week!</p>";
                                    }
                                    ?>

                        </tbody>
                        </table>
                </div>
                        <?php
                                                        $pr_query = "SELECT * FROM events  WHERE start_date >= '$today' and  end_date <= '$lastDate'  and event_status = '$status'";
                                    $pr_result = mysqli_query($conn,$pr_query);
                                    $total_record =mysqli_num_rows($pr_result);
                                    $total_page = ceil($total_record/$num_per_page);
                                   ?>
                         <div class="justify-content-center  ">
                            <ul class="pagination justify-content-left ">
                                <?php
                                 if($page>1)
                                 {
                                     echo "<li><a class='active'  id='previous' href='dashboard.php?page=".($page-1)."'> Previous</a></li>";
                                 }
                                 for($i=1; $i<$total_page; $i++){
                                  echo "<li><a  href='dashboard.php?page=".$i."'>$i</a></li>";
                                 }
                                 if($i>$page)
                                 {
                                     echo "<li><a id='next'  href='dashboard.php?page=".($page+1)."'> Next</a></li>";
                                 }
                                     ?>
                      </ul>
                   
                </div>
                 



                <!--upcoming event-->
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th class="text-black">Event Name</th>
                                <th class="text-black">Organizer</th>
                                <th class="text-black">Start Date</th>
                                <th class="text-black">End Date</th>
                                <th class="text-black">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include('./Constants/connection.php');

                            if(isset($_GET['page'])){
                                $page=$_GET['page'];
                            }
                            else{
                                $page =1;
                            }
                            
                            $num_per_page = 10;
                            $start_from =(($page)-1)*10;


                            $e=strtotime("next sunday");
                            $Sunday = date("Y-m-d", $e);
                            $status = 1;
                            $sqlQueries = "SELECT * FROM events WHERE start_date <= '$Sunday' and end_date >= '$Sunday' and event_status = '$status' ORDER BY start_date DESC limit  $start_from, $num_per_page ";
                            $commitsqlQueries = mysqli_query($conn, $sqlQueries);
                            
                            $row = mysqli_num_rows($commitsqlQueries);
                            if($row > 0){
                            
                              while($featchEvents = mysqli_fetch_assoc($commitsqlQueries)){
                            ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="ms-3">
                                            <p class="mb-1"><?php echo $featchEvents["event_name"] ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1"><?php echo $featchEvents["event_organizer"] ?></p>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1"><?php echo $featchEvents["start_date"] ?></p>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1"><?php echo $featchEvents["end_date"] ?></p>
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
                                            <li><a class="dropdown-item text-secondary"
                                                    href="./components/suspend.php?event_id=<?php echo $featchEvents["event_id"]; ?>">Suspend</a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item text-danger"
                                                    href="./components/DeclineEvents.php?event_id=<?php echo $featchEvents["event_id"]; ?>">Decline</a>
                                            </li>
                                        </ul>
                                    </li>
                                </td>
                            </tr>


                            <?php
                               }
                              }
                              else {
                                echo "<p class='text-center'>No Upcoming Event!</p>";
                              }
                               ?>

                        </tbody>
                        </table>
                
                        <?php
                        $pr_query = "SELECT * FROM events  WHERE start_date <= '$Sunday' and end_date >= '$Sunday' and event_status = '$status' ";
                                    $pr_result = mysqli_query($conn,$pr_query);
                                    $total_record =mysqli_num_rows($pr_result);
                                    $total_page = ceil($total_record/$num_per_page);
                                ?>
                         <div class="justify-content-center  ">
                            <ul class="pagination justify-content-left ">
                                <?php
                                 if($page>1)
                                 {
                                     echo "<li><a class='active'  id='previous' href='dashboard.php?page=".($page-1)."'> Previous</a></li>";
                                 }
                                 for($i=1; $i<$total_page; $i++){
                                  echo "<li><a  href='dashboard.php?page=".$i."'>$i</a></li>";
                                 }
                                 if($i>$page)
                                 {
                                     echo "<li><a id='next'  href='dashboard.php?page=".($page+1)."'> Next</a></li>";
                                 }
                                     ?>
                      </ul>
                   
                </div>
                        </div>
            </div>
        </div>
    </div>




</body>

</html>