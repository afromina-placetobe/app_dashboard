<?php
include('./Constants/connection.php');

$location = "../p2b-app/assets/logo.png";

?>



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
    <link style type="text/css" href="./CSS/index.css" rel="styleSheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light text-white bg-warning sticky-top">
        <div class="container">
            <a class="navbar-brand " href="dashboard.php">
                <span class="pb-2 m-2 rounded  ">
                <img src="./assets/Favicon.png" alt="logo" width="50px" height="50px"
                    class="d-inline-block ">
</span>
              <span class="text-dark fw-bolder">  Place to be Ethiopia Dashboard</span>
            </a>
            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->
            <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div> -->
        </div>
    </nav>

    <!--left side bar-->

    <div class="container-fluid ">
        <div class="row">
            <div id="sidenav" class="col-sm-2 sidebar sticky-left">
                <div class="list-group list-group-flush mx-3 mt-4 collapse d-lg-block  collapse ">
                    <ul class="nav nav-tabs flex-column" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                            <a class="nav-link text-warning active" id="images-tab" onClick="headers()"
                                data-bs-toggle="tab" data-bs-target="#images" type="button" role="tab"
                                aria-controls="images" aria-selected="true"> <i class="bi bi-card-image"></i>
                                Header Slider</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-warning" id="event-tab" onClick="events()"
                                data-bs-toggle="tab" data-bs-target="#event" type="button" role="tab"
                                aria-controls="event" aria-selected="false"><i class="bi bi-calendar4-event"></i>
                                Events</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-warning" id="users-tab" onClick="users()" data-bs-toggle="tab"
                                data-bs-target="#users" type="button" role="tab" aria-controls="users"
                                aria-selected="false"><i class="bi bi-people"></i> Users</a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-warning" id="feedback-tab" onClick="feedback()" data-bs-toggle="tab"
                                data-bs-target="#feedback" type="button" role="tab" aria-controls="feedback"
                                aria-selected="false"> <i class="bi bi-chat-left-dots"></i> Feedback</a>
                        </li>
                        <!-- <li class="nav-item" role="presentation">
                            <a class="nav-link text-warning" id="gallery-tab" data-bs-toggle="tab"
                                data-bs-target="#gallery" type="button" role="tab" aria-controls="gallery"
                                aria-selected="false"> <i class="bi bi-images"></i> Media
                                Library</a>
                        </li> -->
                      
                    </ul>
                </div>
            </div>


            <!--main activity section -->

            <!--close feedback-->
            <!--the big close for page-->

            <div class="col-sm-9 ">
                <div class="row padding">
                    <span class="m-3"></span>
                </div>
                <div class="row text-center">
                    <div class="col-sm-1">
                    </div>

                    <div class="col-sm-3 shadow-sm  p-3 mb-3 bg-body rounded border border-warning">
                        <div class="card-body">

                            <?php
                                    include('./Constants/connection.php');
                                    $sqlQueries = "SELECT COUNT(*) FROM events WHERE event_status = 1";
                                    $commitsqlQueries = mysqli_query($conn, $sqlQueries);
                                    $events = mysqli_fetch_assoc($commitsqlQueries);
                                    $counts = implode( "",$events);
                                ?>

                            <h5 class="card-title "><?php echo $counts ?></h5>
                            <p class="card-text">Total Events</p>
                        </div>
                    </div>
                    <div class="col-sm-1">
                    </div>
                    <div class="col-sm-3 shadow-sm  p-3 mb-3 bg-body rounded border border-success">
                        <div class="card-body">
                            <?php
                                   include('./Constants/connection.php');

                                   $userCountQueries = "SELECT COUNT(*) FROM users";
                                   $commitUserCount = mysqli_query($conn, $userCountQueries);
                                   $users = mysqli_fetch_assoc($commitUserCount);
                                   $userCounts = implode( "",$users);

                                ?>
                            <h5 class="card-title "><?php echo $userCounts ?></h5>
                            <p class="card-text">Total Users</p>
                        </div>
                    </div>

                    <div class="col-sm-1">
                    </div>

                    <div class="col-sm-3 shadow-sm  p-3 mb-3 bg-body rounded border border-primary">

                        <div class="card-body">

                            <?php

                                  include('./Constants/connection.php');
                                  $feedbackCount = "SELECT COUNT(*) FROM feedback";
                                  $commitFeedback = mysqli_query($conn, $feedbackCount);
                                  $feedback = mysqli_fetch_assoc($commitFeedback);
                                  $feedbackcount = implode( "",$feedback);                            
                                  ?>

                            <h5 class="card-title "><?php echo $feedbackcount ?></h5>
                            <p class="card-text">Total Feedback</p>

                        </div>
                    </div>
                </div>


                <!-- header crousels -->
                <div class="container" >
                    <div class="row rounded shadow-sm m-1 "  id="images" role="tabpanel" aria-labelledby="images-tab">
                    <div class="fs-5 fw-bolder m-2">Header Crousel Image</div>
                        <?php
                                     include_once('./Constants/connection.php');
                                     
                                     $location = "http://localhost/p2b-app/assets/";
                                     $FeaturedImage = "SELECT * FROM featured_events ORDER BY added_date DESC";
                                     $commitQuery = mysqli_query($conn, $FeaturedImage);
                                     $row = mysqli_num_rows($commitQuery);
                                     
                                     
                                     if($row > 0){
                                         while($featchImage = mysqli_fetch_assoc($commitQuery)){
                                                
                                     ?>
                        <div class="col-sm-3 bg-light">
                            <div class="pdf-thumb-box">
                                <span>
                                    <div class="pdf-thumb-box-overlay mx-auto">
                                        <span class="fa-stack fa-lg">
                                            <!-- <div class="row"></div> -->
                                            <div>
                                               
                                                <a href="./components/UploadImage.php?image=<?php echo $featchImage["image"]; ?>&id=<?php echo $featchImage["id"]; ?>"
                                                    target="self"><span class=" bg-white text-primary rounded  p-1"><i
                                                            class="bi bi-arrow-repeat"></i></span></a>
                                               
                                            </div>
                                            <!-- <div class="row"></div> -->
                                        </span>
                                    </div>
                                    <img src="<?php echo $location.$featchImage["image"]; ?>"
                                        class="img-fluid rounded mx-auto d-block" alt="headerImage" />
                                </span>
                            </div>

                        </div>

                        <?php
                              }
                          }
                          else {
                              echo "There is no Header Image";
                          }
                          
                         ?>

                        <!--closing the first event tab-->
                    </div>
              
                <div class="m-3"></div>
                <!--events tab-->

                <div class="container shadow rounded" id="event" role="tabpanel" aria-labelledby="event-tab">
                    <div class="row">

                        <?php 
                      include('events.php');
                      ?>
                        <!--pending events-->
                        <?php 
                      include('pendingEvents.php');
                      ?>
                    </div>
                </div>

                <!-- users-->
                <div class="container shadow mt-0" id="users" role="tabpanel" aria-labelledby="users-tab">
                    <?php 
                       include('users.php');
                        ?>
                    <!--closing the first event tab-->
                </div>

                <!--second feedback -->
                <div class="tab-panel fade show active" role="tabpanel" aria-labelledby="feedback-tab" id="feedback">
                    <?php 
                         include('feedback.php');
                         ?>
                </div>


                <div class="m-2 p-2"></div>
            </div>

        </div>
        <div class="modal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewImageLabel" aria-hidden="true"
            id="viewImage">
            <div class="modal-dialog modal-dialog-centered">
                <img src="<?php echo $location.$_GET["image"]; ?>" class="img-fluid rounded mx-auto d-block"
                    alt="headerImage" />
            </div>
        </div>
</body>

</html>