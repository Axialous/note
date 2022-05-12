<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/inscription.css">
    <title>Document</title>
</head>
<body>
    <section class="container-fluid pt-5">
        
        <article class="mx-auto col-4 py-2">
        <h1>Formulaire d'inscription</h1>
            <form class="needs-validation" method="post" action="formulaire_inscription.php" novalidate>
                <div class="form-group mb-3">
                        <label class="form-label" for="Nom">Nom</label>
                        <input class="form-control rounded-4" name="Nom" type="text" placeholder="Nom" required  maxlenght="50">
                        <div class="invalid-feedback">Veuillez entrer un nom valide</div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="Prenom">Prénom</label>
                        <input class="form-control rounded-4" name="Prenom" type="text" placeholder="Prénom" required  maxlenght="50">
                        <div class="invalid-feedback">Veuillez entrer un prénom valide</div>
                    </div>
                    <div class="form-floating mb-3">
                        <label for="Email">Identifiant</label>
                        <input class="form-control rounded-4" name="Email" type="text" placeholder="Mail" required  maxlenght="50">
                        <div class="invalid-feedback">Veuillez entrer un email valide</div>
                    </div>
                    <div class="form-floating mb-3">
                            <label for="pass">Mot de passe</label>
                            <input class="form-control rounded-4" name="Password" type="Password" placeholder="Password" required  maxlenght="8">
                            <div class="invalid-feedback">Veuillez entrer un mot de passe valide</div>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="roles">Roles</label>
                            <input class="form-control rounded-4" name="Roles" type="type" placeholder="admin/visiteur..." required  maxlenght="8">
                            <div class="invalid-feedback">Veuillez entrer votre role</div>
                        </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="same-address">
                        <label class="form-check-label" for="same-address">Accepter notre charte d'utilisation</label>
                        <div class="invalid-feedback">Veuillez valider notre charte d'utilisation</div>
                    </div>    
                    
                    <button class="w-100 btn btn-primary col-4" value="Submit">
                        <span>Soumettre</span>
                    </button>
            </form>
        
    </section>  
</body>
</html>