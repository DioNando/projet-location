<?php include("connexion/connexion.php"); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Gestion des locations</title>
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

            <div class="row">
                <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                    <h4><a href="#">Titre 1</a></h4>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore non nesciunt nam dignissimos
                        officiis rem aspernatur esse nostrum aperiam dicta beatae dolores, libero veniam, dolorum iste
                        dolor necessitatibus, doloribus ut.
                    </p>
                </article>

                <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                    <h4><a href="#">Titre 2</a></h4>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore non nesciunt nam dignissimos
                        officiis rem aspernatur esse nostrum aperiam dicta beatae dolores, libero veniam, dolorum iste
                        dolor necessitatibus, doloribus ut.
                    </p>
                </article>

                <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                    <h4><a href="#">Titre 3</a></h4>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore non nesciunt nam dignissimos
                        officiis rem aspernatur esse nostrum aperiam dicta beatae dolores, libero veniam, dolorum iste
                        dolor necessitatibus, doloribus ut.
                    </p>
                </article>
            </div>

            <div class="container">
                <div class="row g-2">
                    <div class="col-6">
                        <div class="p-3 border bg-light">Custom column padding</div>
                    </div>
                    <div class="col-6">
                        <div class="p-3 border bg-light">Custom column padding</div>
                    </div>
                    <div class="col-6">
                        <div class="p-3 border bg-light">Custom column padding</div>
                    </div>
                    <div class="col-6">
                        <div class="p-3 border bg-light">Custom column padding</div>
                    </div>
                </div>
            </div>


        </div>
        <?php include("footer.php"); ?>

</body>

<script src="jquery/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</html>