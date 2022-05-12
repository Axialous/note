<?php
    $serveur = "localhost";
    $dbname = "note";
    $user = "root";
    $pass = "";
    $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if(!empty ($_POST ['Nom']) && !empty ($_POST ['Prenom']) && !empty ($_POST ['Email'])  && !empty ($_POST ['Password']) && !empty ($_POST ['Roles'])){
            function valid_donnees($donnees){   
                $donnees = trim($donnees);
                    $donnees = stripslashes($donnees);
                    $donnees = htmlspecialchars($donnees);
                    return $donnees;
                } 
        $Nom = utf8_decode (valid_donnees($_POST['Nom']));
        $Prenom = utf8_decode (valid_donnees($_POST['Prenom']));
        $Email = valid_donnees($_POST['Email']);
        $Password = password_hash($_POST ['Password'], PASSWORD_DEFAULT);
        $Roles = valid_donnees($_POST['Roles']);
        
        var_dump($Nom);
        var_dump($Prenom);
        var_dump($Email);
        var_dump($Password);
        var_dump($Roles);
      
        $sth = $dbco->prepare("
            INSERT INTO users(Nom, Prenom, Email, Password, Roles)
            VALUES(:nom, :prenom, :email, :password, :roles)");
        $sth->bindParam(':nom',$Nom);
        $sth->bindParam(':prenom',$Prenom);
        $sth->bindParam(':email',$Email);
        $sth->bindParam(':password',$Password);
        $sth->bindParam(':roles',$Roles);
        $sth->execute();
    header("location:../utilisateur.php");
        //On renvoie l'utilisateur vers la page de remerciement <script type="text/javascript">alert('Votre message a bien était envoyé')</script>
    }

   
    

?>