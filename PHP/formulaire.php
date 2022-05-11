<?php
session_start();
            $servername = 'localhost';
            $username = 'root';
            $password = "";
            $dbname = 'note';
            $name= $_POST['Email'];
            $pass= $_POST['Password'];
            
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                $sth = $conn->prepare("
                SELECT *
                FROM user
                WHERE Email= '$name' 
                ");
              $sth-> execute();
              $user = $sth->fetchAll(PDO::FETCH_ASSOC);

    if ($pass == $user[0]['Password'])
     {
                $_SESSION['Email'] = $name;
                $_SESSION['Role'] = $user[0]['Role'];
                $_SESSION['ID_Utilisateur'] = $user[0]['ID_Utilisateur'];
           header ("Location:../utilisateur.php");
           echo "connexion reussi";
                
                                    }

             else {
                $errorMessage = "identifiant ou mot de passe invalide"
                ;
            }
        
    

?>