<?php include("connexion/connexion.php"); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="icons/favicon.ico" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Gestion des locations</title>
    <style>
        body {
            background-image: linear-gradient(180deg, #FFFFFF, #C1E6FF);
            background-image: url("images/background1.png");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
</head>

<body>
    <?php include("header.php"); ?>

    <div class="container-fluid">
        <div class="container main">

            <!--TEST-->

            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/img3.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="images/img2.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="images/img1.png" class="d-block w-100" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>


            <!--TEST-->
            <div class="center">
                <div class="row mt-3 mb-3">
                    <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                        <div class="card" style="width: 18rem;">
                            <img src="images/car1.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Ford Raptor</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk
                                    of the card's content.</p>
                                <!--<a href="#" class="btn btn-primary">Consulter</a>-->
                            </div>
                        </div>
                    </article>

                    <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                        <div class="card" style="width: 18rem;">
                            <img src="images/car2.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Tesla modele X</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk
                                    of the card's content.</p>
                                <!--<a href="#" class="btn btn-primary">Consulter</a>-->
                            </div>
                        </div>
                    </article>

                    <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                        <div class="card" style="width: 18rem;">
                            <img src="images/car3.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Jeep</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk
                                    of the card's content.</p>
                                <!--<a href="#" class="btn btn-primary">Consulter</a>-->
                            </div>
                        </div>
                    </article>
                </div>

            </div>

            <!-- TEST 2 -->
            
        </div>
        <?php include("footer.php"); ?>

</body>

<script src="jquery/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</html>