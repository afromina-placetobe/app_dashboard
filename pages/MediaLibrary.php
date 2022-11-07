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

    <div class="container">
        <div class="row">
            <div class="fs-5 fw-bolder m-3">Header Crousel Image</div>
        </div>
        <div class="row">
            <?php
include_once('../Constants/connection.php');

$location = "http://localhost/p2b-app/assets/";
$FeaturedImage = "SELECT * FROM featured_events ORDER BY added_date DESC";
$commitQuery = mysqli_query($conn, $FeaturedImage);
$row = mysqli_num_rows($commitQuery);


if($row > 0){
    while($featchImage = mysqli_fetch_assoc($commitQuery)){
           
?>
            <div class="col-sm-3 bg-light rounded shadow-sm p-1">
                <img src="<?php echo $location.$featchImage["image"]; ?>" class="img-fluid rounded mx-auto d-block"
                    alt="headerImage">
            </div>

            <?php
    }
}
else {
    echo "There is no Header Image";
}

            ?>
        </div>
    </div>



</body>

</html>