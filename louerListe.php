<?php include("connexion.php"); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Location</title>
</head>

<body>
    <?php include("header.php"); ?>

    <div class="container-fluid">
        <div class="container main">
            <div class="row">
                <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                    <h4><a href="#">Nouveau</a></h4>
                    <div class="container-fluid bg-dark formulaire">
                        <form>
                            <div class="mb-2">
                                <label for="exampleInputID1" class="form-label">Numéro locataire</label>
                                <input type="text" class="form-control" id="exampleInputID1">
                            </div>
                            <div class="mb-2">
                                <label for="exampleInputID1" class="form-label">Numéro voiture</label>
                                <input type="text" class="form-control" id="exampleInputID1">
                            </div>
                            <div class="mb-2">
                                <label for="exampleInputName1" class="form-label">Nombre de jour</label>
                                <input type="nummber" class="form-control" id="exampleInputName1">
                            </div>
                            <div class="mb-2">
                                <label for="exampleInputAdress1" class="form-label">Date de location</label>
                                <input type="date" class="form-control" id="exampleInputAdress1">
                            </div>

                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-primary">Valider</button>
                            </div>
                        </form>

                    </div>
                </article>

                <article class="col-md-8 col-lg-8 col-xs-12 col-sm-12">
                    <h4><a href="#">Liste des locations</a></h4>
                    <?php include("recherche.php"); ?>
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Locataire</th>
                                <th scope="col">Voiture</th>
                                <th scope="col">Nombre de jour</th>
                                <th scope="col">Date</th>
                                <th scope="col">Modifier/Effacer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <th scope="row">4</th>
                                <td>15</td>
                                <td>05-10-20</td>
                                <td>
                                    <center>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-primary"><img src="icons/pencil-fill.svg"
                                                    alt=""></button>
                                            <button type="button" class="btn btn-secondary"><img
                                                    src="icons/eraser-fill.svg" alt=""></button>
                                        </div>
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <th scope="row">1</th>
                                <td>7</td>
                                <td>13-07-19</td>
                                <td>
                                    <center>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-primary"><img src="icons/pencil-fill.svg"
                                                    alt=""></button>
                                            <button type="button" class="btn btn-secondary"><img
                                                    src="icons/eraser-fill.svg" alt=""></button>
                                        </div>
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>5</td>
                                <td>21</td>
                                <td>28-12-17</td>
                                <td>
                                    <center>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-primary"><img src="icons/pencil-fill.svg"
                                                    alt=""></button>
                                            <button type="button" class="btn btn-secondary"><img
                                                    src="icons/eraser-fill.svg" alt=""></button>
                                        </div>
                                    </center>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </article>
            </div>
        </div>
    </div>

    <?php include("footer.php"); ?>

</body>

</html>