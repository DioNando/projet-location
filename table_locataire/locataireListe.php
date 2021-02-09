<?php include("../connexion/connexion.php"); ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Location de voiture</title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/brand/tesla_logo2.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
  <link rel="stylesheet" href="../assets/css/w3.css" type="text/css">
  <link src="../assets/css/bootstrap/bootstrap.min.css" type="text/css">
</head>
<style >
  tr:nth-child(even){background-color: #30475e;
</style>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <h3>TESLA<img src="../assets/img/brand/tesla_logo2.png" class="navbar-brand-img" alt="..."></h3>
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="../Accueil.php">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Accueil</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">
                <i class="ni ni-single-02 text-pink"></i>
                <span class="nav-link-text">Liste locataire</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../table_voiture/voitureListe.php">
                <i class="fas fa-car text-blue"></i>
                <span class="nav-link-text">Liste voiture</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../table_louer/louerListe.php">
                <i class="fas fa-dollar-sign text-green"></i>
                <span class="nav-link-text">Liste louer</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../main/Locataire.php">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">Locataires</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../main/Voiture.php">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">Voitures</span>
              </a>
            </li>
          </ul>
          <!-- Divider -->
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main" method="POST">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" id="search" name="search" placeholder="Search" type="text">
              </div>
            </div>
          </form>
           <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
          </ul>  
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="ni ni-single-02 text-pink"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Liste locataire</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="#ajout" data-toggle="modal" class="btn btn-sm btn-dark"><i class="fas fa-plus text-green"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card bg-default shadow">
            <!-- Card header -->
            <div class="card-header bg-transparent border-0">
              <h3 class="text-white mb-0">Table locataire</h3>
            </div>
            <!-- Dark table -->
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush" id="result">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">identifiant</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody class="list">
                <?php 

                      if (isset($_POST['search'])) {
                          $searchkey = $_POST['search'];
                          $sql = "SELECT * FROM table_locataire WHERE CONCAT(Locataire, ' ', ID_Locataire) LIKE '%$searchkey%' OR Nom LIKE '%$searchkey%' OR Adresse LIKE '%$searchkey%'"; 
                      }else{
                          $sql = "SELECT * FROM table_locataire";
                      }

                      $reponse = $bdd->query($sql);

                          while ($donnees = $reponse->fetch())
                          {
                              echo 
                                  "<tr>
                                    <td>". htmlspecialchars($donnees['Locataire']) . " " . htmlspecialchars($donnees['ID_Locataire']) ."</td>
                                    <td>". htmlspecialchars($donnees['Nom']) ."</td>
                                    <td>". htmlspecialchars($donnees['Adresse']) ."</td>
                                    <td>
                                      <a href='#modif_".$donnees['ID_Locataire']."' class='btn btn-info btn-sm' data-toggle='modal'><i class='fas fa-edit'></i></a>
                                      <a href='#suppr_".$donnees['ID_Locataire']."' class='btn btn-danger btn-sm' data-toggle='modal'><i class='fas fa-trash'></i></a>
                                    </td>
                                  </tr>";
                                  include('modal/Modif_Supp_modal.php');   
                          }

                      $reponse->closeCursor();
                ?>
                </tbody>
              </table>
              <?php include('modal/AjoutLocataire_modal.php') ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
  <script src="../assets/css/bootstrap/bootstrap.min.js"></script>
  <script src="../assets/css/bootstrap/jquery.min.js"></script>
  <script src="recherche/recherche.js"></script>
</body>

</html>