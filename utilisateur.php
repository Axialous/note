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
print_r($_SESSION);
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
    </head>
    <body>
        <main>
            <section>
                <article>
                    <form action="PHP/ajouter_instrument.php" method="post" enctype="multipart/form-data">
                        <h1>Nouvel instrument : </h1>
                        <div>
                            <label for="nom_instrument_<?= $instrument['ID'] ?>">Nom : </label>
                            <input id="nom_instrument_<?= $instrument['ID'] ?>"
                                type="text"
                                name="Nom">
                        </div>
                        <div>
                            <label for="description_instrument_<?= $instrument['ID'] ?>">Description : </label>
                            <textarea id="description_instrument_<?= $instrument['ID'] ?>"
                                    name="Description"></textarea>
                        </div>
                        <div>
                            <label for="image_instrument_<?= $instrument['ID'] ?>">Image : </label>
                            <input id="image_instrument_<?= $instrument['ID'] ?>"
                                type="file"
                                name="Image"
                                accept=".jpg, .jpeg">
                        </div>
                        <div>
                            <label for="categorie_instrument_<?= $instrument['ID'] ?>">Catégorie : </label>
                            <select id="categorie_instrument_<?= $instrument['ID'] ?>"
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
                        <div>
                            <label for="taille_instrument_<?= $instrument['ID'] ?>">Taille : </label>
                            <input id="taille_instrument_<?= $instrument['ID'] ?>"
                                type="number"
                                name="Taille"
                                min="1"
                                max="5">
                        </div>
                        <div>
                            <label for="formations_instrument_<?= $instrument['ID'] ?>">Formations : </label>
                            <textarea id="formations_instrument_<?= $instrument['ID'] ?>"
                                      name="Formations"></textarea>
                        </div>
                        <div>
                            <button type="submit">Ajouter</button>
                        </div>
                    </form>
                </article>

            <?php

            // Affichage de la liste des instruments avec boutons "modifer" et "supprimer" :
            foreach ($instruments as $instrument) {
            ?>
                <article>
                    <form action="PHP/modifier_instrument.php" method="post" enctype="multipart/form-data">
                        <h1>Instrument <?= $instrument['ID'] ?> : </h1>
                        <input type="hidden"
                               name="ID"
                               value="<?= $instrument['ID'] ?>">
                        <div>
                            <label for="nom_instrument_<?= $instrument['ID'] ?>">Nom : </label>
                            <input id="nom_instrument_<?= $instrument['ID'] ?>"
                                   type="text"
                                   name="Nom"
                                   value="<?= $instrument['Nom'] ?>">
                        </div>
                        <div>
                            <label for="description_instrument_<?= $instrument['ID'] ?>">Description : </label>
                            <textarea id="description_instrument_<?= $instrument['ID'] ?>"
                                      name="Description"><?= $instrument['Description'] ?></textarea>
                        </div>
                        <div>
                            <label for="image_instrument_<?= $instrument['ID'] ?>">Image : </label>
                            <input id="image_instrument_<?= $instrument['ID'] ?>"
                                   type="file"
                                   name="Image"
                                   accept=".jpg, .jpeg"
                                   value="<?= $instrument['Image'] ?>">
                        </div>
                        <div>
                            <label for="categorie_instrument_<?= $instrument['ID'] ?>">Catégorie : </label>
                            <select id="categorie_instrument_<?= $instrument['ID'] ?>"
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
                        <div>
                            <label for="taille_instrument_<?= $instrument['ID'] ?>">Taille : </label>
                            <input id="taille_instrument_<?= $instrument['ID'] ?>"
                                   type="number"
                                   name="Taille"
                                   min="1"
                                   max="5"
                                   value="<?= $instrument['Taille'] ?>">
                        </div>
                        <div>
                            <label for="formations_instrument_<?= $instrument['ID'] ?>">Formations : </label>
                            <textarea id="formations_instrument_<?= $instrument['ID'] ?>"
                                      name="Formations"><?= $instrument['Formations'] ?></textarea>
                        </div>
                        <div>
                            <button type="submit">Modifier</button>
                            <button type="submit" formaction="PHP/supprimer_instrument.php">Supprimer</button>
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