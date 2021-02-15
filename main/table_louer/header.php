<header>
    <div class="container-fluid header">
        <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="../index.php">Accueil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../table_locataire/locataireListe.php">Locataire</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../table_voiture/voitureListe.php">Voiture</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="louerListe.php">Louer</a>
        </li>
        <li class="logout_link option_admin">
            <?php 
                if(isset($_SESSION["Username"])){
                    echo'<img src="../images/'.$_SESSION["Username"].'.jpg" alt="Avatar"  heigth="45" width="45" class="avatar">';
                }
            ?>
            <a href="../logout.php" class="Logout_txt">Déconnexion</a>
        </li>

        </ul>
    </div>
</header>

