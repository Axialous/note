<?php
session_start();
            $servername = 'localhost';
            $username = 'root';
            $password = "";
            $dbname = 'note';
            $Email= $_POST['Email'];
            $Password= $_POST['Password'];
            
                $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                $sth = $conn->prepare("
                SELECT *
                FROM user
                WHERE Email = '$Email'
                ");
                $sth->bindParam('Email',$Email);
                $sth-> execute();
                $result = $sth->fetchAll(PDO::FETCH_ASSOC);

               var_dump($result);

    if ($result){
     $passwordHash = $result[0]["Password"];
       if (password_verify($Password, $passwordHash)){

          header ("Location:../utilisateur.php");
           echo "connexion reussi";}
           else{ echo "identifiants invalides";}
                
      } else {
                $errorMessage = "identifiant ou mot de passe invalide";
            }
          
        
    

?>