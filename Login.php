<?php 
session_start();
$DSN = 'mysql:host=localhost;dbname=login';
$user = "root";
$pass = "";

try{
    $bdd = new PDO($DSN,$user,$pass);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Verification des info de input
    if(isset($_POST["button"])){
        if(empty($_POST["Username"]) || empty($_POST["Password"])){
            $message = '<label>Veuillez compléter les champs ci-dessus</label>';
        } else{
            $query = 'SELECT * FROM admin WHERE username =:Username AND password = :Password';
            $statement = $bdd->prepare($query);
            $statement->execute([
                'Username' => $_POST["Username"],
                'Password' => $_POST["Password"]

            ]);
            $count = $statement ->rowCount();
            if($count > 0){
                $_SESSION["Username"] = $_POST["Username"];
                    header("location:main/index.php");
            } else{
                $message = '<label>Vérifier vos informations</label>';
            }
    }

}
}catch(PDOException $e){
    print("Erreur !:" . $e->getMessage() . "<br\>");
    die();
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Tesla Admin-login</title>
    <link rel="stylesheet" href="Bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="Login.css">

</head>
<body>
    <h4 class="company-name">TESLA</h4>

    <div class="block-login-container">
        <div class="login-container ">
            <img src="Photos/avatar.jpg" alt="avatar" width="90" height="90" class="avatar">
            <h4 class="login-txt1">Se connecter</h4>
                <!-- Formulaire -->
                <form method="POST" class="form-container">
                    <p class="login-txt2">Nom d'utilisateur</p>
                    <div class="login_content">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="grey" class="bi bi-envelope svg-login" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383l-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
                        </svg>
                        <input type="text" name="Username" placeholder="Tapez votre nom d'utilisateur" class="login_info_content">
                    </div>
                    <p class="login-txt2 mdp-txt">Mot de passe</p>
                    <div class="login_content">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="grey" class="bi bi-key svg-login pass" viewBox="0 0 16 16">
                                <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
                                <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                            </svg> 
                        <input type="password" name="Password" placeholder="Tapez votre mot de passe" class="login_info_content">
                    </div>
                    <?php
                        if(isset($message)){ 
                            echo('<p class="text-danger">'.$message.'</p>');      
                       }
                    ?>
                    
                    <div class="button-container">
                        <button type="submit" class="button-confirmer" name="button">CONNEXION</button>
                    </div>
                </form>

        <script type="text/javascript" src="Js/jquery.min.js"></script>
        <script type="text/javascript" src="Js/App.js"></script>
        </div>
    </div>
</body>
</html>