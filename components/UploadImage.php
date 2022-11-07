<?php
include('../Constants/connection.php');
$location = "http://localhost/p2b-app/assets/";
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
    <link style type="text/css" href="./CSS/index.css" rel="styleSheet" />
    <script src="../js/main.js" crossorigin="anonymous" rel="javascript"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
</head>

<body>
    <div class="container">
        <div class="row">


            <div class="container ">
                <div class="row padding m-4 "></div>
                <div class="row">
                    <div class="col-sm-3"></div>

                    <div class="col-sm-6 shadow rounded p-2 mb-4">
                        <form action="#" method="POST" enctype="multipart/form-data">

                            <div id="coverpage-label">
                                <label>
                                    <img src='<?php echo $location.$_GET["image"]; ?>' width="640px" height="200px"
                                        id="coverpage-placeholder" class="rounded" />
                                    <input type="file" name="coverpage" style="display: none;"
                                        onchange="displayCoverpage(this)" id="cover_page" />

                                </label>
                            </div>
                                    <?php 
                                     include_once('../Constants/connection.php');
                                                
                                     if(isset($_POST['submit']))
                                     {
                                         $image = time() .'_'. $_FILES['coverpage']['name'];
                                         $target ='../../p2b-app/assets/'.$image;
                                         if(move_uploaded_file($_FILES['coverpage']['tmp_name'],$target)){
                                           echo "<p class='fs-6  text-success '><i class='bi bi-check-circle'></i> Image successfully uploaded on server</p>"; 
                                         }
                                        
                                         $itemId = $_GET["id"];
                                          
                                         $Queries = "UPDATE featured_events SET image = '$image' WHERE id='$itemId'; ";
                                         $commitQueries = mysqli_query($conn, $Queries);
                                     
                                         if($commitQueries){
                                             echo "<p class='fs-6  text-success '><i class='bi bi-check-circle'></i> Successfully saved to database</p>";
                                         }
                                         else {
                                             echo "<p class='fs-4  text-dander '> <i class='bi bi-info-circle'></i> Not Updated</p>";
                                         }
                                     }
                                     
                                     mysqli_close($conn);
                                    ?>
                                     
                            <div class="col-sm-10 m-3  d-flex justify-content-evenly">
                            <span > <a class='btn btn-secondary btn-sm  form-text'
                                        href='../dashboard.php'>Back</a></span>
                                <span class="btn btn-outline-primary btn-sm form-text" onclick="addCoverpage()">
                                    <i class="bi bi-arrow-repeat"></i> Change<span></span>
                                </span>
                                <span > </i><input type="submit" name="submit" value="Apply"
                                        class="btn btn-warning btn-sm form-text" /> </span>
                               
                            </div>

                        </form>

                       
                    </div>
                    <div class="col-sm-3"></div>
                </div>

            </div>
        </div>



</body>

</html>