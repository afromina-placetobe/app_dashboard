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

    <div class="container shadow-lg rounded pv-2 pt-0 mt-3 mb-3  " id="userDetailContainer">

        <div class="row  bg-warning rounded-top pt-2 pb-2">
            <p class="fw-bold fs-5 "><i class="bi bi-person-badge"></i> User information</p>
        </div>

        <?php 
     include_once('../Constants/connection.php');

     $location = "http://localhost/p2b-app/assets/";
    $userId= $_GET['id'];

    $QuerySelector = "SELECT * FROM users WHERE userId = '$userId' LIMIT 1";
    $commitQuery = mysqli_query($conn, $QuerySelector);
    $row = mysqli_num_rows($commitQuery);
    if($row > 0){
      While($fetchInfo = mysqli_fetch_assoc($commitQuery) ){
      
    ?>


        <div class="row m-4 ">
            <div class="col-sm-1"></div>
            <div class="col-sm-4">

                
                    <div class="row m-2"></div>
                    <div class=" p-5 pt-1 pb-1 featuredImage">

                        <img src="<?php echo $location.$fetchInfo["profile"]; ?>" class="rounded mx-auto " width="100%"
                            height="80%" alt="Feature image" />
                   
                <div class="m-4"></div>
                    <p class="mt-2 col "><i class="bi bi-suit-spade"></i>
                        <span class="text-Inverse fw-bolder text-success ">Id: </span>
                        <span><?php echo $fetchInfo["userId"] ?></span>
                    </p>
                    <p ><i class="bi bi-shield-check"></i>
                        <span class="text-Inverse fw-bolder text-success ">Google Id: </span>
                        <span><?php echo $fetchInfo["google_Id"] ?></span>
                    </p>
            </div>
            </div>

            <div class="col-sm-6">
                <div class="row">
                      
                <?php
                if($fetchInfo["status"] == 0){
                    echo "<p class='text-success ' ><i class='bi bi-check-circle'></i> <span  >Active</span></p>";
                }
                else{
                    echo "<span>Suspended</span>";
                }

                ?>
              
                    <p ><i class="bi bi-person"></i> <span
                            class="text-Inverse fw-bolder text-primary "> Name: </span>
                        <span><?php echo $fetchInfo["first_name"] ?></span>
                        <span><?php echo $fetchInfo["middle_name"] ?></span>
                        <span><?php echo $fetchInfo["last_name"] ?></span>
                    </p>


                    <p><i class="bi bi-person-check"></i>
                        <span class="text-Inverse fw-bolder text-primary ">Username: </span>
                        <span><?php echo $fetchInfo["username"] ?></span>
                    </p>
                    <p><i class="bi bi-envelope"></i>

                        <span class="text-Inverse fw-bolder text-primary "> Email: </span>
                        <span><?php echo $fetchInfo["email"] ?></span>
                    </p>


                    <p><i class="bi bi-gender-ambiguous"></i> <span class="text-Inverse fw-bolder text-primary ">Gender:
                        </span>
                        <span><?php echo $fetchInfo["gender"] ?></span>
                    </p>
                    <p class="col"><i class="bi bi-calendar2-check"></i> <span class="text-Inverse fw-bolder text-primary ">Birth Date</span>
                        <input type="date" class="form-control" value="<?php echo $fetchInfo["birthdate"] ?>"></input>
                    </p>
                    <p><i class="bi bi-bookmark-star"></i> <span class="text-Inverse fw-bolder text-primary ">Category:
                        </span>
                        <span><?php echo $fetchInfo["category"] ?></span>
                    </p>

                    <p><i class="bi bi-phone"></i> <span class="text-Inverse fw-bolder text-primary ">Phone:
                        </span>
                        <span><?php echo $fetchInfo["phone"] ?></span>
                    </p>
                </div>
            </div>
        </div>
    


        <div class="modal-footer">
            <?php if($fetchInfo["status"] == 1){
                      echo "<div class='row'>";
                            

                              echo "<a class='dropdown-item text-success' href='../components/Approve.php?event_id=".$fetchInfo['userId']."'>Unblock</a>";
                               
                              echo "<a class='dropdown-item text-secondary' href='../dashboard.php'>Back</a>";
                              echo "</div>";
                        }
                        else if($fetchInfo["userId"] == 2){
                          echo "<span class='bg-decline p-2' > Decline  </span>";
                        }
                        else {

                            echo "<div class='col-sm-2 m-3  d-flex justify-content-evenly'>";
                          echo "<span><a class='btn btn-outline-danger btn-sm' href='../components/DeclineEvents.php?event_id=" .$fetchInfo['userId']."'> <i class='bi bi-shield-x'></i> Block</a></span>";
                          echo "<span><a class='dropdown-item text-secondary' href='../dashboard.php'>Back</a></span>";
                          echo "</div>";
                        } ?>


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