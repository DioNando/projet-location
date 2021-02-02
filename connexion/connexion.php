<?php
try {
    $user = 'root';
    $pass = '';
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_location', $user, $pass);
    /*foreach($bdd->query('SELECT * from FOO') as $row) {
        print_r($row);
    }
    $bdd = null;*/
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>