<?php
    $serveur = "localhost";
    $dbname = "note";
    $user = "root";
    $pass = "";
    $ID_categorie = utf8_decode (valid_donnees($_POST["ID_categorie"]));

    }
    try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //On insère les données reçues
        $sth = $dbco->prepare("
        SELECT ID,Nom,Image
        FROM produits
        ORDER BY ID DESC");
       
    setcookie('cookie_form', 1, time()+60);
    header("location:index.php#section-5");
        //On renvoie l'utilisateur vers la page de remerciement <script type="text/javascript">alert('Votre message a bien était envoyé')</script>
    }
    catch(PDOException $e){
        echo 'Erreur : '.$e->getMessage();
    }
    

?>