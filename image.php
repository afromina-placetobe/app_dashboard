<!doctype html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/app/assets/css/app.css" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="./js/main.js" rel="javascript"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link style type="text/css" href="./CSS/index.css" rel="styleSheet"/>
    </head>
    
    <body>


<style>
    .pdf-thumb-box
{
display:inline-block !important;
position:relative !important; 
overflow: hidden;

}
.pdf-thumb-box-overlay {
    display:none;
}
.pdf-thumb-box a:hover .pdf-thumb-box-overlay {
    display:inline;
    text-align:center;
    position: absolute;

    transition: 0.2s ease, padding 0.8s linear;
    background-color: rgba(247, 221, 138, 0.8);
    color: #fff;
    width:100%;
    height:100%;
    text-shadow: 0 1px 2px rgba(0, 0, 0, .6);
}
.pdf-thumb-box-overlay span {
    position: relative;
    top: 50%;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
}

.edit{
    color: blue;
    font-size:1.5em;
    margin:1rem;
}

.view{
    color: green;
    font-size:1.5em;

}

.delete{
    color: red;
    font-size:1.5em;

}
</style>

<div class="container">
    <div class="col-md-4">
        <div class="pdf-thumb-box"> 
            <a href="#2013-Katalog">
                <div class="pdf-thumb-box-overlay">
                    <span class="fa-stack fa-lg">
                        <!-- <div class="row"></div> -->
                        <div >
                            <span width="200px" height="200px" class="mr-5"><i class="bi bi-eye-fill view"></i></span>
                            <span><i class="bi bi-pencil-square edit"></i></span>
                            <span><i class="bi bi-trash-fill delete"></i></span>
                        </div>
                        <!-- <div class="row"></div> -->
                    </span>
                </div>
                <img class="img-responsive" src="http://i.imgur.com/Cn1ev16.jpg" alt="2013 Genel Katalog">
            </a>
        </div>
        <div class="vertical-social-box"></div>
    </div>
</div>
</body>
</html>