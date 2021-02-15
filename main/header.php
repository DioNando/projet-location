<header>

<div class="container-fluid headerAccueil">
    <center>
        <h3>Gestion des locations des voitures</h3>
    
    <div class="container">
        <div class="row">   
            <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                <h5><a href="main/locataire.php">LISTE DES LOCATAIRES</a></h5>
                
            </article>

            <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                <h5><a href="main/voiture.php">LOCATIONS PAR VOITURE</a></h5>
                
            </article>

             <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                <h5><a href="index.php">ACCUEIL</a></h5>
                
            </article>
        </div>
    
    </div>
    
    </center>

</div>


    <div class="container-fluid header">
        <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="table_locataire/locataireListe.php">Locataire</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="table_voiture/voitureListe.php">Voiture</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="table_louer/louerListe.php">Louer</a>
        </li>
        <li class="logout_link option_admin">
            <?php 
                if(isset($_SESSION["Username"])){
                    echo'<img src="images/'.$_SESSION["Username"].'.jpg" alt="Avatar"  heigth="45" width="45" class="avatar">';
                }
            ?>
            <a href="logout.php" class="Logout_txt">Déconnexion</a>
        </li>
        </ul>
    </div>
</header>

