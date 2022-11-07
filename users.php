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
    <div id="users" class="mt-3">
        <p class="fw-bolder  fs-5">Users</p>
        <table class="table align-middle mb-0 bg-white table-striped">
            <thead class="bg-light">
                <tr>
                    <th class="text-success">Id</th>
                    <th class="text-success">First Name</th>
                    <th class="text-success">Father Name</th>
                    <th class="text-success">Email</th>
                    <th class="text-success">Category</th>
                    <th class="text-success">Action</th>

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





$sqlQueries = "SELECT * FROM users limit  $start_from, $num_per_page";
$commitsqlQueries = mysqli_query($conn, $sqlQueries);

$row = mysqli_num_rows($commitsqlQueries);
if($row > 0){

  while($featchUsers = mysqli_fetch_assoc($commitsqlQueries)){


?>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="ms-3">
                                <p class="fw-normal mb-1"> <?php echo $featchUsers["userId"] ?> </p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1"><?php echo $featchUsers["first_name"] ?></p>
                    </td>
                    <td>
                        <p class="fw-normal mb-1"><?php echo $featchUsers["middle_name"] ?></p>
                    </td>
                    <td>
                        <p class="fw-normal mb-1"><?php echo $featchUsers["email"] ?></p>
                    </td>
                    <td>
                        <p class="fw-normal mb-1"><?php echo $featchUsers["category"] ?></p>
                    </td>
                    <td>
                        <!-- <button class="btn-sm  rounded border-0 btn-success fw-normal mb-1">Actions</button> -->
                        <a class="btn btn-outline-success  rounded text-center"
                            href="./pages/UserDetail.php?id=<?php echo $featchUsers["userId"] ?>">View</a></li>


                    </td>
                </tr>

                <?php
     }
    }
    else {
      echo "No Users";
    }
    ?>

            </tbody>
            </table>
            <?php
                        $pr_query = "SELECT * FROM users";
                           $pr_result = mysqli_query($conn,$pr_query);
                           $total_record =mysqli_num_rows($pr_result);
                           $total_page = ceil($total_record/$num_per_page);
                              ?>
                        <div class="justify-content-center mt-4 ">
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
    <div class="m-3 p-3 "></div>
</body>

</html>