<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../java/presentation.js"></script>
    <link rel="stylesheet" href="../style/identification.css">
    <title>Document</title>
</head>
<body>
    <div class=container-general>
        <form method="post" action="formulaire.php" target="_blank">
            <div class="formulaire1 contact">
                <label for="Email">Identifiant</label>
                <input name="Email" type="text" placeholder="Identifiant" required  maxlenght="50">
            </div>
            <div class="formulaire2 contact">
                    <label for="pass">Mot de passe</label>
                    <input name="Password" type="Password" placeholder="Mot de passe" required  maxlenght="8">
                </div>
            
            <button id='b2' class="boutton-envoyer" value="Submit">
                <span>Envoyer</span>
            </button>
        </form>
        <a class="lien" href="inscription.php" >Pas encore inscrit?</a>
    </div>  
</body>
</html>

   