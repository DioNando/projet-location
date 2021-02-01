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

            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Accordion Item #1
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                            terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.
                            Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a
                            bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
                            helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan
                            excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                            synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</div>
                    </div>
                </div>


            </div>
        </div>
        <?php include("footer.php"); ?>

</body>

<script src="jquery/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</html>