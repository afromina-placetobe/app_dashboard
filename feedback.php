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
    <div class="card card-body container" id="feedback">
        <div>
        <p class="fw-bolder  fs-5" >Feedback</p>
        </div>
        <div class="accordion accordion-flush" id="<?php echo $userfeedback["id"] ?>">
        <div class="accordion-item">
            <?php

include('./Constants/connection.php');

$sqlQueries = "SELECT * FROM feedback";
$commitsqlQueries = mysqli_query($conn, $sqlQueries);

$row = mysqli_num_rows($commitsqlQueries);
if($row > 0){

  while($userfeedback = mysqli_fetch_assoc($commitsqlQueries)){


?>
 
           
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        <span class="fw-bold text-warning"><?php echo $userfeedback["name"] ?>
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                    data-bs-parent="#<?php echo $userfeedback["id"] ?>">
                    <div class="accordion-body">

                        <?php echo $userfeedback["comment"] ?>
                        <p class="fw-bold"><?php echo $userfeedback["email"] ?></p> <span> <?php echo $userfeedback["comment_date"] ?></span>
                    </div>
                </div>
          
         
            <?php
     }
     ?>
</div>
</div>
     <?php
    }
    else {
      echo "No Users";
    }
    ?>


    </div>
</body>

</html>