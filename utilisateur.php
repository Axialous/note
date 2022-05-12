<?php

session_start();

// Connexion à la base de données :
try {
    $BDD = new PDO('mysql:host=localhost;dbname=note;charset=utf8', 'root', '');
    $BDD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    die ('Erreur : ' . $e->getMessage());
}

// Exécution de la requête chargeant la liste des instruments en fonction du rôle de l'utilisateur :

if ($_SESSION['Role'] == 'admin') {
    $donnees_instruments = $BDD->prepare("SELECT *
                                          FROM produits");
} else {
    $donnees_instruments = $BDD->prepare("SELECT *
                                          FROM produits
                                          WHERE ID_user = '" . $_SESSION['ID_Utilisateur'] . "'");
}
$donnees_instruments->execute();
$instruments = $donnees_instruments->fetchAll();

// Exécutione de la requête chargeant la liste des catégories :
$donnees_categories = $BDD->prepare("SELECT ID_Categorie, Titre
                                     FROM categories");
$donnees_categories->execute();
$categories = $donnees_categories->fetchAll();
?>

<!DOCTYPE html>
    <html lang="fr">
    <head>
        <title>Ajouter | Modifier | Supprimer</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="utilisateur.php">
    </head>
    <body>
        <main>
            <section class="container-fluid ">
                <article class="mx-auto col-6 py-2">
                    <form  action="PHP/ajouter_instrument.php" method="post" enctype="multipart/form-data">
                        <h1 class="display-5 fw-bold">Ajouter un nouvel instrument: </h1>
                        <div class="form-floating mb-3">
                            <label for="nom_instrument_<?= $instrument['ID'] ?>">Nom : </label>
                            <input class="form-control rounded-4" id="nom_instrument_<?= $instrument['ID'] ?>"
                                type="text"
                                name="Nom">
                        </div>
                        <div class="form-floating mb-3" >
                            <label for="description_instrument_<?= $instrument['ID'] ?>">Description : </label>
                            <textarea class="form-control rounded-4" id="description_instrument_<?= $instrument['ID'] ?>"
                                    name="Description"></textarea>
                        </div>
                        <div >
                            <label for="image_instrument_<?= $instrument['ID'] ?>">Image : </label>
                            <input class="form-control rounded-4 mb-3" id="image_instrument_<?= $instrument['ID'] ?>"
                                type="file"
                                name="Image"
                                accept=".jpg, .jpeg">
                        </div>
                        <div >
                            <label for="categorie_instrument_<?= $instrument['ID'] ?>">Catégorie : </label>
                            <select class="form-control rounded-4 mb-3" id="categorie_instrument_<?= $instrument['ID'] ?>"
                                    name="Categorie">
                                <?php
                                foreach ($categories as $categorie) {
                                ?>
                                    <option value="<?= $categorie['ID_Categorie'] ?>"><?= $categorie['Titre'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="taille_instrument_<?= $instrument['ID'] ?>">Taille : </label>
                            <input class="form-control rounded-4"id="taille_instrument_<?= $instrument['ID'] ?>"
                                type="number"
                                name="Taille"
                                min="1"
                                max="5">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="formations_instrument_<?= $instrument['ID'] ?>">Formations : </label>
                            <textarea  class="form-control rounded-4"id="formations_instrument_<?= $instrument['ID'] ?>"
                                      name="Formations"></textarea>
                        </div>
                        <div >
                            <button class="btn btn-primary col-5 " type="submit">Ajouter</button>
                        </div>
                    </form>
                </article>
                            </section>

            
            <section class="container-fluid row">
                
                <?php

// Affichage de la liste des instruments avec boutons "modifer" et "supprimer" :
foreach ($instruments as $instrument) {
?>
                    <article class="col-4 py-4">
                    <form  action="PHP/modifier_instrument.php" method="post" enctype="multipart/form-data">
                        <h1><?= $instrument['Nom'] ?> </h1>
                        <input class="form-control rounded-4" type="hidden"
                               name="ID"
                               value="<?= $instrument['ID'] ?>">
                        <div class="form-floating mb-3">
                            <label  for="nom_instrument_<?= $instrument['ID'] ?>">Nom: </label>
                            <input class="form-control rounded-4 " id="nom_instrument_<?= $instrument['ID'] ?>"
                                   type="text"
                                   name="Nom"
                                   value="<?= $instrument['Nom'] ?>">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="description_instrument_<?= $instrument['ID'] ?>">Description: </label>
                            <textarea class="form-control rounded-4"id="description_instrument_<?= $instrument['ID'] ?>"
                                      name="Description"><?= $instrument['Description'] ?></textarea>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="image_instrument_<?= $instrument['ID'] ?>">Image : </label>
                            <input class="form-control rounded-4" id="image_instrument_<?= $instrument['ID'] ?>"
                                   type="file"
                                   name="Image"
                                   accept=".jpg, .jpeg"
                                   value="<?= $instrument['Image'] ?>">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="categorie_instrument_<?= $instrument['ID'] ?>">Catégorie : </label>
                            <select class="form-control rounded-4" id="categorie_instrument_<?= $instrument['ID'] ?>"
                                    name="categorie">
                                <?php
                                foreach ($categories as $categorie) {
                                ?>
                                    <option value="<?= $categorie['ID_Categorie'] ?>" <?= ($categorie['ID_Categorie'] == $instrument['ID_categorie']) ? 'selected' : ''; ?>><?= $categorie['Titre'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="taille_instrument_<?= $instrument['ID'] ?>">Taille : </label>
                            <input class="form-control rounded-4" id="taille_instrument_<?= $instrument['ID'] ?>"
                                   type="number"
                                   name="Taille"
                                   min="1"
                                   max="5"
                                   value="<?= $instrument['Taille'] ?>">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="formations_instrument_<?= $instrument['ID'] ?>">Formations : </label>
                            <textarea  class="form-control rounded-4"id="formations_instrument_<?= $instrument['ID'] ?>"
                                      name="Formations"><?= $instrument['Formations'] ?></textarea>
                        </div>
                        <div class="form-floating">
                            <button class="btn btn-success col-5 mx-auto" type="submit">Modifier</button>
                            <button class="btn btn-danger col-5 mx-auto" type="submit" formaction="PHP/supprimer_instrument.php">Supprimer</button>
                        </div>
                    </form>
                </article>
            <?php
            }

            // Affichage du bouton "ajouter" :


            ?>

            </section>
        </main>
    </body>
</html>